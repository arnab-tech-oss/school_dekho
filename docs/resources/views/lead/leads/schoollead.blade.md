Here's the well-formatted documentation for your code:

**School Wise Leads**
======================

### Introduction
---------------

This is a Laravel-based web application that displays school-wise leads.

### Dependencies
-------------

The following dependencies are used in this project:

*   **Laravel**: ^9.2
*   **ArielMejiaDev/LarapexCharts**: ^5.2
*   **Barryvdh/LaravelDompdf**: ^2.0
*   **GuzzleHttp/Guzzle**: ^7.2
*   **Laravel/Framework**: ^9.2
*   **Laravel/Sanctum**: ^2.14.1
*   **Laravel/Socialite**: ^5.5
*   **Laravel/Tinker**: ^2.7
*   **Laravel/UI**: ^3.4
*   **Livewire/Livewire**: ^2.12
*   **Maatwebsite/Excel**: ^3.1
*   **Razorpay/Razorpay**: ^2.9

### Code
------

The code for this application is located in the `app` directory.

**School Wise Leads**
-------------------

This section displays a table with school-wise leads.

### Table
--------

#### Columns
-------------

| Column Name | Description |
| --- | --- |
| Sl No | Serial number of the row |
| School Name | Name of the school |
| Address | Address of the school |
| Total Leads Transfer | Total number of leads transferred |

### Code Snippet
----------------

```php
<!-- HTML for table -->
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>School Name</th>
                    <th>Address</th>
                    <th>Total Leads Transfer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($school_wise_leads as $school)
                    {{-- @if (sizeof($lead->transfer_lead) > 0) --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $school->name }}</td>
                        @if (isset($school->school_address[0]?->address))
                            <td>{{ $school->school_address[0]?->address }}</td>
                        @endif
                        <td>{{ sizeof($school->school_leads) }}</td>
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
```

**Filter**
---------

This section includes a form to filter school-wise leads.

### Code Snippet
----------------

```php
<!-- HTML for filter -->
<div class="filter" style="display: flex">
    <style>
        .select2-selection__rendered {
            width: 300px !important;
        }
    </style>
    <div class="filter-item">
        <label for="select school">Select School</label>
        <select class="form-control example" style="width: 300px !important; margin-top: 40px;"
            name="mou_school" class="form-control" required>
            <option value="">--select type--</option>
            <option value="non_mou">Non Mou School</option>
            <option value="mou">Mou School</option>
        </select>
    </div>
    <div class="filter-item" style="margin-top: 30px;">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>

</form>
```

### JavaScript
-------------

The following script is used to initialize the Select2 library.

```javascript
$(document).ready(function() {
    $('.example').select2();
});
```

I hope this helps! Let me know if you have any further requests.