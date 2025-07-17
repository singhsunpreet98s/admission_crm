@extends('layouts.student')
@section('content')

<div class="alert alert-danger text-center mt-4">
  <h4 class="text-danger fw-bold">Payment Failed!</h4>
  <p>Unfortunately, the payment could not be processed.</p>
  <a href="" class="btn btn-danger mt-3">
    <i class="bi bi-arrow-left"></i> Try Again
  </a>
</div>


@endsection