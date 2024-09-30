<div class="col" style="position: relative">

  @if (session()->has('fees_message'))
    <div class="alert alert-success">
      {{ session('fees_message') }}
    </div>
  @endif
  <form wire:submit.prevent="save">
    <div class="col">
      <!-- Dashboard Settings Info Start -->
      <div class="dashboard-content-box">
        <h4 class="dashboard-content-box__title">Admission Fees</h4>
        <p>Provide valid details below to update your fees structure for different classes.</p>
        <div class="row gy-4">
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Pre Nursery</label>
              <input type="text" class="form-control" wire:model="pre_nursery1">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Nursery</label>
              <input type="text" class="form-control" wire:model="nursery_1">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">LKG</label>
              <input type="text" class="form-control" wire:model="lkg_1">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">UKG</label>
              <input type="text" class="form-control" wire:model="ukg_1">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">KG</label>
              <input type="text" class="form-control" wire:model="kg_1">
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
              <input type="text" class="form-control" wire:model="class_two">
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
              <input type="text" class="form-control" wire:model="class_four">
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
        {{-- <div class="dashboard-announcement-add__btn mt-5">
                    <button class="btn btn-primary btn-hover-secondary mt-3">Update</button>
                </div> --}}
      </div>
      <!-- Dashboard Settings Info End -->
    </div>
    <div class="col mt-3">
      <!-- Dashboard Settings Info Start -->
      <div class="dashboard-content-box">
        <h4 class="dashboard-content-box__title">Annual Fees</h4>
        <p>Provide valid details below to update your fees structure for different classes.</p>
        <div class="row gy-4">
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Pre Nursery</label>
              <input type="text" class="form-control" wire:model="pre_nursery2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-6">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Nursery</label>
              <input type="text" class="form-control" wire:model="nursery_2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">LKG</label>
              <input type="text" class="form-control" wire:model="lkg_2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">UKG</label>
              <input type="text" class="form-control" wire:model="ukg_2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">KG</label>
              <input type="text" class="form-control" wire:model="kg_2">
            </div>
            <!-- Account Account details End -->
          </div>
          <hr style="opacity: .1;">
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class I</label>
              <input type="text" class="form-control" wire:model="class_one2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class II</label>
              <input type="text" class="form-control" wire:model="class_two2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class III</label>
              <input type="text" class="form-control" wire:model="class_three2">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class IV</label>
              <input type="text" class="form-control" wire:model="class_four2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class V</label>
              <input type="text" class="form-control" wire:model="class_five2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VI</label>
              <input type="text" class="form-control" wire:model="class_six2">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VII</label>
              <input type="text" class="form-control" wire:model="class_seven2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class VIII</label>
              <input type="text" class="form-control" wire:model="class_eight2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class IX</label>
              <input type="text" class="form-control" wire:model="class_nine2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class X</label>
              <input type="text" class="form-control" wire:model="class_ten2">
            </div>
          </div>
          <div class="col-md-4">
            <!-- Account Account details Start -->
            <div class="dashboard-content__input">
              <label class="form-label-02">Class XI</label>
              <input type="text" class="form-control" wire:model="class_eleven2">
            </div>
            <!-- Account Account details End -->
          </div>
          <div class="col-md-4">
            <div class="dashboard-content__input">
              <label class="form-label-02">Class XII</label>
              <input type="text" class="form-control" wire:model="class_twelve2">
            </div>
          </div>
        </div>
        <div class="dashboard-announcement-add__btn mt-5">
          <button class="btn btn-light btn-hover-primary mt-3">Save</button>

        </div>
      </div>
      <!-- Dashboard Settings Info End -->
    </div>
  </form>
  <div class="mt-3 button-wrapper">
    <button class="btn btn-light btn-hover-primary trigger " type="button" step_number="4">Prev</button>
    @if (session()->has('fees_message'))
    <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="6">Next</button>
    @else
    <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="6" disabled>Next</button>
    @endif
  </div>
</div>
