<div class="container my-5">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h5 class="mb-0">
        <strong>Contact Details (सम्पर्क करने का विवरण)</strong>
      </h5>
    </div>

    <div class="card-body">
      <!-- Address Section -->
      <fieldset class="border p-3 mb-4">
        <legend class="float-none w-auto px-3 text-danger fw-bold">Address</legend>

        <div class="mb-3">
          <label for="caddress" class="form-label">Address (पत्राचार पता) *</label>
          <textarea class="form-control" name="caddress" id="caddress" rows="3" required placeholder="Enter your address here"></textarea>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="CStateID" class="form-label">State (राज्य) *</label>
            <select class="form-select" name="cstate" id="CStateID" required>
              <option value="">Select Correspondence State</option>
              <option value="1">BIHAR</option>
              <option value="2">CHANDIGARH</option>
              <option value="3">CHHATTISGARH</option>
              <option value="4">DADRA AND NAGAR HAVELI</option>
              <option value="5">DAMAN AND DIU</option>
              <option value="6">DELHI</option>
              <option value="7">GOA</option>
              <option value="8">GUJARAT</option>
              <option value="9">HARYANA</option>
              <option value="10">HIMACHAL PRADESH</option>
              <option value="11">JAMMU AND KASHMIR</option>
              <option value="12">JHARKHAND</option>
              <option value="13">KARNATAKA</option>
              <option value="14">KERALA</option>
              <option value="15">LAKSHADWEEP</option>
              <option value="16">MADHYA PRADESH</option>
              <option value="17">MAHARASHTRA</option>
              <option value="18">MANIPUR</option>
              <option value="19">MEGHALAYA</option>
              <option value="20">MIZORAM</option>
              <option value="21">NAGALAND</option>
              <option value="22">ODISHA</option>
              <option value="23">PUDUCHERRY</option>
              <option value="24">PUNJAB</option>
              <option value="25">RAJASTHAN</option>
              <option value="26">SIKKIM</option>
              <option value="27">TAMIL NADU</option>
              <option value="28">TELANGANA</option>
              <option value="29">TRIPURA</option>
              <option value="30">UTTARAKHAND</option>
              <option value="31">WEST BENGAL</option>
              <option value="32">UTTAR PRADESH</option>
              <option value="33">ANDAMAN AND NICOBAR ISLANDS</option>
              <option value="34">ANDHRA PRADESH</option>
              <option value="35">ARUNACHAL PRADESH</option>
              <option value="36">ASSAM</option>
              <option value="37">OTHERS (NON-INDIAN)</option>
            </select>
          </div>

          <div class="col-md-4 mb-3">
            <label for="cdistrict" class="form-label">District (जिला) *</label>
            <input type="text" class="form-control" name="cdistrict" id="cdistrict" required>
          </div>

          <div class="col-md-4 mb-3">
            <label for="cpin" class="form-label">Pincode (पिनकोड) *</label>
            <input type="number" class="form-control" name="cpin" id="cpin" placeholder="Pincode (पिनकोड)" min="100000" max="999999" required>
          </div>
        </div>
      </fieldset>

      <!-- Contact Info -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="MobileNo" class="form-label">Mobile No (मोबाइल नंबर) *</label>
          <input type="text" class="form-control" name="phone" id="MobileNo" minlength="10" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required placeholder="Mobile No (मोबाइल नंबर)">
        </div>

        <div class="col-md-6 mb-3">
          <label for="EmailID" class="form-label">Email (ईमेल आईडी) *</label>
          <input type="email" class="form-control" name="email" id="EmailID" required placeholder="Email (ईमेल आईडी)">
        </div>
      </div>

      <div class="alert alert-warning mt-4 small">
        <strong><i class="bi bi-info-circle-fill"></i> सूचना / Notice:</strong><br>
        अभ्यर्थी को अपना या अपने घर के किसी सदस्य के ही मोबाइल नंबर एवं ईमेल आईडी भरना है । प्रवेश से सम्बंधित सारी सूचनायें मोबाइल एवं ईमेल पर ही भेजी जाएँगी । गलत मोबाइल नंबर या ईमेल आईडी देने पर प्रवेश से वंचित रह सकते हैं, जिसकी जिम्मेदारी स्वयं अभ्यर्थी की होगी । एक मोबाइल नंबर पर केवल 1 फॉर्म हीं भरा जा सकता हैं ।
      </div>
    </div>
  </div>
</div>