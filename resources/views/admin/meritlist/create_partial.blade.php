        <div class="form-group">
         <label for="list_number">List Number</label>
      <select class="form-select" name="list_number" id="list_number" required>
        <option value="">Select List Number</option>
        @foreach (getListTypes() as $key=>$value)
          <option value="{{$key}}" {{ $key == $selectedListNumber ? 'selected' : '' }}>
            {{ $value }}
          </option>
        @endforeach
      </select>
       </div>
        <div class="form-group">
         <label for="program">Program</label>
      <select class="form-select" name="program" id="program" required>
        <option value="">Select Program</option>
        @foreach (getPrograms() as $key=>$value)
          <option value="{{$key}}" {{ $key == $selectedProgram ? 'selected' : '' }}>
            {{ $value }}
          </option>
        @endforeach
      </select>
       </div>
       <div class="form-group">
         <label for="name">Session</label>
         <input type="text" class="form-control" value="{{calculateSession($selectedProgram)}}" name="session" id="session" disabled>
       </div>
       @if(isset($courses) && count($courses)>0)
        <div class="form-group">
          <label for="course_id">Course</label>
            <select class="form-select" name="course_id" id="course_id" required>
              <option value="">Select Course</option>
              @foreach ($courses as $key=>$value)
                <option value="{{$key}}"  {{ $key == $selectedCourse ? 'selected' : '' }}>
                  {{ $value }}
                </option>
              @endforeach
            </select>
        </div>
       @endif
        @if(isset($semesters) && count($semesters)>0)
        <div class="form-group">
         <label for="semester_id">Semester</label>
      <select class="form-select" name="semester_id" id="semester_id" required>
        <option value="">Select Semester</option>
        @foreach ($semesters as $key=>$value)
          <option value="{{$key}}" >
            {{ $value }}
          </option>
        @endforeach
      </select>
       </div>
       @endif
      <div class="form-group">
         <label for="file">Attach File</label>
         <input type="file" class="form-control" name="file" id="file" placeholder="Please select File">
       </div>