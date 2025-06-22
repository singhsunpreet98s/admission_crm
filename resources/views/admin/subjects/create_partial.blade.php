 <div class="form-group">
         <label for="name">Name</label>
         <input type="text" class="form-control" name="name" value="{!!$name!!}" id="name" placeholder="Enter Subject Name">
</div>
<div class="form-group">
         <label for="course_id">Courses</label>
      <select class="form-select" name="course_id" id="course_id" required>
        <option value="">-- Select Course --</option>
        @foreach ($courses as $key=>$value)
          <option value="{{$key}}" {{ $key == $selectedCourseId ? 'selected' : '' }}>
            {{ $value }}
          </option>
        @endforeach
      </select>
</div>
@if(isset($semesters) && count($semesters)>0)
   <div class="form-group">
         <label for="semester_id">Semesters</label>
      <select class="form-select" name="semester_id" id="semester_id" required>
        <option value="">-- Select Semester --</option>
        @foreach ($semesters as $key=>$value)
          <option value="{{$key}}" >
            {{ $value }}
          </option>
        @endforeach
      </select>
@endif
<div style="margin-left: 22px">
   <div class="form-check">
    <input
        class="form-check-input"
        type="checkbox"
        name="is_minor"
        id="is_minor"
        value="1"
        {{ (isset($isMinor) ? $isMinor : old('is_minor')) ? 'checked' : '' }}
    >
    <label class="form-check-label" for="is_minor">
        Minor Subject
    </label>
</div>

{{-- NEW: Extra checkbox --}}
<div class="form-check">
    <input
        class="form-check-input"
        type="checkbox"
        name="is_extra"
        id="is_extra"
        value="1"
        {{ (isset($isExtra) ? $isExtra : old('is_extra')) ? 'checked' : '' }}
    >
    <label class="form-check-label" for="is_extra">
        Extra Subject
    </label>
</div>
</div>

      