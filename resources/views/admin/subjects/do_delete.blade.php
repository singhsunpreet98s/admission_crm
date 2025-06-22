@extends('layouts.modal')
@section('title')
<i  class="text-danger mdi mdi-delete"></i> Delete Category
@endsection
@section('content')
<h4>Are you sure you want to delete this {{$subject->name}}?</h4>
<form method="DELETE" action="{{route("admin.$section.delete",['id'=>$subject->id])}}">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{!!$subject->id!!}" />
     </form>
@endsection
@section('buttons')
<div class="buttons">
   <button type="button" data-submit="modal" class="btn btn-secondary">Delete</button>
       <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
   </div>
@endsection