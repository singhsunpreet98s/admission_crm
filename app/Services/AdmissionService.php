<?php

namespace App\Services;

use App\Models\Admission;
use App\Models\StudentAcadmicDetails;
use App\Models\StudentAcadmicDocuments;
use App\Models\StudentAddress;
use App\Models\StudentAdmissionInfo;
use App\Models\StudentBankDetails;
use App\Models\StudentOtherDocuments;
use App\Models\StudentOtherInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmissionService
{
   public function storeAdmission(array $data): array
   {
      try {

         beginTransaction();
         $user = new User();
         $user->email =  $data['email'];
         $user->name = $data['student_name'];
         $user->password = bcrypt($data['ureg_no']);
         $user->category_id = $data['category'];
         $user->university_reg_no  = $data['ureg_no'];
         $user->role = "student";
         $user->merit_list_id = $data['merit_list_id'];
         $user->merit_list_student_id = $data['merit_list_student_id'];
         $user->save();

         // address detials 
         $studentAddress = new StudentAddress();
         $studentAddress->address = $data['caddress'];
         $studentAddress->state = $data['cstate'];
         $studentAddress->distict = $data['cdistrict'];
         $studentAddress->pincode = $data['cpin'];
         $studentAddress->mobile = $data['phone'];
         $studentAddress->email = $data['email'];
         $studentAddress->student_id = $user->id;
         $studentAddress->save();



         $studentBankDetails = new StudentBankDetails();
         $studentBankDetails->account_holder_name = $data['baccount_name'];
         $studentBankDetails->bank_account_number = $data['baccount_no'];
         $studentBankDetails->ifsc_code = $data['baccount_ifsc'];
         $studentBankDetails->bank = $data['baccount_bname'];
         $studentBankDetails->student_id = $user->id;
         $studentBankDetails->save();
         // there will be 2 types of acadmic detials which are filled first is 10 and 12
         //logic for 10
         $studentAcadmicDetails1 = new StudentAcadmicDetails();
         $studentAcadmicDetails1->education_level = "10";
         $studentAcadmicDetails1->passing_year = $data['PassYear10'];
         $studentAcadmicDetails1->board_university = $data['Board10'];
         $studentAcadmicDetails1->roll_no = $data['RollNo10'];
         $studentAcadmicDetails1->roll_code = $data['RollNo10'];
         $studentAcadmicDetails1->marks_obtained = $data['MarksObt10'];
         $studentAcadmicDetails1->maximum_marks = $data['MaxMarks10'];
         $studentAcadmicDetails1->percentage = $data['MarksObt10Per'];
         $studentAcadmicDetails1->student_id = $user->id;
         $studentAcadmicDetails1->save();


         $studentAcadmicDetails2 = new StudentAcadmicDetails();
         $studentAcadmicDetails2->education_level = "12";
         $studentAcadmicDetails2->passing_year = $data['PassYear12'];
         $studentAcadmicDetails2->board_university = $data['Board12'];
         $studentAcadmicDetails2->roll_no = $data['RollNo12'];
         $studentAcadmicDetails2->roll_code = $data['RollCode12'];
         $studentAcadmicDetails2->marks_obtained = $data['MarksObt12'];
         $studentAcadmicDetails2->maximum_marks = $data['MaxMarks12'];
         $studentAcadmicDetails2->percentage = $data['MarksObt12Per'];
         $studentAcadmicDetails2->student_id = $user->id;
         $studentAcadmicDetails2->save();

         $marksheet = $data['marksheet12'];
         $certificate = $data['certificate12'];
         $cls =  $data['clc'];
         $marksheetPath = $marksheet->store('documents', 'public');
         $certificatePath = $certificate->store('documents', 'public');
         $clsPath = $cls->store('documents', 'public');

         $marksheetDocument = new StudentAcadmicDocuments();


         $marksheetDocument->student_id = $user->id;
         $marksheetDocument->student_acadmic_details_id = $studentAcadmicDetails2->id;
         $marksheetDocument->doc_type = "12th Mark Sheet";
         $marksheetDocument->file_name = $marksheet->getClientOriginalName();
         $marksheetDocument->file_path = $marksheetPath;
         $marksheetDocument->save();

         $certificateDocument = new StudentAcadmicDocuments();
         $certificateDocument->student_id = $user->id;
         $certificateDocument->student_acadmic_details_id = $studentAcadmicDetails2->id;
         $certificateDocument->doc_type = "12th Certificate";
         $certificateDocument->file_name = $certificate->getClientOriginalName();
         $certificateDocument->file_path = $certificatePath;
         $certificateDocument->save();

         $clsDocument = new StudentAcadmicDocuments();
         $clsDocument->student_id = $user->id;
         $clsDocument->student_acadmic_details_id = $studentAcadmicDetails2->id;
         $clsDocument->doc_type = "12th CLS Document";
         $clsDocument->file_name = $cls->getClientOriginalName();
         $clsDocument->file_path = $clsPath;
         $clsDocument->save();
         $studentOtherInfo = new StudentOtherInfo();
         $studentOtherInfo->ureg_no =  $data['ureg_no'];
         $studentOtherInfo->list_type = $data['list_type'];
         $studentOtherInfo->session_yr = $data['session_yr'];
         $studentOtherInfo->quota_type = $data['quota_type'];
         $studentOtherInfo->relegion = $data['relegion'];
         $studentOtherInfo->aadhar_no = $data['aadhar'];
         $studentOtherInfo->student_id = $user->id;
         $studentOtherInfo->ews = isset($data['ews']) ? "Yes" : "No";
         $studentOtherInfo->save();


         // if ($studentOtherInfo->ews == "Yes") {
         //    $file = $data['ews'];
         //    $path = $file->store('documents', 'public');
         //    $studentOtherDoc = new StudentOtherDocuments();
         //    $studentOtherDoc->student_id = $user->id;
         //    $studentOtherDoc->file_path = $path;
         //    $studentOtherDoc->doc_type = "ews";
         //    $studentOtherDoc->save();
         // }
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
