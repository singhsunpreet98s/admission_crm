<div class="container">
   <div class="card border-danger mb-4">
  <div class="card-header bg-danger text-white fw-bold">Academic Details</div>
  <div class="card-body">

    <!-- 10th Board Details -->
    <fieldset class="border p-3 mb-4">
      <h5 class="w-auto px-2 text-danger fw-bold">10<sup>th</sup> Board (10<sup>th</sup> बोर्ड)</h5>
      <div class="row g-3 mt-2">
        <div class="col-md-2">
          <label for="PassYear10" class="form-label"><small>Passing Year (उत्तीर्ण वर्ष) *</small></label>
          <select class="form-select" name="PassYear10" id="PassYear10" required>
            <option value="">Select</option>
            @foreach($last15years as $year)
              <option value="{!!$year!!}">{!!$year!!}</option>
             @endforeach
            <!-- Add your year options here -->
          </select>
        </div>
        <div class="col-md-6">
          <label for="Board10" class="form-label">10<sup>th</sup> Board (10<sup>th</sup> बोर्ड) *</label>
          <select class="form-select" name="Board10" id="Board10" required>
            <option value="">Select an option</option>
            @foreach($educationBoards as $key =>$name)
              <option value="{!!$key!!}">{!!$name!!}</option>
             @endforeach
            <!-- Add your board options here -->
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">Roll Code *</label>
          <input type="text" name="RollCode10" id="RollCode10" class="form-control" pattern="^[\w-]+$" required placeholder="Roll Code.">
        </div>
        <div class="col-md-2">
          <label class="form-label">Roll No.(अनुक्रमांक) *</label>
          <input type="text" name="RollNo10" id="RollNo10" class="form-control" pattern="^[\w-]+$" required placeholder="Roll No.">
        </div>

        <div class="col-md-4">
          <label class="form-label">Maximum Marks (पूर्णांक) *</label>
          <input type="number" name="MaxMarks10" id="MaxMarks10" class="form-control" min="500" max="2000" required>
        </div>
        <div class="col-md-4">
          <label for="MarksObt10" class="form-label">Marks Obtained (प्राप्तांक) *</label>
          <input type="number" name="MarksObt10" id="MarksObt10" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="MarksObt10Per" class="form-label">Marks Obtained (%) *</label>
          <input type="number" name="MarksObt10Per" id="MarksObt10Per" class="form-control" readonly required>
        </div>
      </div>
    </fieldset>

    <!-- Intermediate Board Details -->
    <fieldset class="border p-3 mb-4">
      <h5 class="w-auto px-2 text-danger fw-bold">Intermediate Board (इन्टरमीडिएट बोर्ड)</h5>
      <div class="row g-3 mt-2">
        <div class="col-md-2">
          <label for="PassYear12" class="form-label"><small>Passing Year (उत्तीर्ण वर्ष) *</small></label>
          <select class="form-select" name="PassYear12" id="PassYear12" required>
            <option value="">Select</option>
            @foreach($last15years as $year)
              <option value="{!!$year!!}">{!!$year!!}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <label for="Board12" class="form-label">Intermediate Board *</label>
          <select class="form-select" name="Board12" id="Board12" required>
            <option value="">Select an option</option>
            @foreach($educationBoards as $key =>$name)
              <option value="{!!$key!!}">{!!$name!!}</option>
             @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">Int Stream *</label>
          <select class="form-select" name="xii_stream" id="xii_stream" required>
            <option value="">Select</option>
            <option value="ARTS">ARTS</option>
            <option value="SCIENCE">SCIENCE</option>
            <option value="COMMERCE">COMMERCE</option>
          </select>
        </div>
        <div class="col-md-2">
          <label class="form-label">Roll Code *</label>
          <input type="text" name="RollCode12" id="RollCode12" class="form-control" pattern="^[\w-]+$" required>
        </div>
        <div class="col-md-2">
          <label class="form-label">Roll No.(अनुक्रमांक) *</label>
          <input type="text" name="RollNo12" id="RollNo12" class="form-control" pattern="^[\w-]+$" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Maximum Marks (पूर्णांक) *</label>
          <input type="number" name="MaxMarks12" id="MaxMarks12" class="form-control" min="100" max="3000" required>
        </div>
        <div class="col-md-4">
          <label for="MarksObt12" class="form-label">Marks Obtained (प्राप्तांक) *</label>
          <input type="number" name="MarksObt12" id="MarksObt12" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="MarksObt12Per" class="form-label">Marks Obt. (%) *</label>
          <input type="text" name="MarksObt12Per" id="MarksObt12Per" class="form-control" readonly required>
        </div>
      </div>
    </fieldset>

    <!-- File Upload Section -->
    <fieldset class="border p-3">
      <h5 class="w-auto px-2 text-danger fw-bold">Document Upload</h5>
      <div class="row g-3 mt-2">
        <div class="col-md-3">
          <label class="form-label">Upload 12th Marksheet *</label>
          <input type="file" onchange="verifySize(this,100)" name="marksheet12" class="form-control" accept=".pdf,.jpg,.jpeg,.png" onchange="validateDoc(this);" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Upload 12th Certificate *</label>
          <input type="file" onchange="verifySize(this,100)" name="certificate12" class="form-control" accept=".pdf,.jpg,.jpeg,.png" onchange="validateDoc(this);" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">CLC *</label>
          <input type="file" onchange="verifySize(this,100)" name="clc" class="form-control" accept=".pdf,.jpg,.jpeg,.png" onchange="validateDoc(this);" required>
        </div>
        <div class="col-md-3" id="otherFieldDiv2" style="display: none;">
          <label class="form-label">Migration *</label>
          <input type="file"  name="migration12" class="form-control" id="otherField2" accept=".pdf,.jpg,.jpeg,.png" onchange="validateDoc(this);">
        </div>
      </div>
    </fieldset>

  </div>
</div>
</div>