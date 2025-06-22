@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Add New Subject
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="POST" action="{{route("admin.$section.store")}}">
      @csrf
      <div id="{{$section}}_form">
        @include("admin.$section.create_partial")
      </div>
     </form>
   </div>
 </div>
@endsection