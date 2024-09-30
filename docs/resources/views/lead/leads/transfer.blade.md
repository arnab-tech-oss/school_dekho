**Navigation Menu Documentation**

The navigation menu is used to navigate the website's main sections.

### Code Snippet


```php
<!-- HTML Structure for Navigation Bar -->
<div class="navbar">
    <!-- Start Breadcrumbbar -->
    <div class="container-fluid p-5">
        <button type="button" data-toggle="collapse"
            class="btn btn-sm btn-light btn-icon p-0"><i class="fa fa-bars"></i></button>
        <p>Navigation</p>
        <ul>
            @foreach($navs as $nav)
                <li><a href="{{ $nav->url }}">{{ $nav->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- End Breadcrumbbar -->
</div>

<!-- JavaScript for Navigation Menu Toggle -->
<script>
    $(document).ready(function() {
        $('.btn-sm').click(function(){
          // Your code here...
        });
    });
</script>
```

### Explanation

The navigation menu is used to display the website's main sections. The HTML structure uses a container-fluid with a button and an unordered list.

*   **Button**: A toggle button with the class btn-sm, data-toggle="collapse" and p-0.
*   **List Item**: An unordered list of navigation links, each displayed as a list item.
*   **Link Text**: The text of each link is displayed using the name property of the nav object.

**How to use Navigation Menu**

1.  Create an instance of Nav class for every section you want to display in your navigation menu.
2.  Assign the URL and name properties to the Nav instance.
3.  Use a loop to render all Nav instances as list items.
4.  Use JavaScript to toggle the navigation bar on button click.

### Example

```php
// Create an array of Nav objects for each section
$navs = [
    new Nav('Dashboard', '/dashboard'),
    new Nav('Settings', '/settings'),
];

// Loop through the array and render as list items
@foreach($navs as $nav)
    <li><a href="{{ $nav->url }}">{{ $nav->name }}</a></li>
@endforeach
```

**API Documentation**

*   **Nav Class**
    *   `__construct(string $url, string $name)`: Initializes a new instance of the Nav class.
    *   `get_url()`: Returns the URL property of the Nav instance.
    *   `get_name()`: Returns the name property of the Nav instance.