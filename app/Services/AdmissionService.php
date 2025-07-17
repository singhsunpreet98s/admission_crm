<?php

namespace App\Services;

use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmissionService
{
   public function storeAdmission(array $data): array
   {
      try {
         $admission = DB::transaction(function () use ($data) {
            return Admission::create([
               'user_id' => 1,
               'created_by' => 1,
               'course_id' => 5,
               'semester_id' => 15,
               'ureg_no' => $data['ureg_no'] ?? null,
               'list_type' => $data['list_type'] ?? null,
               'session_yr' => $data['session_yr'] ?? null,
               'quota_type' => $data['quota_type'] ?? null,
               'student_name' => $data['student_name'] ?? null,
               'father_name' => $data['father_name'] ?? null,
               'mother_name' => $data['mother_name'] ?? null,
               'dob' => $data['dob'] ?? null,
               'gender' => $data['gender'] ?? null,
               'category' => $data['category'] ?? null,
               'relegion' => $data['relegion'] ?? null,
               'aadhar' => $data['aadhar'] ?? null,
               'ews' => $data['ews'] ?? null,
               'ews_certificate' => $data['ews_certificate'] ?? null,
               'reservation' => $data['reservation'] ?? null,
               'reservation_certificate' => $data['reservation_certificate'] ?? null,
               'abc_id' => $data['abc_id'] ?? null,
               'caddress' => $data['caddress'] ?? null,
               'cstate' => $data['cstate'] ?? null,
               'cdistrict' => $data['cdistrict'] ?? null,
               'cpin' => $data['cpin'] ?? null,
               'phone' => $data['phone'] ?? null,
               'email' => $data['email'] ?? null,
               'course_name' => $data['course_name'] ?? null,
               'department' => $data['department'] ?? null,
               'ac_year' => $data['ac_year'] ?? null,
               'sub_name' => $data['sub_name'] ?? null,
               'sub2' => $data['sub2'] ?? null,
               'sub3' => $data['sub3'] ?? null,
               'll' => $data['ll'] ?? null,
               'sec' => $data['sec'] ?? null,
               'vac' => $data['vac'] ?? null,

               'PassYear10' => $data['PassYear10'] ?? null,
               'Board10' => $data['Board10'] ?? null,
               'RollCode10' => $data['RollCode10'] ?? null,
               'RollNo10' => $data['RollNo10'] ?? null,
               'MaxMarks10' => $data['MaxMarks10'] ?? null,
               'MarksObt10' => $data['MarksObt10'] ?? null,
               'MarksObt10Per' => $data['MarksObt10Per'] ?? null,

               'PassYear12' => $data['PassYear12'] ?? null,
               'Board12' => $data['Board12'] ?? null,
               'xii_stream' => $data['xii_stream'] ?? null,
               'RollCode12' => $data['RollCode12'] ?? null,
               'RollNo12' => $data['RollNo12'] ?? null,
               'MaxMarks12' => $data['MaxMarks12'] ?? null,
               'MarksObt12' => $data['MarksObt12'] ?? null,
               'MarksObt12Per' => $data['MarksObt12Per'] ?? null,
               'marksheet12' => $data['marksheet12'] ?? null,
               'certificate12' => $data['certificate12'] ?? null,
               'clc' => $data['clc'] ?? null,
               'migration12' => $data['migration12'] ?? null,

               'baccount_name' => $data['baccount_name'] ?? null,
               'baccount_no' => $data['baccount_no'] ?? null,
               'baccount_noc' => $data['baccount_noc'] ?? null,
               'baccount_ifsc' => $data['baccount_ifsc'] ?? null,
               'baccount_bname' => $data['baccount_bname'] ?? null,

               'declaration' => $data['declaration'] ?? null,
            ]);
         });

         return [
            'status' => true,
            'message' => 'Admission successfully saved.',
            'admission_id' => $admission->id,
         ];
      } catch (\Exception $e) {
         return [
            'status' => false,
            'message' => 'Failed to save admission.',
            'error' => $e->getMessage(),
         ];
      }
   }
}
