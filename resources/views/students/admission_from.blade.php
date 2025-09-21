@extends('layouts.student')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid" style="border:1px solid #dc3545;padding:10px;border-radius:5px">
  <form id="{{$section}}_admission_form" method="POST" enctype="multipart/form-data" action="/students/save_form">
    @csrf
   <div class=" text-danger text-center">
      <h3 class="mb-0">Please fill your Admission Form</h3>
    </div>
    <div class="alert alert-danger text-center fw-bold mt-4">
        अभ्यर्थी अपने नामांकन हेतु आवेदन पत्र को स्वयं भरें अथवा साइबर कैफ़े से भरवाने की स्थिति में स्वयं वहां उपस्थित रहें । आवेदन पत्र में किसी भी त्रुटि के लिए अभ्यर्थी स्वयं जिम्मेदार होंगे ।
      </div>
      <input type="hidden" name="semester_id" value="{{$data['semester']->id}}" />
   <input type="hidden" name="merit_list_id" value="{{$data['merit_list_id']}}" />
   <input type="hidden" name="merit_list_student_id" value="{{$data['merit_list_student_id']}}" />
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
   @include("$section.admission_form_profile_images")
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
let profileCropper, signatureCropper;
// Profile photo change
document.getElementById('profile_photo').addEventListener('change', function(event){
   let file = event.target.files[0];
   if(file && file.size > 102400){ // 100KB
      alert("Profile photo must be less than 100KB.");
      event.target.value = "";
      return;
   }
   let reader = new FileReader();
   reader.onload = function(e){
      let img = document.getElementById('profilePreview');
      img.src = e.target.result;
      if(profileCropper) profileCropper.destroy();
      profileCropper = new Cropper(img, { aspectRatio: 1 });
   }
   reader.readAsDataURL(file);
});

// Signature change
document.getElementById('signature').addEventListener('change', function(event){
   let file = event.target.files[0];
   if(file && file.size > 102400){ // 100KB
      alert("Signature must be less than 100KB.");
      event.target.value = "";
      return;
   }
   let reader = new FileReader();
   reader.onload = function(e){
      let img = document.getElementById('signaturePreview');
      img.src = e.target.result;
      if(signatureCropper) signatureCropper.destroy();
      signatureCropper = new Cropper(img, { aspectRatio: 3/1 });
   }
   reader.readAsDataURL(file);
});

// Utility: convert cropper to File
function cropToFile(cropper, width, height, filename, callback){
   if(!cropper) return callback(null);
   cropper.getCroppedCanvas({
      width, height,
      fillColor: '#fff'  // prevents black background in PNG
   }).toBlob(function(blob){
      if(!blob) return callback(null);
      if(blob.size > 102400){
         alert(filename + " after cropping exceeds 100KB.");
         return callback(null);
      }
      let file = new File([blob], filename, { type: "image/jpeg" });
      callback(file);
   }, 'image/jpeg', 0.9); // JPEG compresses smaller than PNG
}

// On submit
// document.getElementById('{{$section}}_admission_form').addEventListener('submit', function(e){
//    e.preventDefault();

//    cropToFile(profileCropper, 300, 300, "profile_photo.jpg", function(profileFile){
//       cropToFile(signatureCropper, 300, 100, "signature.jpg", function(signatureFile){

//          if(profileFile){
//             let dt1 = new DataTransfer();
//             dt1.items.add(profileFile);
//             document.getElementById('profile_photo').files = dt1.files;
//          }
//          if(signatureFile){
//             let dt2 = new DataTransfer();
//             dt2.items.add(signatureFile);
//             document.getElementById('signature').files = dt2.files;
//          }

//          // finally submit
//          e.target.submit();
//       });
//    });
// });
  function verifySize(input, size) {
   const file = input.files[0];
   if (file && file.size > 1024 * size) {
      alert(`File size must not exceed ${size} KB.`);
      input.value = '';
   }
} 
//  $(document).ready(function () {
//     $("#{{$section}}_admission_form").on("submit", function (e) {
//         e.preventDefault(); // stop normal form submission

//         var form = $(this);
//         var formData = new FormData(this);

//         $.ajax({
//             url: form.attr("action"),
//             method: "POST",
//             data: formData,
//             processData: false, // needed for FormData
//             contentType: false, // needed for FormData
//             success: function (response) {
//                 if (response.status) {
//                     alert("✅ Form submitted successfully!");
//                     // Example: redirect or show message
//                     // window.location.href = "/students/dashboard";
//                 } else {
//                     alert("⚠️ Something went wrong: " + (response.message ?? 'Unknown error'));
//                 }
//             },
//             error: function (xhr) {
//                 console.error(xhr.responseText);
//                 alert("❌ Server error, please try again.");
//             }
//         });
//     });
// });
</script>
@endsection