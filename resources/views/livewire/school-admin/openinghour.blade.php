  <div class="col">
      <!-- Dashboard Settings Info Start -->
      <div class="dashboard-content-box" style="position: relative">
          <h4 class="dashboard-content-box__title">Opening Hours</h4>
          <p>Provide valid details below to update your opening hours.</p>
          @if (session()->has('message_hour'))
              <div class="alert alert-success">
                  {{ session('message_hour') }}
              </div>
          @endif
          <form wire:submit.prevent="save">
              <div class="row gy-4">
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Monday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="mon_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="mon_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Tuesday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="tue_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="tue_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Wednesday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="wed_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="wed_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Thursday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="thu_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="thu_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Friday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="fri_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="fri_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Saturday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="sat_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="sat_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <label class="form-label-02">Sunday</label>
                          <!-- <input type="text" class="form-control"> -->
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">Monday</label> -->
                          <input type="time" class="form-control" wire:model="sun_f">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="col-md-4">
                      <!-- Account Account details Start -->
                      <div class="dashboard-content__input">
                          <!-- <label class="form-label-02">.</label> -->
                          <input type="time" class="form-control" wire:model="sun_t">
                      </div>
                      <!-- Account Account details End -->
                  </div>
                  <div class="dashboard-announcement-add__btn mt-5">
                      <button class="btn btn-light btn-hover-primary mt-3">Save</button>
                  </div>
              </div>
          </form>
          <div class="mt-3 button-wrapper">
              <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="1">Prev</button>

              @if (session()->has('message_hour'))
                  <button class="btn btn-light btn-hover-primary trigger" type="button"
                      step_number="3">Next</button>
              @else
                  <button class="btn btn-light btn-hover-primary trigger" type="button" step_number="3"
                      disabled>Next</button>
              @endif
          </div>
          <!-- Dashboard Settings Info End -->
      </div>
