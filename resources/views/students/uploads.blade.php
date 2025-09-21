@extends('layouts.student')

@section('content')

@endsection

@section('scripts')
<!-- Cropper.js -->
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
document.getElementById('uploadForm').addEventListener('submit', function(e){
   e.preventDefault();

   cropToFile(profileCropper, 300, 300, "profile_photo.jpg", function(profileFile){
      cropToFile(signatureCropper, 300, 100, "signature.jpg", function(signatureFile){

         if(profileFile){
            let dt1 = new DataTransfer();
            dt1.items.add(profileFile);
            document.getElementById('profile_photo').files = dt1.files;
         }
         if(signatureFile){
            let dt2 = new DataTransfer();
            dt2.items.add(signatureFile);
            document.getElementById('signature').files = dt2.files;
         }

         // finally submit
         e.target.submit();
      });
   });
});
</script>
@endsection