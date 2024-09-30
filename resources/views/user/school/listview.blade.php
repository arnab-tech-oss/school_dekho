@foreach($all_schools as $schools)
<?php $schools=(object) $schools;?>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="product-card standard">
        <div class="product-media">
            <div class="product-img"><img src="{{$schools->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>

            <ul class="product-action">

            </ul>
        </div>
        <div class="product-content">

            <h5 class="product-title"><a href="#">{{$schools->name}} <i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></a>
              @if($schools->is_admission)
               <div class="product-type"><span class="flat-badge rent">Admission Open</span></div>
              @else
              <div class="product-type"><span class="product-widget-type sale">Closed</span></div>
              @endif
            </h5>
            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{$schools->address?->address}}</span>
                <!--span><i class="fas fa-clock"></i>30 min ago</span-->
            </div>
            <div class="product-info">
                <a href="{{url('details/'.$schools->id)}}" class="blog-read"><span>Go to School</span><i class="fas fa-long-arrow-alt-right"></i></a>

                <div class="review-meta">
                    <ul>
                        <li><i class="fas fa-star active"></i></li>

                        <li>
                            <h5> {{$schools->rating}}/5.0</h5>
                        </li>
                        <li class=""> &nbsp; &nbsp;<i class="fas fa-eye text-success"></i> </li>
                        <li class="">
                            <h5 class="text-secondary"> {{$schools->view_count}}</h5>
                        </li>
                        <!--li class=""> <h6 class = "text-secondary"> Views</h6>  </li-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach