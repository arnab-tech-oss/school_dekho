**Overview**
-----------

The `resources/views/lead/schooldashboard/list.blade.php` file is a Blade template used to display a list of school dashboards on the admin dashboard page. The template extends the `layouts.lead.app` layout and includes a breadcrumb navigation, a content bar with a list of school dashboards, and pagination links.

**In-Depth Explanation**
--------------------

### Breadcrumb Navigation

The breadcrumb navigation is displayed at the top of the content bar. It shows the user's current location in the application hierarchy.
```php
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">List School Dashboards</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">List Dashboards</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- End Breadcrumbbar -->
```
### Content Bar

The content bar displays a list of school dashboards. Each dashboard is represented by a card with the following information:

*   **School Logo**: The logo of the school, if available.
*   **School Name**: The name of the school.
*   **Address**: The address of the school.
*   **Pincode**: The pincode of the school.

```php
<div class="contentbar">

    <div class="d-flex flex-wrap">
        @foreach ($school_dashboards as $school)
          @if (isset($school->school))
            <div class="card  mx-2 m-b-15" style="width: 45%">
                <div class="card-body">
                    @if ($school->school?->school_logo)
                      <img src="{{ $school->school?->school_logo }}" height="200" width="200">
                    @endif
                    <h5 class="card-title font-18">{{ $school->school?->name }}</h5>
                    <div>
                        @if (isset($school->school?->school_address[0]))
                            <p class="card-text">{{ $school->school?->school_address[0]?->address }}
                            </p>
                            <p class="card-text">
                                {{ $school->school?->school_address[0]?->pincode }}
                            </p>
                        @endif
                    </div>

                </div>
                <br>
            </div>
          @endif
        @endforeach
    </div>
    {{ $school_dashboards->appends($_GET)->render('pagination::bootstrap-4') }}

</div>
```
### Pagination

The pagination links are used to navigate through the list of school dashboards. The `{{ $school_dashboards->appends($_GET)->render('pagination::bootstrap-4') }}` code generates the pagination links based on the current page and the total number of pages.

**Usage Examples**
-----------------

To use this template, you need to follow these steps:

1.  Create a new Blade view file `resources/views/lead/schooldashboard/list.blade.php`.
2.  Copy the contents of the code above into the file.
3.  Make sure to update the pagination links and breadcrumb navigation according to your application's requirements.

**Dependencies and Setup**
------------------------

To use this template, you need to install the following dependencies:

### Laravel Dependencies

*   **laravel**: `^8.*`
*   **livewire/livewire**: `^2.12`

You can install these dependencies by running the following command:

```bash
composer require laravel livewire/livewire "^2.12"
```

**Troubleshooting**
-----------------

If you encounter any issues while using this template, please check the following troubleshooting tips:

*   Make sure to update the pagination links and breadcrumb navigation according to your application's requirements.
*   Verify that the `school_dashboards` variable is correctly defined in your controller.

**Commit Message Guidelines**
---------------------------

When committing changes to this template, please follow these guidelines:

*   Use a clear and concise commit message.
*   Include the type of change (e.g., "Added breadcrumb navigation") in the commit message.
*   Use the imperative mood (e.g., "Add breadcrumb navigation") in the commit message.