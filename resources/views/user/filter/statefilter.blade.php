@foreach($entitys as $state)
<li class="product-widget-item">
    <div class="product-widget-checkbox">
        <input type="checkbox" id="chcek9">
    </div>
    <label class="product-widget-label" for="chcek9"><span class="product-widget-text">{{$state->state}}</span><span class="product-widget-number">({{sizeof($state->schools)}})</span></label>
</li>
@endforeach