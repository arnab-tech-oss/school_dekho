<div class="col">

  <!-- Dashboard Settings Info Start -->
  <div class="dashboard-content-box" style="position: relative">
    <h4 class="dashboard-content-box__title">Conatct Information</h4>
    <p>Provide valid details below to update your school profile</p>
    @if (session()->has('message_contact'))
      <div class="alert alert-success">
        {{ session('message_contact') }}
      </div>
 
    @endif
    <form wire:submit.prevent="save">
      <div class="row gy-4">
        <div class="col-md-6">
          <!-- Account Account details Start -->
          <div class="dashboard-content__input">
            <label class="form-label-02">email</label>
            <input type="text" class="form-control" wire:model="email">
          </div>
          <!-- Account Account details End -->
        </div>
        <div class="col-md-6">
          <!-- Account Account details Start -->
          <div class="dashboard-content__input">
            <label class="form-label-02">Street Address</label>
            <textarea id="" name="" cols="30" rows="10" wire:model="address" class="form-control"></textarea>
          </div>
          <!-- Account Account details End -->
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">State</label>
            <select class="form-select" wire:model="state_id">
              <option>Select</option>
              @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->state }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">District</label>
            <select class="form-select" wire:model="district_id">
              <option>Select</option>
              @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->district }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">City</label>
            <input type="text" class="form-control" wire:model="city">
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">Pincode</label>
            <input type="text" class="form-control" wire:model="pincode">
          </div>
        </div>
        <hr style="opacity: .1;">
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">latitude</label>
            <input type="text" class="form-control" wire:model="latitude">
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">longitude</label>
            <input type="text" class="form-control" wire:model="longitude">
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">Landline/Mobile</label>
            <input type="text" class="form-control" wire:model="mobile">
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-content__input">
            <label class="form-label-02">Alternative Contact</label>
            <input type="text" class="form-control" wire:model="alt_contact">
          </div>
        </div>
        <hr style="opacity: .1;">
        <div class="col-md-6">
          <div class="dashboard-content__input">
            <label class="form-label-02">Facebook Page</label>
            <input type="text" class="form-control" wire:model="fb">
          </div>
        </div>
        <div class="col-md-6">
          <div class="dashboard-content__input">
            <label class="form-label-02">Instagram</label>
            <input type="text" class="form-control" wire:model="insta">
          </div>
        </div>
        <div class="col-md-6">
          <div class="dashboard-content__input">
            <label class="form-label-02">Twitter</label>
            <input type="text" class="form-control" wire:model="twitter">
          </div>
        </div>
        <div class="col-md-6">
          <div class="dashboard-content__input">
            <label class="form-label-02">Linked In</label>
            <input type="text" class="form-control" wire:model="linkedin">
          </div>
        </div>
      </div>
      <div class="dashboard-announcement-add__btn mt-5">
        <button class="btn btn-light btn-hover-primary mt-3">Save</button>
  
      </div>
    </form>
    <div class="button-wrapper mt-3">
      <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="2">Prev</button>
      @if (session()->has('message_contact'))
        <button  class="btn btn-light btn-hover-primary trigger" type="button" step_number="4">Next</button>
     
      @else
        <button  class="btn btn-light btn-hover-primary trigger" type="button" step_number="4" disabled>Next</button>
      @endif
    </div>
  </div>
  <!-- Dashboard Settings Info End -->
</div>
   {{-- <script src="http://127.0.0.1:8000/assets/school/js/vendor/bootstrap.bundle.min.js"></script> --}}
