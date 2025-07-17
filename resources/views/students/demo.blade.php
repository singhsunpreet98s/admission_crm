@extends('layouts.student')
@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white text-center">
          <h4 class="mb-0">Payment Details</h4>
        </div>
        <div class="card-body">
          <form id="paymentForm" method="POST" >
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label fw-bold">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your full name">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="mb-3">
              <label for="amount" class="form-label fw-bold">Amount (INR)</label>
              <input type="number" class="form-control" id="amount" name="amount" required min="1" placeholder="Enter amount">
            </div>

            <div class="mb-3">
              <label for="payment_method" class="form-label fw-bold">Payment Method</label>
              <select id="payment_method" name="payment_method" class="form-select" required>
                <option value="">Select</option>
                <option value="card">Credit/Debit Card</option>
                <option value="upi">UPI</option>
              </select>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-danger">
                <i class="bi bi-credit-card-2-front"></i> Pay Now
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
