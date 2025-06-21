@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Add New Category
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.store")}}">
      @csrf
       <div class="form-group">
         <label for="name">Name</label>
         <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
       </div>
      
     </form>
   </div>
 </div>
@endsection