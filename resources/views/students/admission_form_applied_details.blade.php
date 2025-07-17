<div class="container">
   <div class="card border-danger mb-4">
    <div class="card-header bg-danger text-white">
      <strong>Applied For</strong>
    </div>
    <div class="card-body row g-3">

      <div class="col-md-4">
        <label class="form-label">Course Name</label>
        <input type="text" class="form-control" name="course_name"  value="{!!$meritListFile->program_name!!}" readonly required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Programme Name</label>
        <input type="text" class="form-control" name="department" value="{!!$meritListFile->course->code!!}" readonly required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Year</label>
        <input type="text" class="form-control" name="ac_year" value="{!!$meritListFile->semester->name!!}" readonly required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Major Course / Honours Subject</label>
        <input type="text" class="form-control" name="sub_name" value="{!!$registration->major_subjects!!}" readonly required>
        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="pop_button2">View Major Syllabus for Sem - 1</button>
      </div>

      <div class="col-md-4">
        <label class="form-label">Minor Subject</label>
        <select name="sub2" id="select2" class="form-select" required>
          <option value="">Minor Subject</option>
          <option value="{!!$registration->minor_subjects!!}">{!!$registration->minor_subjects!!}</option>
        
        </select>
        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="pop_button">View Minor Syllabus for Sem - 1</button>
      </div>

      <div class="col-md-4">
        <label class="form-label">Interdisciplinary Course</label>
        <select name="sub3" id="select3" class="form-select" required>
          <option value="">Select</option>
          <option value="{!!$registration->idc!!}">{!!$registration->idc!!}</option>
          
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Ability Enhancement Course</label>
        <select name="ll" class="form-select" id="aecoption" required>
          <option value="">Select AEC</option>
           <option value="{!!$registration->mil!!}">{!!$registration->mil!!}</option>
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Skill Enhancement Course</label>
        <select name="sec" class="form-select" required>
          <option value="">Select SEC</option>
          <option value="{!!$registration->majorsec_subjects!!}">{!!$registration->majorsec_subjects!!}</option>
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Value Added Course</label>
        <select name="vac" class="form-select" required>
          <option value="">Select VAC</option>
          <option value="{!!$registration->vac!!}">{!!$registration->vac!!}</option>
        </select>
      </div>

    </div>
</div>
</div>