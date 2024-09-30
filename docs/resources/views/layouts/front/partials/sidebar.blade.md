Here is the reformatted documentation with clear headings, code blocks, and bullet points:

**Project Dependencies**
=========================

### Laravel Dependencies

* `php`: ^8.0.2
* `arielmejiadev/larapex-charts`: ^5.2
* `barryvdh/laravel-dompdf`: ^2.0
* `guzzlehttp/guzzle`: ^7.2
* `laravel/framework`: ^9.2
* `laravel/sanctum`: ^2.14.1
* `laravel/socialite`: ^5.5
* `laravel/tinker`: ^2.7
* `laravel/ui`: ^3.4
* `livewire/livewire`: ^2.12
* `maatwebsite/excel`: ^3.1
* `razorpay/razorpay`: ^2.9

### Laravel Dev Dependencies

* `fakerphp/faker`: ^1.9.1
* `laravel/sail`: ^1.0.1
* `mockery/mockery`: ^1.4.4
* `nunomaduro/collision`: ^6.1
* `phpunit/phpunit`: ^9.5.10
* `spatie/laravel-ignition`: ^1.0

### Node Dev Dependencies

* `@popperjs/core`: ^2.10.2
* `axios`: ^0.25
* `bootstrap`: ^5.1.3
* `laravel-mix`: ^6.0.6
* `lodash`: ^4.17.19
* `postcss`: ^8.1.14
* `resolve-url-loader`: ^5.0.0
* `sass`: ^1.32.11
* `sass-loader`: ^11.0.1

### Nav Bar Code Snippet

```php
<nav>
    <div class="container">
        <ul class="navbar-list">
            <li><a href="#author-menu" class="nav-link" data-toggle="tab">Menu</a></li>
        </ul>
        <div class="tab-pane active" id="main-menu">
            <ul class="navbar-list">
                @if(Auth::user()->role == '1')
                    <li class="navbar-item"><a class="navbar-link" href="{{ route('admin.home') }}">Admin Panel</a></li>
                @endif
                @if(Auth::user()->role == '2')
                    <li class="navbar-item"><a class="navbar-link" href="{{ route('school.home') }}">Admin Panel</a></li>
                @endif
                @if(Auth::user()->role == '3')
                    <li class="navbar-item"><a class="navbar-link" href="{{ route('student.home')}}">Admin Panel</a></li>
                @endif
                ...
            </ul>
        </div>
    </div>
</nav>
```

### Sidebar Code Snippet

```php
<div class="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
        <button type="button" class="close-button">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="sidebar-content">
        ...
    </div>
    <div class="sidebar-footer">
        <p>All Rights Reserved By <a href="#">SchoolDekho</a></p>
    </div>
</div>
```

Note: The code snippets are simplified and may not be exact representations of the actual code used in the project.