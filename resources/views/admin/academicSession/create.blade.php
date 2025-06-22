@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Add New Session
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.store")}}">
      @csrf
       <div class="form-group">
         <label for="from_date">Start Date</label>
         <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter Start Date">
       </div>
       <div class="form-group">
         <label for="to_date">End Date</label>
         <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter End Date">
       </div>
     </form>
   </div>
 </div>
@endsection