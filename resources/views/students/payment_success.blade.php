@extends('layouts.student')
@section('content')
<div class="alert alert-success text-center mt-4">
  <h4 class="text-success fw-bold">Payment Successful!</h4>
  <p>Thank you, your payment has been received.</p>
  <p><strong>Transaction ID:</strong> 234234234</p>
  <a href="" class="btn btn-success mt-3">
    <i class="bi bi-download"></i> Download Receipt
  </a>
</div>
@endsection