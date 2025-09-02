<div class="container">
   <div class="card border-danger mb-4">
    <div class="card-header bg-danger text-white">
      <strong>Applied For</strong>
    </div>
    <div class="card-body row g-3">

      <div class="col-md-4">
        <label class="form-label">Course Name</label>
         <select name="course_id"  class="form-select" required>
          @foreach($data['courses'] as $course)
            <option value="{!!$course->id!!}">{!!$course->name!!}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Programme Name</label>
        <input type="text" class="form-control" name="program_name" value="{!!$data['program_name']!!}" readonly required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Year</label>
        <input type="text" class="form-control" name="ac_year"  value="{!!$data['ac_year']!!}" readonly required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Major Course / Honours Subject</label>
         <select name="major_subject_id" class="form-select" required>
          @foreach($data['major_subjects'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
         </select>
        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="pop_button2">View Major Syllabus for Sem - 1</button>
      </div>

      <div class="col-md-4">
        <label class="form-label">Minor Subject</label>
        <select name="minor_subject_id" id="minor_subject_id" class="form-select" required>
          @foreach($data['minor_subjects'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
        </select>
        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="pop_button">View Minor Syllabus for Sem - 1</button>
      </div>

      <div class="col-md-4">
        <label class="form-label">Interdisciplinary Course</label>
        <select name="idc" class="form-select" required>
          @foreach($data['idc'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
         </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Ability Enhancement Course</label>
        <select name="aec" class="form-select" required>
          @foreach($data['idc'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
         </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Skill Enhancement Course</label>
        <select name="sec" class="form-select" required>
          @foreach($data['major_sec_subjects'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
         </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Value Added Course</label>
        <select name="vac" class="form-select" required>
          @foreach($data['vac'] as $id=>$name)
            <option value="{!!$id!!}">{!!$name!!}</option>
          @endforeach
         </select>
      </div>

    </div>
</div>
</div>