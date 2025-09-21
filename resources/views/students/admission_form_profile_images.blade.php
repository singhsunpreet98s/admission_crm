<div class="container">
   <div class="card border-danger mb-4">
  <div class="card-header bg-danger text-white fw-bold">Upload Profile Photo and Signature</div>
  <div class="card-body">
      <div class="row">
         <!-- Profile Photo Upload -->
         <div class="col-md-6 mb-3">
            <label for="profile_photo" class="form-label">Profile Photo (Max 100KB)</label>
            <input class="form-control" type="file" name="profile_photo" id="profile_photo" accept="image/*">
            <div class="mt-2">
               <img id="profilePreview" class="img-fluid" style="max-width:150px; border:1px solid #ddd; border-radius:5px; padding:5px;">
            </div>
            <canvas id="profileCanvas" style="display:none;"></canvas>
         </div>

         <!-- Signature Upload -->
         <div class="col-md-6 mb-3">
            <label for="signature" class="form-label">Signature (Max 100KB)</label>
            <input class="form-control" type="file" name="signature" id="signature" accept="image/*">
            <div class="mt-2">
               <img id="signaturePreview" class="img-fluid" style="max-width:150px; border:1px solid #ddd; border-radius:5px; padding:5px;">
            </div>
            <canvas id="signatureCanvas" style="display:none;"></canvas>
         </div>
      </div>
</div>
   </div>
</div>