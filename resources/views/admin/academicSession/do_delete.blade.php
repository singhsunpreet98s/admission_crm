@extends('layouts.modal')
@section('title')
<i  class="text-danger mdi mdi-delete"></i> Delete Academic Session
@endsection
@section('content')
<h4>Are you sure you want to delete this {{$academicSession->title}}?</h4>
<form method="DELETE" action="{{route("admin.$section.delete",['id'=>$academicSession->id])}}">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{!!$academicSession->id!!}" />
     </form>
@endsection
@section('buttons')
<div class="buttons">
   <button type="button" data-submit="modal" class="btn btn-secondary">Delete</button>
       <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
   </div>
@endsection