<?php

namespace App\Services;

use App\Models\Admission;
use App\Models\BankDetails;
use App\Models\CourseFees;
use App\Models\EducationHistory;
use App\Models\StudentAcadmicDetails;
use App\Models\StudentAcadmicDocuments;
use App\Models\StudentAddress;
use App\Models\StudentAdmissionInfo;
use App\Models\StudentBankDetails;
use App\Models\StudentDocuments;
use App\Models\StudentOtherDocuments;
use App\Models\StudentOtherInfo;
use App\Models\StudentPersonalDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotFoundException;
use Intervention\Image\Facades\Image;
use Psy\Command\HistoryCommand;

class AdmissionService
{
   private function createUser(array $data): User
   {
      $user = new User();
      $user->email =  $data['email'];
      $user->name = $data['student_name'];
      $user->password = bcrypt($data['aadhar']);
      $user->category_id = is_numeric($data['category']) ? (int) $data['category'] : null;
      $user->university_reg_no  = $data['ureg_no'] ?? null;
      $user->role = "student";
      $user->save();
      return $user;
   }
   private function saveSignature($file): string
   {
      $image = Image::make($file)->encode('jpg', 80);
      $path = 'students/signatures/' . uniqid('', true) . '.jpg';
      Storage::disk('public')->put($path, (string) $image);
      return $path;
   }
   private function saveDocument($file, string $name, string $title, string $category, User $user): void
   {
      $document = new StudentDocuments();
      $photoPath = 'students/' . $user->id . '/' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
      Storage::disk('public')->put($photoPath, file_get_contents($file->getRealPath()));
      $document->title = $title;
      $document->name = $name;
      $document->category = $category;
      $document->student_id = $user->id;
      $document->file_name = $file->getClientOriginalName();
      $document->size = $file->getSize();
      $document->save();
   }
   private function saveProfilePhoto($file): string
   {
      $image = Image::make($file)->encode('jpg', 80);
      $path = 'students/photos/' . uniqid('', true) . '.jpg';
      Storage::disk('public')->put($path, (string) $image);
      return $path;
   }
   private function saveUserPersonalDetials(array $data, User $user): StudentPersonalDetails
   {
      $student = new StudentPersonalDetails();
      $student->fathers_name = $data['fathers_name'];
      $student->mothers_name = $data['mothers_name'];
      $student->dob = $data['dob'];
      $student->gender = $data['gender'];
      $student->categoryid = $data['category'];
      $student->user_id = $user->id;
      $student->religion = $data['relegion'];
      $student->aadhar_no = $data['aadhar'];
      $student->has_ews = ($data['ews'] ?? 'No') === 'Yes';
      $student->disabled_category = $data['reservation'];
      $student->mobile = $data['phone'];
      $student->address = $data['caddress'];
      $student->state = $data['cstate'];
      $student->district = $data['cdistrict'];
      $student->pincode = $data['cpin'];
      // profile and signature handled outside via files
      return $student;
   }
   protected function saveBankDetials(array $data, User $user): BankDetails
   {
      $bank = new BankDetails();
      $bank->account_holder_name = $data['baccount_name'];
      $bank->account_number = $data['baccount_no'];
      $bank->ifsc_code = $data['baccount_ifsc'];
      $bank->bank = $data['baccount_bname'];
      $bank->student_id = $user->id;
      return $bank;
   }
   protected function saveMatrixEducationHistory(array $data, User $user): EducationHistory
   {
      $history = new EducationHistory();
      $history->roll_no = $data['RollNo10'];
      $history->roll_code = $data['RollCode10'];
      $history->passing_year = $data['PassYear10'];
      $history->board = $data['Board10'];
      $history->name = "martix";
      $history->title = "10th";
      $history->total_marks = $data['MaxMarks10'];
      $history->marks_obtained = $data['MarksObt10'];
      return $history;
   }
   protected function saveIntermediateEducationHistory(array $data, User $user): EducationHistory
   {
      $history = new EducationHistory();
      $history->roll_no = $data['RollNo12'];
      $history->roll_code = $data['RollCode12'];
      $history->passing_year = $data['PassYear12'];
      $history->board = $data['Board12'];
      $history->stream = $data['xii_stream'];
      $history->name = "intermediate";
      $history->title = "12th";
      $history->total_marks = $data['MaxMarks12'];
      $history->marks_obtained = $data['MarksObt12'];
      return $history;
   }

   protected function processAdmission(array $data, User $user): Admission
   {
      $courseFees = CourseFees::where('semester_id', $data['semester_id'])->first();
      if (empty($courseFees)) throw new NotFoundException("Course Fees not added");
      $fees = $courseFees->amount;
      if (strtoupper($data['gender']) !== 'FEMALE') {
         $fees = $fees + 100;
      }
      $admission = new Admission();
      $admission->user_id = $user->id;
      $admission->created_by = $user->id;
      $admission->course_id = $data['course_id'];
      $admission->semester_id  = $data['semester_id'];
      $admission->major_subject = $data['major_subject_id'];
      $admission->minor_subject = $data['minor_subject_id'];
      $admission->idc = $data['idc'];
      $admission->aec = $data['aec'];
      $admission->sec = $data['sec'];
      $admission->vac = $data['vac'];
      $admission->program = $data['program_name'];
      $admission->file_id = $data['merit_list_id'];
      $admission->file_student_id = $data['merit_list_student_id'];
      $admission->fees = $fees;
      $admission->tax = calculateTax($fees);
      $admission->total_amount = $fees + $admission->tax;
      return $admission;
   }
   public function storeAdmission(array $data, Request $request): array
   {
      try {
         beginTransaction();

         $user = $this->createUser($data);

         // Personal details + files
         $personalDetails = $this->saveUserPersonalDetials($data, $user);
         if ($request->hasFile('profile_photo')) {
            $personalDetails->profile_photo = $this->saveProfilePhoto($request->file('profile_photo'));
         }
         if ($request->hasFile('signature')) {
            $personalDetails->signature = $this->saveSignature($request->file('signature'));
         }
         $personalDetails->save();

         // Optional documents
         if (($data['ews'] ?? 'No') === 'Yes' && $request->hasFile('ews_certificate')) {
            $this->saveDocument($request->file('ews_certificate'), 'ews', 'EWS Document', 'personal', $user);
         }
         if (($data['reservation'] ?? '') !== 'NA' && $request->hasFile('reservation_certificate')) {
            $this->saveDocument($request->file('reservation_certificate'), 'reservation', 'Disability Certificate', 'personal', $user);
         }

         // Academic documents
         if ($request->hasFile('marksheet12')) {
            $this->saveDocument($request->file('marksheet12'), 'marksheet12', '12th Marksheet', 'academic', $user);
         }
         if ($request->hasFile('certificate12')) {
            $this->saveDocument($request->file('certificate12'), 'certificate12', '12th Certificate', 'academic', $user);
         }
         if ($request->hasFile('clc')) {
            $this->saveDocument($request->file('clc'), 'clc', 'CLC', 'academic', $user);
         }
         if ($request->hasFile('migration12')) {
            $this->saveDocument($request->file('migration12'), 'migration12', 'Migration Certificate', 'academic', $user);
         }

         // Bank details
         $bank = $this->saveBankDetials($data, $user);
         $bank->save();

         // Education histories
         $matrix = $this->saveMatrixEducationHistory($data, $user);
         $matrix->student_id = $user->id;
         $matrix->save();
         $inter = $this->saveIntermediateEducationHistory($data, $user);
         $inter->student_id = $user->id;
         $inter->save();

         // Admission
         $admission = $this->processAdmission($data, $user);
         $admission->save();

         commitTransaction();
         Auth::login($user, true);
         return [
            'status' => true,
            'message' => 'Admission successfully saved.',
            'admission_id' => $admission->id,
         ];
      } catch (\Exception $e) {
         rollbackTransaction();
         return [
            'status' => false,
            'message' => 'Failed to save admission.',
            'error' => $e->getMessage(),
         ];
      }
   }
}
