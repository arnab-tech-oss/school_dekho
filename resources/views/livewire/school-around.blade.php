<div class="card-body">
    @if(Session::has('success'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
    @endif
        
    <div class="pt-1">
       <input type="text" wire:model="search" name="location" id="autocomplete" class="form-control" placeholder=" Search location or school" required>
       <br>
       {{ $search}}
    </div>
    <br>
    <div class="chat-user-list" style="height:510">
        <ul class="list-unstyled mb-0">
            @if ($aroundSchools!=null)
                @foreach ($aroundSchools as $school)
                    <li class="media">
                        <div class="media-body">
                            <p><b>{{ $school?->name}}</b>
                            <br>{{ $school->address?->address }}<br>
                            Distance - {{ $school?->distance}}</p>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>


    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBtWE84XIIE6anZBgc6KMiefOpYnsWVArE&libraries=places&callback=initAutocomplete"></script>

    <script>
        google.maps.event.addDomListener(autocomplete, 'keydown', function(event) { 
            if (event.keyCode === 13) { 
                event.preventDefault(); 
            }
            }); 
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {
            const options = {
                componentRestrictions: { country: "in" },
             };
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                Livewire.emit('setLatitude', place.geometry['location'].lat()); 
                Livewire.emit('setLongitude', place.geometry['location'].lng()); 
                Livewire.emit('setSearch', place.name); 
            });
        }
    </script>

