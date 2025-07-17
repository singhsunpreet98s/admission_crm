
@extends('layouts.student')
@section('content')
<div class="container my-5">
  <!-- Notice -->
  <div class="alert alert-danger fw-bold" role="alert">
    स्नातक प्रथम सेमेस्टर सत्र 2025-29 में नामांकन लेने वाले सभी छात्र/छात्राओं को सूचित किया जाता है कि अगर आपका जाति, जेंडर (मेल/फीमेल) गलत है या अधिक अंक देकर आपका नाम मैरिट लिस्ट में आया है तो आप किसी भी परिस्थिति में साइबर पर बिना महाविद्यालय की अनुमति के नामांकन न करें। अन्यथा नामांकन रद्द कर दिया जाएगा।
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-danger text-white text-center">
          <h4 class="mb-0"><i class="bi bi-search"></i> Check Your Allotment</h4>
        </div>
        <div class="card-body">

          <form method="POST" action="{{route("$section.verifyApplicationStatus")}}">
            @csrf
            <div class="mb-3">
              <label for="res_no" class="form-label fw-bold">Reference / Registration Number</label>
              <input type="text" class="form-control" id="res_no" name="res_no" placeholder="अपना रेफेरेंस / रजिस्ट्रेशन नंबर अंकित करें" required>
            @error('res_no')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
              <label for="ac_year" class="form-label fw-bold">Academic Year</label>
              <select class="form-select" id="ac_year" name="ac_year" required>
                <option value="">Select Academic Year</option>
                <option value="1ST SEMESTER">1ST SEMESTER</option>
                <option value="2ND SEMESTER">2ND SEMESTER</option>
                <option value="3RD SEMESTER">3RD SEMESTER</option>
                <option value="PART II">PART II</option>
                <option value="PART III">PART III</option>
              </select>
            </div>

            <input type="hidden" name="user_auto_no" value="stuvwxyzABCDEFGHIJ">

            <div class="d-grid">
              <button type="submit" name="Submit" class="btn btn-danger">
                <i class="bi bi-search"></i> Search
              </button>
            </div>
          </form>

        </div>
 
      </div>

    </div>
           @if ($errors->any())
  <div class="text-danger w-100 text-center mt-4">
    <h3>
      @foreach ($errors->all() as $error)
       {{ $error }}
      @endforeach
    </h3>
  </div>
@endif
  </div>
</div>
@if(isset($registration))
<div class="container my-5">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Student Details</h5>
    </div>

    <div class="card-body">
      <form method="POST"  action="{{route("$section.fillAdmissionForm")}}">
        @csrf
        <div class="table-responsive">
          <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
              <tr>
                <th>Allotment Unique Number</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Mobile No.</th>
                <th>Email ID</th>
                <th>Academic Year</th>
                <th>Programme</th>
                <th>Honours Paper</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{!!$registration->res_no!!}</td>
                <td>{!!$registration->student_name!!}</td>
                <td>{!!$registration->fathers_name!!}</td>
                <td>{!!$registration->phone!!}</td>
                <td>{!!$registration->email!!}</td>
                <td>1ST SEMESTER</td>
                <td>
                  <select name="department" id="department" class="form-select" required onchange="chkHonors();">
                    <option value="">Select Programme</option>
                    <option value="{!!$meritListFile->course->code!!}">{!!$meritListFile->course->name!!}</option>
                  </select>
                </td>
                <td id="honours">
                  <select name="honors" class="form-select" required>
                    <option value="">Select Honors Paper</option>
                    <option value="hindi">{!!$registration->mil!!}</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <input type="hidden" value="{!!$registration->res_no!!}" name="res_no" id="res_no">
        <input type="hidden" value="1ST SEMESTER" name="ac_year">

        <div class="text-center mt-4">
          <button type="submit" name="submit" value="Update" class="btn btn-danger">
            <i class="bi bi-check-circle-fill me-1"></i> Click Here for Admission
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

@endsection