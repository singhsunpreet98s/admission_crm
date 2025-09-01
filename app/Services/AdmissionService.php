<?php

namespace App\Services;

use App\Models\Admission;
use App\Models\BankDetails;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Psy\Command\HistoryCommand;

class AdmissionService
{
   private function createUser($data): User
   {
      $user = new User();
      $user->email =  $data['email'];
      $user->name = $data['student_name'];
      $user->password = bcrypt($data['ureg_no']);
      $user->category_id = $data['category'];
      $user->university_reg_no  = $data['ureg_no'];
      $user->role = "student";
      $user->save();
      return $user;
   }
   private function saveSignature($file): string
   {
      $image = Image::make($file)
         ->encode('jpg', 80);
      $photoPath = 'students/signatures/' . uniqid() . '.jpg';
      Storage::disk('public')->put($photoPath, (string) $image);
      return $photoPath;
   }
   private function saveDocument($file, $name, $title, $category, $user)
   {
      $document = new StudentDocuments();
      $photoPath = 'students/' . $user->id . '/' . uniqid() . '.jpg';
      Storage::disk('public')->put($photoPath, (string) $file);
      $document->title = $title;
      $document->name = $name;
      $document->category = $category;
      $document->student_id = $user->id;
      $document->file_name = $file->getClientOriginalName();
      $document->file_size = $file->getSize();
      $document->save();
   }
   private function saveProfilePhoto($file): string
   {
      $image = Image::make($file)
         ->encode('jpg', 80);
      $photoPath = 'students/photos/' . uniqid() . '.jpg';
      Storage::disk('public')->put($photoPath, (string) $image);
      return $photoPath;
   }
   private function saveUserPersonalDetials(array $data, User $user): StudentPersonalDetails
   {
      $student = new StudentPersonalDetails();
      $student->fathers_name = $data['father_name'];
      $student->mothers_name = $data['mother_name'];
      $student->dob = $data['dob'];
      $student->gender = $data['gender'];
      $student->categoryid = $data['category'];
      $student->user_id = $user->id;
      $student->religion = $data['relegion'];
      $student->aadhar_no = $data['aadhar'];
      $student->has_ews = $data['ews'] === 'Yes';
      $student->disabled_category = $data['reservation'];
      $student->mobile = $data['phone'];
      $student->address = $data['caddress'];
      $student->state = $data['cstate'];
      $student->district = $data['cdistrict'];
      $student->pincode = $data['cpin'];
      $student->profile_photo = $this->saveProfilePhoto($data['profile_photo']);
      $student->signature = $this->saveSignature($data['signature']);
      if ($student->has_ews) {
         $this->saveDocument($data['ews_certificate'], 'ews', 'EWS Document', 'personal', $user);
      }
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
      $history->marks_obtained = $data['MarksObt10Per'];
      return $history;
   }
   protected function saveIntermediateEducationHistory(array $data, User $user): EducationHistory
   {
      $history = new EducationHistory();
      $history->roll_no = $data['RollNo12'];
      $history->roll_code = $data['RollCode12'];
      $history->passing_year = $data['PassYear12'];
      $history->board = $data['Board12'];
      $history->stream = $data['stream'];
      $history->name = "intermediate";
      $history->title = "12th";
      $history->total_marks = $data['MaxMarks12'];
      $history->marks_obtained = $data['MarksObt12'];
      return $history;
   }
   protected function processAdmission(array $data, User $user)
   {
      $admission = new Admission();
      $admission->user_id = $user->id;
      $admission->created_by = $user->id;
      $admission->course_id = $data['course_id'];
      $admission->semester_id  = $data['course_id'];
      $admission->major_subject = $data['course_id'];
      $admission->minor_subject = $data['course_id'];
      $admission->minor_subject = $data['course_id'];
      $admission->idc = $data['course_id'];
      $admission->aec = $data['course_id'];
      $admission->sec = $data['course_id'];
      $admission->vac = $data['course_id'];
      $admission->program = $data['course_id'];
      $admission->file_id = $data['course_id'];
      $admission->file_student_id = $data['course_id'];
      $admission->reg_no = $data['reg_no'];
      $admission->acadmic_session_id = $data['reg_no'];
      $admission->fees = $data['reg_no'];
      $admission->tax = $data['reg_no'];
      $admission->total_amount = $data['reg_no'];
      $admission->application_id = $data['reg_no'];
      return $admission;
   }
   public function storeAdmission(array $data): array
   {
      try {

         beginTransaction();
         $user = $this->createUser($data);
         $personalDetails = $this->saveUserPersonalDetials($data, $user);
         $this->saveBankDetials($data, $user);
         $this->saveMatrixEducationHistory($data, $user);
         $this->saveIntermediateEducationHistory($data, $user);
         $this->processAdmission($data, $user);
         commitTransaction();
         Auth::login($user, true);


         return [
            'status' => true,
            'message' => 'Admission successfully saved.',
            'admission_id' => 1,
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
