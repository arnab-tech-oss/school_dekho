          <div class="col-lg-6">
              <!-- Dashboard Settings Info Start -->
              <div class="dashboard-content-box">
                  <h4 class="dashboard-content-box__title">Principal Details</h4>
                  <p>Provide valid details below to update your principal profile</p>
                  @if (session()->has('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                  @endif
                  @if (Session::get('school_id') != null)
                      <div class="row">
                          <form wire:submit.prevent="save" enctype="multipart/form-data">
                              <div class=col-md-9>
                                  <div class="row gy-4">
                                      <div class="col-md-12">
                                          <div class="dashboard-content__input">
                                              <label class="form-label-02">Name of the Principal</label>
                                              <input type="text" class="form-control"
                                                  wire:model.defer="principal_name">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="dashboard-content__input">
                                              <label class="form-label-02">Designation of Principal</label>
                                              <input type="text" class="form-control"
                                                  wire:model.defer="principal_designation">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <!-- Account Account details Start -->
                                          <div class="dashboard-content__input">
                                              <label class="form-label-02">From the Desk of The Principal</label>
                                              <textarea class="form-control" wire:model.defer="principal_desk"></textarea>
                                          </div>
                                          <!-- Account Account details End -->
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="col-md-12">
                                      <div id="dashboard-profile-cover-photo-editor" class="dashboard-settings-profile">
                                          <input id="dashboard-photo-dialogue-box"
                                              class="dashboard-settings-profile__input" type="file"
                                              accept=".png,.jpg,.jpeg" wire:model.defer="principal_pic" />
                                          <label class="form-label-02">Upload/Edit Picture</label>
                                          <div id="profile-photo"
                                              class="dashboard-settings-profile__photo_principal dashboard-settings-profile__photo"
                                              data-fallback="assets/images/avatar-placeholder.jpg"
                                              style="background-image:url(assets/images/avatar-placeholder.jpg)">
                                              <div class="overlay">
                                                  <i class="far fa-camera"></i>
                                              </div>
                                          </div>
                                          <div id="profile-photo-option"
                                              class=" dashboard-settings-profile__photo-option dashboard-settings-profile__photo-option-principal">
                                              <span class="profile-photo-uploader"><i class="far fa-upload"></i>
                                                  Upload Photo</span>
                                              <span class="profile-photo-deleter"><i class="far fa-trash-alt"></i>
                                                  Delete</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
                      <div class="dashboard-announcement-add__btn mt-5">
                          <button class="btn btn-primary btn-hover-secondary mt-3">Add Principal Details</button>
                      </div>
                      </form>
                  @endif
              </div>
              <!-- Dashboard Settings Info End -->
          </div>
