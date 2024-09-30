<ul id="menu-list">
    @foreach($all_schools as $data)
    <li>
        <a href="{{url('schooldetails/'.$data->id)}}"> <img src="{{$data->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" height="40" width="40"><i class="lni lni-eye text-primary pr-2"></i>{{$data->name}}&nbsp;{{$data->address?->address}}</a>
    </li>
    @endforeach

</ul>