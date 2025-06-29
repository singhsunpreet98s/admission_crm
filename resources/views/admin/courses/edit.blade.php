@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Add New Course
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.update",['id'=>$course->id])}}">
      @csrf
      @method('PATCH')
       <div class="form-group">
         <label for="name">Name</label>
         <input type="text" class="form-control" value="{!!$course->name!!}" name="name" id="name" placeholder="Enter Course Name">
       </div>
       <div class="form-group">
         <label for="code">Code</label>
         <input type="text" class="form-control" value="{!!$course->code!!}" name="code" id="name" placeholder="Enter Course Code">
       </div>
        <div class="form-group">
         <label for="program">Program</label>
      <select class="form-select" name="program" id="program" required>
        <option value="">Select Program</option>
        @foreach (getPrograms() as $key=>$value)
          <option value="{{$key}}" {{ $key == $course->program_name ? 'selected' : '' }}>
            {{ $value }}
          </option>
        @endforeach
      </select>
       </div>
     </form>
   </div>
 </div>
@endsection