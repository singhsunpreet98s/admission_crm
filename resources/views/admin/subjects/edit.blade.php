@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Edit Category
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.update",['id'=>$category->id])}}">
      @csrf
      @method('PATCH')
       <div class="form-group">
         <label for="name">Name</label>
         <input type="text" class="form-control" value="{!!$category->name!!}" name="name" id="name" placeholder="Enter category Name">
       </div>
      
     </form>
   </div>
 </div>
@endsection