<div class="container">
   <div class="card border-danger mb-4">
  <div class="card-header bg-danger text-white fw-bold">Bank Details</div>
  <div class="card-body">
    <fieldset class="border p-3 mb-3">
      <legend class="w-auto px-2 text-danger fw-bold">Enter Bank Details</legend>

      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">
            <small>Account Holder Name</small>
          </label>
          <input type="text" name="baccount_name" class="form-control" placeholder="Account Holder Name" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Bank Account Number</label>
          <input type="text" name="baccount_no" id="baccount_no" class="form-control" placeholder="Bank Account Number" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Confirm Bank Account Number</label>
          <input type="text" name="baccount_noc" id="baccount_noc" class="form-control" placeholder="Confirm Bank Account Number" onblur="check(this);" required>
          <output name="result"></output>
        </div>

        <div class="col-md-4">
          <label class="form-label">IFSC Code</label>
          <input type="text" name="baccount_ifsc" class="form-control" placeholder="IFSC Code" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Bank</label>
          <input type="text" name="baccount_bname" class="form-control" placeholder="Bank" required>
        </div>
      </div>

      <p class="mt-3 text-muted small">
        <strong>नोट:</strong> अभ्यर्थी अपना या अपने अभिभावक का ही विवरण भरें।
      </p>
    </fieldset>
  </div>
</div>

</div>