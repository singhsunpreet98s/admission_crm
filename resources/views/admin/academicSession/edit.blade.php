@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Edit Academic session
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.update",['id'=>$academicSession->id])}}">
      @csrf
      @method('PATCH')
       <div class="form-group">
         <label for="name">Start Date</label>
         <input type="date" class="form-control" value="{!!$academicSession->from_date!!}" name="from_date" id="from_date" placeholder="Enter Start Date">
       </div>
      <div class="form-group">
         <label for="name">End Date</label>
         <input type="date" class="form-control" value="{!!$academicSession->to_date!!}" name="to_date" id="to_date" placeholder="Enter End Date">
       </div>
     </form>
   </div>
 </div>
@endsection