Here is a well-formatted version of the documentation:

**Lead Management System Documentation**
=====================================

**Overview**
------------

The Lead Management System (LMS) is a web application built using Laravel, designed to manage leads for schools and educational institutions.

**Getting Started**
-------------------

To get started with the LMS, follow these steps:

1. Clone the repository: `git clone https://github.com/your-repo/lms.git`
2. Install dependencies: `composer install`
3. Create a new database and configure the `.env` file
4. Run the migrations: `php artisan migrate`
5. Seed the database with sample data (optional)

**Lead Management System Features**
--------------------------------

### Lead Listing Page

The lead listing page displays a list of leads, filtered by date range. The search form at the top allows users to filter leads based on name and status.

#### Search Form

*   **Name**: Search for leads by name
*   **Date Range**: Select a date range using the start and end dates
*   **Submit**: Click the submit button to display filtered leads

#### Lead List Display

Each lead is displayed in a table format, showing:

*   **Sl No**: A unique number for each lead
*   **Name**: The name of the lead
*   **Counselor**: The assigned counselor (if any)
*   **Status**: The current status of the lead (e.g., Untouched, Interested, Not Interested, etc.)
*   **Date**: The date the lead was created
*   **Action**: A dropdown menu with options to view or edit the lead

#### Pagination

The lead listing page uses pagination to display a maximum number of leads per page.

**Lead Details Page**
-------------------

The lead details page displays detailed information about a single lead, including:

*   **Name**: The name of the lead
*   **Counselor**: The assigned counselor (if any)
*   **Status**: The current status of the lead (e.g., Untouched, Interested, Not Interested, etc.)
*   **Date**: The date the lead was created

**Lead Edit Page**
-----------------

The lead edit page allows users to update lead information.

### Lead Statuses
----------------

The LMS supports multiple statuses for leads:

*   **Untouched**: The lead has not been touched or updated.
*   **Interested**: The lead is interested in the school/institution.
*   **Not Interested**: The lead is not interested in the school/institution.
*   **No Response**: The lead did not respond to the inquiry.
*   **Admitted**: The lead was admitted to the school/institution.
*   **Assigned**: The lead was assigned a counselor.

**Dependencies**
--------------

The LMS uses the following dependencies:

### Laravel Dependencies

*   `php`: ^8.0.2
*   `arielmejiadev/larapex-charts`: ^5.2
*   `barryvdh/laravel-dompdf`: ^2.0
*   `guzzlehttp/guzzle`: ^7.2
*   `laravel/framework`: ^9.2
*   `laravel/sanctum`: ^2.14.1
*   `laravel/socialite`: ^5.5
*   `laravel/tinker`: ^2.7
*   `laravel/ui`: ^3.4
*   `livewire/livewire`: ^2.12
*   `maatwebsite/excel`: ^3.1
*   `razorpay/razorpay`: ^2.9

### Laravel Dev Dependencies

*   `fakerphp/faker`: ^1.9.1
*   `laravel/sail`: ^1.0.1
*   `mockery/mockery`: ^1.4.4
*   `nunomaduro/collision`: ^6.1
*   `phpunit/phpunit`: ^9.5.10
*   `spatie/laravel-ignition`: ^1.0

### Node Dev Dependencies

*   `@popperjs/core`: ^2.10.2
*   `axios`: ^0.25
*   `bootstrap`: ^5.1.3
*   `laravel-mix`: ^6.0.6
*   `lodash`: ^4.17.19
*   `postcss`: ^8.1.14
*   `resolve-url-loader`: ^5.0.0
*   `sass`: ^1.32.11
*   `sass-loader`: ^11.0.1