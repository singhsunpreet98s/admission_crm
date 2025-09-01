<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Fee Receipt</title>
   <style>
      @page {
         size: A4;
         margin: 20mm;
      }

      body {
         font-family: Arial, sans-serif;
         font-size: 12px;
         color: #333;
         margin: 0;
         padding: 0;
         background: #fff;
      }

      .container {
         width: 100%;
         border: 1px solid black;
         padding: 10px 15px;
         box-sizing: border-box;
      }

      h2 {
         text-align: center;
         margin: 5px 0 15px 0;
      }

      h4 {
         margin: 8px 0;
         color: gray;
         border-bottom: 1px solid #aaa;
         font-size: 13px;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 10px;
      }

      td {
         padding: 4px;
         vertical-align: top;
      }

      .label {
         font-weight: bold;
         width: 25%;
      }

      .photo {
         width: 60px;
         height: auto;
         border: 1px solid #333;
         margin-bottom: 5px;
      }

      .signature {
         width: 60px;
         height: auto;
         border: 1px solid #333;
      }

      .qr {
         width: 60px;
         border: 1px solid #333;
         padding: 4px;
      }

      .declaration {
         font-size: 12px;
         line-height: 1.4;
         text-align: justify;
      }
   </style>
</head>

<body>
   <div style="text-align: center; margin-bottom: 10px;">
      <img src="https://urcollege.in/images/URC_ICON/urcc_logo.jpg" style="height: 80px;">
   </div>

   <h2>FEE RECEIPT FOR {{$data['title']}} ADMISSION</h2>

   <div class="container">

      <!-- Basic Details -->
      <h4>Basic Details</h4>
      <table>
         <tr>
            <td class="label">Date</td>
            <td colspan="3">{{$data['recipt_date']}}</td>
            <td rowspan="4" style="text-align: right;">
               <img class="photo" src="{{$data['profile_photo']}}"><br>
               <img class="signature" src="{{$data['signature']}}">
            </td>
            <td rowspan="4" style="text-align: right;">
               <div style="font-size: 11px; font-weight: bold;">2025-27</div>
               <img class="qr" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfeC8C-HKFx-cWkS4LgoQw_DubpS4kCdkyjw&s">
               <div style="font-size: 11px; font-weight: bold;">234234243243</div>
            </td>
         </tr>
         <tr><td class="label">Receipt Number</td><td>{{$data['recipt_number']}}</td></tr>
         <tr><td class="label">Course</td><td>{{$data['course']}}</td></tr>
         <tr><td class="label">Academic Year</td><td>{{$data['semester']}}</td></tr>
         <tr><td class="label">Applicant's Name</td><td>{{$data['student_name']}}</td></tr>
         <tr><td class="label">Father's Name</td><td>{{$data['student_f_name']}}</td></tr>
         <tr><td class="label">Mother's Name</td><td>{{$data['student_m_name']}}</td></tr>
         <tr><td class="label">College Roll No</td><td>{{$data['roll_no']}}</td></tr>
      </table>

      <!-- Personal Details -->
      <h4>Personal Details</h4>
      <table>
         <tr><td class="label">DOB</td><td>{{$data['dob']}}</td></tr>
         <tr><td class="label">Gender</td><td>{{$data['gender']}}</td></tr>
         <tr><td class="label">Category</td><td>{{$data['category']}}</td></tr>
         <tr><td class="label">Aadhar</td><td>{{$data['aadhar_no']}}</td></tr>
      </table>

      <!-- Correspondence -->
      <h4>Details for Correspondence</h4>
      <table>
         <tr><td class="label">Address</td><td colspan="3">{{$data['address']}}</td></tr>
         <tr>
            <td class="label">Pin Code</td><td>{{$data['pin']}}</td>
            <td class="label">District</td><td>{{$data['district']}}</td>
         </tr>
         <tr>
            <td class="label">State</td><td>{{$data['state']}}</td>
            <td class="label">Mobile</td><td>{{$data['mobile']}}</td>
         </tr>
         <tr>
            <td class="label">Email</td><td colspan="3">{{$data['email']}}</td>
         </tr>
      </table>

      <!-- General Details -->
      <h4>General Details</h4>
      <table>
         <tr><td class="label">Major Subject</td><td>{{$data['major_subject']}}</td></tr>
         <tr><td class="label">Minor Subject</td><td>{{$data['minor_subject']}}</td></tr>
         <tr><td class="label">Multidisciplinary</td><td>{{$data['mdc']}}</td></tr>
         <tr><td class="label">Skill Enhancement</td><td>{{$data['skc']}}</td></tr>
         <tr><td class="label">University Reg. No</td><td>{{$data['reg_no']}}</td></tr>
         <tr><td class="label">University Roll No</td><td>{{$data['roll_no']}}</td></tr>
      </table>

      <!-- Fee Details -->
      <h4>Fee Details</h4>
      <table>
         <tr><td class="label">Transaction ID</td><td>{{$data['transacton_id']}}</td></tr>
         <tr><td class="label">Total Paid</td><td><strong>NIL (Rs Zero only)</strong></td></tr>
      </table>
      <p style="font-size: 11px;"><strong>NOTE:</strong> Rs.100 Online processing charge</p>
   </div>

   <!-- Declaration -->
   <div style="margin-top: 15px;">
      <h4>Declaration by Student</h4>
      <p class="declaration">
         I hereby declare that all the information given by me in this application is true and correct to the best of my
         knowledge and belief. I have read and understood the contents of the admission form for the various Programmes.
         I do hereby undertake to attend minimum 75% classes as stipulated by the Universities of Bihar. I am also aware
         that if I fail to maintain my percentage of attendance in my class, I am liable for penalization and will not
         be allowed to appear for my university exams. I hereby permit the college to use, display or transfer any of
         the details furnished by me in this form for complying with the admission formalities.
      </p>
   </div>
</body>
</html>
