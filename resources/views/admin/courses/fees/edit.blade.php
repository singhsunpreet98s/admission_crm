@extends('layouts.modal')
@section('title')
<i class="mdi mdi-account-plus-outline"></i> Edit Fees
@endsection
@section('content')
<div class="card">
   <div class="card-body">
     <form method="PATCH" action="{{route("admin.$section.update",['courseId'=>$courseId,'id'=>$courseFee->id])}}">
      @csrf
       <div class="form-group">
         <label for="category_id">Category</label>
      <select class="form-select" name="category_id" id="category_id" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $key=>$value)
          <option value="{{$key}}"  {{ $key == $courseFee->category_id ? 'selected' : '' }}>
            {{ $value }}
          </option>
        @endforeach
      </select>
       </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-select" name="gender" id="gender">
            <option value="male" {{ $courseFee->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $courseFee->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $courseFee->gender == 'other' ? 'selected' : '' }}>Other</option>
        </select>
      </div>



    <div class="form-group">
      <label for="fee_head">Fee Head</label>
      <input type="text" class="form-control" value="{!!$courseFee->fee_head!!}" name="fee_head" id="fee_head" placeholder="Enter Fee Head" value="{{ old('fee_head') }}" required>
    </div>

    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="number" step="0.01" class="form-control" value="{!!$courseFee->amount!!}" name="amount" id="amount" placeholder="Enter Amount" value="{{ old('amount') }}" required>
    </div>

    <div class="form-group">
      <label for="period_number">Period Number</label>
      <input type="number" class="form-control" name="period_number" value="{!!$courseFee->period_number!!}" id="period_number" placeholder="Enter Period Number" value="{{ old('period_number') }}" min="1" required>
    </div>
      
      
     </form>
   </div>
 </div>
@endsection