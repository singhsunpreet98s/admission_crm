@extends('layouts.student')
@section('styles')
<style>
     .payment-option {
        cursor: pointer;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        padding: 15px;
        transition: all 0.3s;
     }
     .payment-option:hover {
        border-color: #dc3545;
        background: #fff5f5;
     }
     .payment-option.active {
        border-color: #dc3545;
        background: #fff0f0;
        box-shadow: 0 0 10px rgba(220,53,69,0.3);
     }
  </style>
@endsection
@section('content')
<div class="container my-5">
   <div class="row justify-content-center">
      <div class="col-lg-8">
         <div class="card border-danger shadow-sm">
            <div class="card-header bg-danger text-white">
               <strong>Secure Checkout</strong>
            </div>
            <div class="card-body">
            <form method="POST" action="">
               <!-- Candidate Info -->
               <div class="row g-3 mb-4">
                  <div class="col-md-6">
                     <label class="form-label">Candidate Name</label>
                     <input type="text" class="form-control" value="{{$data['student_name']}}" readonly>
                  </div>
                  <div class="col-md-6">
                     <label class="form-label">Course</label>
                     <input type="text" class="form-control" value="{{$data['course']}}" readonly>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Amount</label>
                     <input type="text" class="form-control" value="₹ {{$data['amount_before_tax']}}" readonly>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label">Tax (18%)</label>
                     <input type="text" class="form-control" value="₹ {{$data['tax']}}" readonly>
                  </div>
                  <div class="col-md-4">
                     <label class="form-label fw-bold text-danger">Total Payable</label>
                     <input type="text" class="form-control fw-bold text-danger" value="₹ {{$data['amount_after_tax']}}" readonly>
                  </div>
               </div>

               <!-- Payment Options -->
               <h5 class="mb-3">Select Payment Method</h5>
               <div class="row g-3">
                  <div class="col-md-6">
                     <div class="payment-option" data-option="debit">
                        <i class="bi bi-credit-card fs-3 text-danger"></i>
                        <h6 class="mt-2 mb-0">Debit Card</h6>
                        <small class="text-muted">Pay using your Debit Card</small>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="payment-option" data-option="credit">
                        <i class="bi bi-credit-card-2-front fs-3 text-danger"></i>
                        <h6 class="mt-2 mb-0">Credit Card</h6>
                        <small class="text-muted">Pay using your Credit Card</small>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="payment-option" data-option="upi">
                        <i class="bi bi-upc-scan fs-3 text-danger"></i>
                        <h6 class="mt-2 mb-0">UPI / QR</h6>
                        <small class="text-muted">Google Pay, PhonePe, Paytm</small>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="payment-option" data-option="netbanking">
                        <i class="bi bi-bank fs-3 text-danger"></i>
                        <h6 class="mt-2 mb-0">Net Banking</h6>
                        <small class="text-muted">Pay via Internet Banking</small>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="payment-option" data-option="razorpay">
                        <img src="https://cdn.razorpay.com/logo.svg" alt="Razorpay" height="28">
                        <h6 class="mt-2 mb-0">Razorpay</h6>
                        <small class="text-muted">Pay securely with Razorpay Checkout</small>
                     </div>
                  </div>
               </div>

               <!-- Selected Payment Form -->
               <div class="mt-4" id="paymentForm" style="display:none;">
                  <h6 class="mb-3 text-danger">Enter Payment Details</h6>
                  <div id="debitForm" class="payment-forms" style="display:none;">
                     <div class="mb-3">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Expiry Date</label>
                           <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">CVV</label>
                           <input type="password" class="form-control" placeholder="123">
                        </div>
                     </div>
                  </div>
                  <div id="creditForm" class="payment-forms" style="display:none;">
                     <div class="mb-3">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Expiry Date</label>
                           <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">CVV</label>
                           <input type="password" class="form-control" placeholder="123">
                        </div>
                     </div>
                  </div>
                  <div id="upiForm" class="payment-forms" style="display:none;">
                     <div class="mb-3">
                        <label class="form-label">UPI ID</label>
                        <input type="text" class="form-control" placeholder="yourname@upi">
                     </div>
                  </div>
                  <div id="netbankingForm" class="payment-forms" style="display:none;">
                     <div class="mb-3">
                        <label class="form-label">Select Bank</label>
                        <select class="form-select">
                           <option>State Bank of India</option>
                           <option>HDFC Bank</option>
                           <option>ICICI Bank</option>
                           <option>Axis Bank</option>
                           <option>Punjab National Bank</option>
                        </select>
                     </div>
                  </div>
                  <div id="razorpayForm" class="payment-forms" style="display:none;">
                     <p class="text-muted">You will be redirected to Razorpay secure checkout.</p>
                  </div>
                  <div class="text-center mt-3">
                     <button class="btn btn-danger px-5">Pay Now</button>
                  </div>
               </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('scripts')
<script>
   const options = document.querySelectorAll('.payment-option');
   const paymentForm = document.getElementById('paymentForm');
   const forms = document.querySelectorAll('.payment-forms');

   options.forEach(opt => {
      opt.addEventListener('click', () => {
         options.forEach(o => o.classList.remove('active'));
         opt.classList.add('active');
         forms.forEach(f => f.style.display = 'none');
         paymentForm.style.display = 'block';
         document.getElementById(opt.dataset.option + 'Form').style.display = 'block';
      });
   });
   </script>
@endsection