  <div class="col" style="position: relative">
    <!-- Dashboard Settings Info Start -->
    @if (session()->has('eligibility_message'))
      <div class="alert alert-success">
        {{ session('eligibility_message') }}
      </div>
    @endif
    <form wire:submit.prevent="save">
      <div class="dashboard-content-box">
        <h4 class="dashboard-content-box__title">Eligibility Details</h4>
        <p>Provide valid details below to update your eligibility criteria for different classes.</p>
        <div class="row gy-4">
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Pre Nursery</label>
              <input type="text" class="form-control" wire:model="pre_nursery">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Nursery</label>
              <input type="text" class="form-control" wire:model="nursery">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">LKG</label>
              <input type="text" class="form-control" wire:model="lkg">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">UKG</label>
              <input type="text" class="form-control" wire:model="ukg">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">KG</label>
              <input type="text" class="form-control" wire:model="kg">
            </div>
            <!-- Account Account details End -->
          </div>
          <hr style="opacity: .1;">
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class I</label>
              <input type="text" class="form-control" wire:model="class_one">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class II</label>
              <input type="text" class="form-control"wire:model="class_two">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class III</label>
              <input type="text" class="form-control" wire:model="class_three">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class IV</label>
              <input type="text" class="form-control"wire:model="class_four">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class V</label>
              <input type="text" class="form-control" wire:model="class_five">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VI</label>
              <input type="text" class="form-control" wire:model="class_six">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VII</label>
              <input type="text" class="form-control" wire:model="class_seven">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VIII</label>
              <input type="text" class="form-control" wire:model="class_eight">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class IX</label>
              <input type="text" class="form-control" wire:model="class_nine">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class X</label>
              <input type="text" class="form-control" wire:model="class_ten">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class XI</label>
              <input type="text" class="form-control" wire:model="class_eleven">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class XII</label>
              <input type="text" class="form-control" wire:model="class_twelve">
            </div>
          </div>
        </div>
        <div class="dashboard-announcement-add__btn mt-5">
          <button class="btn btn-light btn-hover-primary mt-3">Save</button>

        </div>
      </div>
    </form>
    <div class="mt-3 button-wrapper">
      <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="3">Prev</button>
      @if (session()->has('eligibility_message'))
      <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="5">Next</button>
      @else
      <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="5" disabled>Next</button>
      @endif
    </div>
    <!-- Dashboard Settings Info End -->
  </div>
