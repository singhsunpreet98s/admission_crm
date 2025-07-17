@extends('layouts.student')
@section('content')
<div class="container-fluid" style="border:1px solid #dc3545;padding:10px;border-radius:5px">
  <form id="{{$section}}_admission_form" method="POST" action="{{route("$section.saveForm")}}">
    @csrf
   <div class=" text-danger text-center">
      <h3 class="mb-0">Please fill your Admission Form</h3>
    </div>
    <div class="alert alert-danger text-center fw-bold mt-4">
        अभ्यर्थी अपने नामांकन हेतु आवेदन पत्र को स्वयं भरें अथवा साइबर कैफ़े से भरवाने की स्थिति में स्वयं वहां उपस्थित रहें । आवेदन पत्र में किसी भी त्रुटि के लिए अभ्यर्थी स्वयं जिम्मेदार होंगे ।
      </div>
   
    @include("$section.admission_form_profile_details")
    @include("$section.admission_form_contact_details")
    @include("$section.admission_form_applied_details")
    @include("$section.admission_form_acadmic_details")
    @include("$section.admission_form_bank_details")
    @include("$section.admission_form_declaration")

  <div class="container mb-4 mt-4">
    <button type="submit" class="btn btn-danger w-100">
    Submit
  </button>
  </div>
  </form>
</div>

</div>
</form>
@endsection

@section('scripts')
<script>
  function verifySize(input, size) {
   const file = input.files[0];
   if (file && file.size > 1024 * size) {
      alert(`File size must not exceed ${size} KB.`);
      input.value = '';
   }
} 
 
</script>
@endsection