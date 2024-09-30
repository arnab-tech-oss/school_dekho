<div class="col">

  <!-- Dashboard Settings Info Start -->
  <div class="dashboard-content-box" style="position: relative">
    <h4 class="dashboard-content-box__title">gallery</h4>
    <p>Provide valid details below to update your school profile</p>
    @if (session()->has('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
    <form wire:submit.prevent="save">
      <div class="row gy-4">
        <div class="col-md-6">
          <!-- Account Account details Start -->
          <div class="dashboard-content__input">
            <label class="form-label-02">upload images</label>
            <input type="file" class="form-control" wire:model="pictures" multiple>
          </div>
          <!-- Account Account details End -->
        </div>
      </div>
      <div class="dashboard-announcement-add__btn mt-5">
        <button class="btn btn-light btn-hover-primary mt-3">Save</button>

      </div>
    </form>
    <div class="mt-3 button-wrapper">
      <button class="btn  btn-light btn-hover-primary  trigger mt-3" type="button" step_number="5">Prev</button>
      <a href="/school/dashboard" class=" btn btn-light btn-hover-primary mt-3 trigger" type="submit">Save</a>
    </div>
  </div>
  <!-- Dashboard Settings Info End -->
</div>
