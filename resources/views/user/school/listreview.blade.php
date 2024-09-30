@foreach($reviews as $review)
<li class="review-item">
    <div class="review-user">
        <div class="review-head">
            <div class="review-profile">
                <a href="#" class="review-avatar"><img src="images/avatar/02.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                <div class="review-meta">
                    <h6><a href="#"> -</a><span>{{App\Core\Helper::GetDate($review->created_at)}}</span></h6>
                    <?php
                    $x = 5 - (int)$review->rating;
                    ?>
                    <ul>
                    @for($i=1;$i<=(int)$review->rating;$i++)
                        <li><i class="fas fa-star active"></i></li>
                    @endfor
                    @for($i=1;$i<=$x;$i++)
                        <li><i class="fas fa-star"></i></li>
                    @endfor
                    </ul>
                </div>
            </div>
        </div>
        <p class="review-desc">{{$review->description}}</p>
    </div>
</li>
@endforeach