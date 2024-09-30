**Documentation for Add New Lead Form**

### Breadcrumbbar

The breadcrumbbar is a navigation component that displays the current page's location within a website or application.

```html
<div class="topbar">
    <!-- Top Navbar -->
</div>
```

### Container

The container holds the main content of the page, including the form for adding new leads.

```html
<div class="contentbar">
    {{-- <div class="col-md-6"> --}}
    <div class="card m-b-10">
        <div class="card-header">
            <h5 class="card-title">Add New Lead</h5>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success col-md-12">
                {{ Session::get('message') }}
                @php
                    Session::forget('message');
                @endphp
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger col-md-12">
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
        @endif
        <div class="card-body">
            <!-- Form for adding new lead -->
        </div>
    </div>
</div>
```

### JS

The JavaScript code is used to handle various tasks, such as opening and closing dropdown menus.

```javascript
<script>
    var dropdowns = document.querySelectorAll('.dropdown-menu');
    document.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown-btn')) return;
        var toggleElement = event.target;
        var target = toggleElement.closest('.dropdown')
        if (target.classList.contains("show")) {
            target.classList.remove('show')
        } else {
            target.classList.add('show')
        }
    })
</script>
```

### End Breadcrumbbar

The breadcrumbbar is a navigation component that displays the current page's location within a website or application.

```html
</div>
```

**Form for adding new lead**

The form includes fields for name, location, pincode, email, board, phone, parent name, admission for, and remarks.

```html
<form action="{{ route('lead.lead.submit') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" name="name" placeholder="Enter name">

        </div>

    </div>
    <!-- Other form fields -->
</form>
```

**Dependencies**

The project uses various dependencies, including Laravel and Node.js packages.

### Laravel Dependencies

- **php**: ^8.0.2
- **arielmejiadev/larapex-charts**: ^5.2
- **barryvdh/laravel-dompdf**: ^2.0
- **guzzlehttp/guzzle**: ^7.2
- **laravel/framework**: ^9.2
- **laravel/sanctum**: ^2.14.1
- **laravel/socialite**: ^5.5
- **laravel/tinker**: ^2.7
- **laravel/ui**: ^3.4
- **livewire/livewire**: ^2.12
- **maatwebsite/excel**: ^3.1
- **razorpay/razorpay**: ^2.9

### Laravel Dev Dependencies

- **fakerphp/faker**: ^1.9.1
- **laravel/sail**: ^1.0.1
- **mockery/mockery**: ^1.4.4
- **nunomaduro/collision**: ^6.1
- **phpunit/phpunit**: ^9.5.10
- **spatie/laravel-ignition**: ^1.0

### Node Dev Dependencies

- **@popperjs/core**: ^2.10.2
- **axios**: ^0.25
- **bootstrap**: ^5.1.3
- **laravel-mix**: ^6.0.6
- **lodash**: ^4.17.19
- **postcss**: ^8.1.14
- **resolve-url-loader**: ^5.0.0
- **sass**: ^1.32.11
- **sass-loader**: ^11.0.1