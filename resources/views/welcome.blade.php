@extends('layouts.student')
@section('content')


  <!-- Notice -->
  <div class="scroll-notice mb-3">
    <span>स्नातक प्रथम सेमेस्टर सत्र 2025-29 में नामांकन लेने वाले सभी छात्र/छात्राओं को सूचित किया जाता है...</span>
  </div>

  <!-- Warning -->
  <div class="alert alert-danger fw-bold" role="alert">
    स्नातक प्रथम सेमेस्टर सत्र 2025-29 में नामांकन लेने वाले सभी छात्र/छात्राओं को सूचित किया जाता है कि अगर आपका जाति, जेंडर (मेल/फीमेल) गलत है या अधिक अंक देकर आपका नाम मैरिट लिस्ट में आया है तो आप बिना महाविद्यालय के अनुमति के नामांकन नहीं लेंगे। अन्यथा आपका नामांकन रद्द कर दिया जाएगा।
  </div>

  <div class="row g-4">

    <!-- Left Column -->
    <div class="col-md-6">

      <div class="d-grid gap-3">
        <a href="/images/Correction.pdf" class="btn btn-danger">
          <i class="bi bi-file-earmark-text"></i> Correction Form
        </a>
        <a href="/images/Registration.pdf" class="btn btn-danger">
          <i class="bi bi-file-earmark-text"></i> Registration Form
        </a>
        <a href="/images/Examination fee.pdf" class="btn btn-danger">
          <i class="bi bi-file-earmark-text"></i> Examination Fee Form
        </a>
        <a href="admission-instructions.php" class="btn btn-danger">
          <i class="bi bi-info-circle"></i> Instructions for Applicant <br>आवेदक के लिए आवश्यक निर्देश
        </a>
        <a href="category.pdf" target="_blank" class="btn btn-danger">
          <i class="bi bi-list-check"></i> List of Castes under Categories <br>( श्रेणी के अंतर्गत जातियों की सूची )
        </a>
        <a href="../studentlogin/" class="btn btn-success">
          <i class="bi bi-person-circle"></i> Student Login (स्टूडेंट लॉग इन)
        </a>
        <a href="../admission-dashboard/" class="btn btn-success">
          <i class="bi bi-building"></i> College Login (कॉलेज लॉग इन)
        </a>
        <a href="admission-rules.php" class="btn btn-warning">
          <i class="bi bi-exclamation-circle"></i> Admission Rule (प्रवेश नियमावली)
        </a>
      </div>

    </div>

    <!-- Right Column -->
    <div class="col-md-6">
      
        <a href="{{route('students.checkApplicationStatus')}}" class="btn btn-danger btn-lg w-100 mb-4">
          <i class="bi bi-arrow-right-circle"></i> Go for Online Admission Process <br>ऑनलाइन प्रवेश प्रक्रिया
        </a>

      <div class="alert alert-warning">
        <strong>महत्वपूर्ण:</strong> नामांकन के बाद महाविद्यालय में डॉक्यूमेंट सत्यापित करवाना अनिवार्य है, अन्यथा नामांकन स्वतः रद्द हो जायेगा।
      </div>

      <div class="alert alert-danger">
        <strong>चेतावनी:</strong> मॉडिफाइड किये हुए ही छात्र नामांकन लें। प्रतिष्ठा का विषय बदलकर नामांकन न करें। अन्यथा नामांकन रद्द हो सकता है।
      </div>
    </div>
  </div>

  <!-- Document List -->
  <div class="my-5">
    <h4 class="section-title"><i class="bi bi-journal-text"></i> ADMISSION PROCESS</h4>
    <h5>LIST OF DOCUMENTS REQUIRED (JPEG/PDF):</h5>
    <ul>
      <li>10th mark sheet (100 kb)</li>
      <li>10th Certificate (100 kb)</li>
      <li>12th mark sheet (100 kb)</li>
      <li>12th Certificate (100 kb)</li>
      <li>College Leaving Certificate (100 kb)</li>
      <li>University Offer Letter (100 kb)</li>
      <li>Aadhaar Card (100 kb)</li>
      <li>Caste Certificate (if applicable)</li>
      <li>EWS Certificate (if applicable)</li>
      <li>Migration Certificate (if applicable)</li>
      <li>Passport Size Photo (50 kb)</li>
      <li>Self Signature (20 kb)</li>
      <li>यदि ऊपर दिए गए कोई डॉक्यूमेंट नहीं है, तो आवेदन पत्र लिखकर उसकी स्कैन कॉपी अपलोड करें।</li>
    </ul>
  </div>

  <!-- How to Fill Form -->
  <div class="my-5">
    <h4 class="section-title"><i class="bi bi-pencil-square"></i> How to Fill Admission Form?</h4>
    <ol>
      <li>Visit the official website of the College</li>
      <li>Click “Online Admission Portal”</li>
      <li>Click “Admission Process”</li>
      <li>Check your allotment by reference number</li>
      <li>Click on “Click here for Admission”</li>
      <li>Enter details in required fields</li>
      <li>Upload necessary documents</li>
      <li>Complete the fee payment</li>
      <li>Print your Admission receipt</li>
      <li>Keep documents and payment slip for verification</li>
    </ol>
  </div>

  <!-- Admission Rules -->
  <div class="my-5">
    <h4 class="section-title"><i class="bi bi-exclamation-triangle"></i> Admission Rules (प्रवेश नियमावली)</h4>
    <ul>
      <li>Wrong information can lead to cancellation</li>
      <li>Submit original documents for verification</li>
      <li>Admission only valid if allotted to this college</li>
      <li>Fees once paid are non-refundable</li>
      <li>College is not responsible for cyber cafe errors</li>
    </ul>
  </div>
@endsection