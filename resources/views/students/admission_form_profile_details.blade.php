<div class="container my-5">
      <div class="card shadow-sm">
         <div class="card-header bg-danger text-white">
            <h5 class="mb-0">
            <strong>Candidate Profile (अभ्यर्थी का विवरण)</strong><br>
            <small class="fw-light">As per Highschool/Intermediate Marksheet/Admit Card (हाईस्कूल / इंटरमीडिएट के परीक्षाफल/प्रवेश पत्रानुसार)</small>
            </h5>
         </div>

         <div class="card-body">
            <!-- Hidden Fields -->
            <input type="hidden" name="ureg_no" value="{!!$registration->res_no!!}">
            <input type="hidden" name="list_type" value="4TH LIST">
            <input type="hidden" name="session_yr" value="2024-28">
            <input type="hidden" name="quota_type" value="">

            <!-- Student Info -->
            <div class="mb-3">
            <label for="student_name" class="form-label">Student Name (अभ्यर्थी का नाम) *</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="{!!$registration->student_name!!}" readonly required>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
               <label for="father_name" class="form-label">Father's Name (पिता का नाम) *</label>
               <input type="text" class="form-control" id="father_name" name="father_name" value="{!!$registration->fathers_name!!}"  required readonly>
            </div>
            <div class="col-md-6 mb-3">
               <label for="mother_name" class="form-label">Mother's Name (माता का नाम) *</label>
               <input type="text" class="form-control" id="mother_name" name="mother_name" required>
            </div>
            </div>

            <div class="row">
            <div class="col-md-3 mb-3">
               <label for="dob" class="form-label">Date of Birth (जन्म तिथि) *</label>
               <input type="date" class="form-control" id="dob" name="dob" required min="1980-01-01" max="2009-12-31">
            </div>

            <div class="col-md-3 mb-3">
               <label for="gender" class="form-label">Gender (लिंग) *</label>
               <input type="text" class="form-control" id="gender" name="gender" value="{!!$registration->gender!!}" readonly required>
            </div>

            <div class="col-md-3 mb-3">
               <label for="category" class="form-label">Category (श्रेणी) *</label>
               <input type="text" class="form-control" id="category" name="category" value="{!!$registration->category!!}" readonly required>
               @if($registration->category!= "UR")
               <label class="form-label mt-2">Upload Category Certificate</label>
               <input type="file" onchange="verifySize(this,100)" class="form-control" name="category_certificate" accept=".pdf,.jpg,.jpeg,.png" required>
               @endif
            </div>

            <div class="col-md-3 mb-3">
               <label for="relegion" class="form-label">Religion (धर्म) *</label>
               <select class="form-select" id="relegion" name="relegion" required>
                  <option value="">Select Religion</option>
                  <option value="HINDU">HINDU</option>
                  <option value="MUSLIM">MUSLIM</option>
                  <option value="CHRISTIAN">CHRISTIAN</option>
                  <option value="SIKH">SIKH</option>
                  <option value="JAIN">JAIN</option>
                  <option value="BUDDHIST">BUDDHIST</option>
                  <option value="ZOROASTRIAN">ZOROASTRIAN</option>
                  <option value="OTHERS">OTHERS</option>
               </select>
            </div>
            </div>

            <div class="alert alert-danger text-center">
            <strong>अभ्यर्थी अपना जाती प्रमाण पत्र अनिवार्य रूप से अपलोड करें | गलत पाए जाने पर नामांकन स्वतः रद्द कर दिया जायेगा |</strong>
            </div>

            <div class="row">
            <div class="col-md-4 mb-3">
               <label for="aadhar" class="form-label">AADHAAR No. (आधार संख्या) *</label>
               <input type="text" class="form-control" id="aadhar" name="aadhar" pattern="\d{12}" minlength="12" maxlength="12" required>
            </div>

            <div class="col-md-4 mb-3">
               <label for="seeAnotherField" class="form-label">Do you possess EWS Certificate?</label>
               <select class="form-select" id="seeAnotherField" name="ews" onchange="document.getElementById('otherFieldDiv').style.display = this.value === 'Yes' ? 'block' : 'none';">
                  <option value="No" selected>No</option>
                  <option value="Yes">Yes</option>
               </select>
               <div id="otherFieldDiv" class="mt-2" style="display:none;">
                  <label for="ews_certificate" class="form-label">Upload EWS Certificate</label>
                  <input type="file" onchange="verifySize(this,100)"  class="form-control" name="ews_certificate" id="ews_certificate" accept=".pdf,.jpg,.jpeg,.png">
               </div>
            </div>

            <div class="col-md-4 mb-3">
               <label for="reservation" class="form-label">Disabled Category *</label>
               <select class="form-select" name="reservation" id="reservation" onchange="document.getElementById('otherFieldDiv4').style.display = this.value !== 'NA' && this.value !== '' ? 'block' : 'none';" required>
                  <option value="">Select Disabled Category</option>
                  <option value="VH">Visually Handicapped (VH)</option>
                  <option value="HH">Hearing Handicapped (HH)</option>
                  <option value="OH">Orthopaedically Handicapped (OH)</option>
                  <option value="NA">Not Applicable</option>
               </select>
               <div id="otherFieldDiv4" class="mt-2" style="display:none;">
                  <label class="form-label">Upload Disability Certificate</label>
                  <input type="file" class="form-control" onchange="verifySize(this,100)" name="reservation_certificate" accept=".pdf,.jpg,.jpeg,.png">
               </div>
            </div>
            </div>

            <div class="alert alert-danger text-center">
            <small>ई.डब्ल्यू.एस. में आवेदन करने वाले अभ्यर्थी अपने मूल श्रेणी में आरक्षण का लाभ नहीं ले पाएंगे |<br>
            If you apply for EWS below, you will not be able to claim reservation in your parent category.</small>
            </div>

            <div class="row">
            <div class="col-md-6 mb-4">
               <label for="abc_id" class="form-label">ABC (Academic Bank Of Credits) ID</label>
               <input type="text" class="form-control" name="abc_id" id="abc_id" placeholder="ABC (Academic Bank Of Credit) Id" required>
               <a href="https://www.abc.gov.in/" target="_blank" class="text-danger mt-2 d-block" style="font-style: italic;">Click Here To Know/Generate ABC ID</a>
            </div>
            </div>
         </div>
      </div>
   </div>