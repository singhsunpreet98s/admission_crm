<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class DemoController extends Controller
{

   public function demo()
   {
      return view('students.payment');
      $data = [
         'title' => '2025-27',
         'recipt_date' => '30-08-2025',
         'recipt_number' => 'URC-2025-0001',
         'course' => 'B.Sc (Computer Science)',
         'semester' => 'Semester 1',
         'student_name' => 'Aman Kumar',
         'student_f_name' => 'Ramesh Kumar',
         'student_m_name' => 'Suman Devi',
         'roll_no' => 'URC2025001',
         'profile_photo' => 'https://randomuser.me/api/portraits/men/32.jpg',
         'signature' => 'https://dummyimage.com/100x40/000/fff&text=Sign',
         'dob' => '12-05-2005',
         'gender' => 'Male',
         'category' => 'General',
         'aadhar_no' => '1234 5678 9101',
         'address' => '123, MG Road, Patna, Bihar',
         'pin' => '800001',
         'district' => 'Patna',
         'state' => 'Bihar',
         'mobile' => '+91 9876543210',
         'email' => 'aman.kumar@example.com',
         'major_subject' => 'Computer Science',
         'minor_subject' => 'Mathematics',
         'mdc' => 'Environmental Studies',
         'skc' => 'Communication Skills',
         'reg_no' => 'REG2025CS1234',
         'transacton_id' => 'TXN2025URC9876',
      ];
      // return view('students.admission_complete_pay_slip')->with(compact('data'));
      // $pdf = Pdf::loadView('students.admission_complete_pay_slip', compact('data'));

      // // Download file
      // return $pdf->download('fee_receipt.pdf');
      return view('students.admission_complete_pay_slip')->with(compact('data'));
   }
}
