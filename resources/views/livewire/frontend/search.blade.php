<div class="courses-section section-padding-90">
  <div class="container">
    <form>
      <div class="row gy-10 flex-row-reverse">
        <div class="col-lg-9">
          <div class="archive-filter-bars">
            <div class="archive-filter-bar">
              <p>We found <span>{{ $search_result_count }}</span> schools for you in your search location
                <b>{{ $location }}</b>.
              </p>
            </div>
            <div class="archive-filter-bar">
              <div class="filter-bar-wrapper">
              </div>
            </div>
          </div>
          <div id="collapseFilter" class="filter-collapse collapse">
            <div class="card card-body">
              <div class="row row-cols-xl-5 gy-6">
                <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="widget-filter">
                    <h4 class="widget-filter__title">Boards</h4>
                  </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="widget-filter">
                    <h4 class="widget-filter__title">Medium</h4>
                    <div class="widget-filter__wrapper widgetScroll">
                      <ul class="widget-filter__list">
                        @foreach ($mediums as $medium)
                        <li>
                          <div class="widget-filter__item">
                            <input id="level1" type="checkbox" name="sort-by">
                            <label for="level1">{{ $medium->medium }}
                              <span>({{ sizeof($medium->schools) }})</span></label>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="widget-filter">
                    <h4 class="widget-filter__title">Rating</h4>
                    <div class="widget-filter__wrapper widgetScroll">
                      <ul class="widget-filter__list">
                        <li>
                          <div class="widget-filter__item">
                            <input id="rating1" type="checkbox" name="rating">
                            <label for="rating1">
                              <span class="star-line">
                                <span class="star" style="width: 100%;"></span>
                              </span>
                              <span>({{ $count_reviews[0] }})</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="widget-filter__item">
                            <input id="rating2" type="checkbox" name="rating">
                            <label for="rating2">
                              <span class="star-line">
                                <span class="star" style="width: 80%;"></span>
                              </span>
                              <span>({{ $count_reviews[1] }})</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="widget-filter__item">
                            <input id="rating3" type="checkbox" name="rating">
                            <label for="rating3">
                              <span class="star-line">
                                <span class="star" style="width: 60%;"></span>
                              </span>
                              <span>({{ $count_reviews[2] }})</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="widget-filter__item">
                            <input id="rating4" type="checkbox" name="rating">
                            <label for="rating4">
                              <span class="star-line">
                                <span class="star" style="width: 40%;"></span>
                              </span>
                              <span>({{ $count_reviews[3] }})</span>
                            </label>
                          </div>
                        </li>
                        <li>
                          <div class="widget-filter__item">
                            <input id="rating5" type="checkbox" name="rating">
                            <label for="rating5">
                              <span class="star-line">
                                <span class="star" style="width: 20%;"></span>
                              </span>
                              <span>({{ $count_reviews[4] }})</span>
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="widget-filter">
                    <h4 class="widget-filter__title">Gender</h4>
                    <div class="widget-filter__wrapper widgetScroll">
                      <ul class="widget-filter__list">
                        @foreach ($school_types as $type)
                        <li>
                          <div class="widget-filter__item">
                            <input id="level1" type="checkbox" name="sort-by">
                            <label for="level1">{{ $type->school_type }}
                              <span>({{ $type->school_count }})</span></label>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="widget-filter">
                    <h4 class="widget-filter__title">Ownership</h4>
                    <div class="widget-filter__wrapper widgetScroll">
                      <ul class="widget-filter__list">
                        @foreach ($categories as $category)
                        <li>
                          <div class="widget-filter__item">
                            <input id="level1" type="checkbox" name="sort-by">
                            <label for="level1">{{ $category->category }}
                              <span>{{ sizeof($category->schools) }}</span></label>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <style>
            .address {
              white-space: unset !important;
            }

            .course-list-item:hover .course-list-info__title {
              color: #0071dc
            }

            @media only screen and (max-width: 767px) {
              .course-list-header {
                max-width: 60px;
              }

              .course-list-item {
                flex-direction: inherit;
                gap: 12px;
                padding-left: 6px;
                padding-right: : 6px;
              }

              .course-list-info {
                padding-left: 0;
                padding-top: 0px;
                padding-right: unset;
              }

              .address {
                margin-right: 80px;
              }
            }

            @media only screen and (max-width: 575px) {
              .course-list-info__footer {
                display: flex;
                gap: 12px;
                margin-top: 3px;
              }

              .address {
                margin-right: 0px;
              }
            }
          </style>
          <div class="tab-content">
            <div id="list" class="tab-pane fade show active">
              @forelse ($schools as $school)
              <div onclick="location.href='{{ route('details', $school->slug) }}';" style="cursor: pointer" class="course-list-item">
                <div class="course-list-header">
                  <div class="course-list-header__thumbnail">
                    <a style="max-width: 60px" href="{{ route('details', $school->slug) }}">
                      <img src="{{ $school->school_logo }}" alt="{{ $school->slug }} - Schooldekho.org " />
                    </a>
                  </div>
                </div>
                <div class="course-list-info">
                  <h3 class="course-list-info__title"><a href="{{ route('details', $school->slug) }}">{{ $school->name }}
                      &nbsp;</a>
                    @if ($school->is_verify == 1)
                    <i data-bs-tooltip="tooltip" data-bs-placement="top" title="" data-bs-original-title="Verified" aria-label="Select Demo" class="fas fa-badge-check text-primary small"></i>
                    @endif
                  </h3>
                  <div class="course-list-info__meta">
                    <span class="address" style=""><i class="far fa-map-marker-alt"></i>
                      {{ $school->address?->address . ', ' . $school->address?->pincode }}</span>
                  </div>
                  <div class="course-list-info__footer">
                    <div class="course-list-info__price">
                      <span style="font-size: unset; color:
                                                    class=" sale-price">{{ $school->distance }}<small class="separator">
                          KM</small></span>
                    </div>
                    <div style="margin-top: 0px;" class="course-list-info__rating">
                      <div style="margin-top: 0px; margin-right: 2px;" class="rating-star">
                        <div class="rating-label" style="width: {{ $school->reviews->avg('rating') * 20 }}%;">
                        </div>
                      </div>
                      <div style="display: flex; justify-content: center">
                        <small style="margin: 3px 8px 0px 0px; color:
                                                        class=" separator">({{ $school->reviews->count() }})</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <p>No schools found.</p>
              @endforelse
            </div>
          </div>
          <style>
            .page-pagination-inject div nav {
              display: flex;
              justify-content: space-between;
              width: 100%;
              gap: 12px;
              align-items: center;
            }

            .page-pagination-inject div {
              display: flex;
              width: 100%;
            }

            .page-pagination-inject div nav span span,
            page-pagination-inject div nav span button {
              height: 46.5px;
              display: block;
            }
          </style>
          <div class="page-pagination">
            <ul class="pagination page-pagination-inject justify-content-center">
              {{ $schools->links() }}
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="sidebar-widget-wrapper">
            <div class="sidebar-widget-wrap bg-color-10">
              <h4 class="sidebar-widget-wrap__title">Filter by Board</h4>
              <div class="widget-filter">
                <div class="widget-filter__wrapper widgetScroll">
                  <ul class="widget-filter__list">
                    @foreach ($school_boards as $school_board)
                    <li>
                      <div class="">
                        <input type="checkbox" id="{{ $school_board->board_name }} " wire:model="boards" value="{{ $school_board->id }}">
                        <label for="{{ $school_board->board_name }} ">{{ $school_board->board_name }} </label>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="sidebar-widget-wrap bg-color-10 mt-4">
              <h4 class="sidebar-widget-wrap__title">Filter by</h4>
              <div class="widget-filter">
                <h4 class="widget-filter__title-02">Distance</h4>
                <div class="widget-filter__wrapper">
                  <ul class="widget-filter__list">
                    <li>
                      <div class="widget-filter__item">
                        <input id="radio4" type="radio" checked="true" wire:model="distance" value="5">
                        <label for="radio4">0 KM to 5 KM </label>
                      </div>
                    </li>
                    <li>
                      <div class="widget-filter__item">
                        <input id="radio5" type="radio" wire:model="distance" value="15">
                        <label for="radio5">5 KM to 15 KM </label>
                      </div>
                    </li>
                    <li>
                      <div class="widget-filter__item">
                        <input id="radio6" type="radio" wire:model="distance" value="50">
                        <label for="radio6">15 KM to 50 KM</label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget-filter">
                <h4 class="widget-filter__title">Medium</h4>
                <div class="widget-filter__wrapper">
                  <ul class="widget-filter__list">
                    @foreach ($mediums as $medium)
                    <li>
                      <div class="">
                        <input id="{{ $medium->medium }}" type="checkbox" wire:model="medium" value="{{ $medium->id }}">
                        <label for="{{ $medium->medium }}">{{ $medium->medium }}
                          <span>({{ sizeof($medium->schools) }})</span></label>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="widget-filter">
                <h4 class="widget-filter__title">Gender</h4>
                <div class="widget-filter__wrapper widgetScroll">
                  <ul class="widget-filter__list">
                    @foreach ($school_types as $type)
                    <li>
                      <div class="">
                        <input id="{{ $type->school_type }}" type="checkbox" wire:model="type" value="{{ $type->school_type }}">
                        <label for="{{ $type->school_type }}">{{ $type->school_type }}
                          <span>({{ $type->school_count }})</span></label>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>