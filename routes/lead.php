<?php

use App\Http\Controllers\Lead\CounselorController;
use App\Http\Controllers\Lead\AdmissionLeadController;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Lead\LeadExportController;
use App\Http\Controllers\Lead\SchoolLeadController;
use App\Http\Controllers\Lead\SchoolApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lead\DashboardController;

Route::group(['as' => 'lead.', 'namespace' => 'Lead', 'middleware' => ['auth', 'is_Lead'], 'prefix' => 'lead'], function () {
    Route::get('lead/dashboard', [CounselorController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [LeadController::class, 'logout'])->name('logout');
    //counselor routes
    Route::get('counselor/list', [CounselorController::class, 'list'])->name('counselor.list');
    Route::get('counselor/add', [CounselorController::class, 'add'])->name('counselor.add');
    Route::post('counselor/submit', [CounselorController::class, 'submit'])->name('counselor.submit');
    Route::get('counselor/details/{id}', [CounselorController::class, 'details'])->name('counselor.details');
    //lead routes
    Route::get('lead/add', [LeadController::class, 'Add'])->name('lead.add');
    Route::get('lead/direct', [LeadController::class, 'direct'])->name('lead.direct');
    Route::post('lead/submit', [LeadController::class, 'Submit'])->name('lead.submit');
    Route::get('lead/list', [LeadController::class, 'List'])->name('lead.list');
    Route::get('lead/location/list', [LeadController::class, 'lead_by_location'])->name('location.list');
    Route::get('interested/list', [LeadController::class, 'interested'])->name('interested.list');
    Route::get('notinterested/list', [LeadController::class, 'not_interested'])->name('notinterested.list');
    Route::get('transfered/list', [LeadController::class, 'transfer_leads'])->name('transfer');
    Route::get('lead/upload', [LeadController::class, 'bulk_upload'])->name('lead.bulk');
    Route::get('lead/download', [LeadController::class, 'download'])->name('sample.download');
    Route::post('lead/bulk/upload', [LeadController::class, 'lead_bulk_upload'])->name('bulk.upload');
    Route::get('lead/assign', [LeadController::class, 'lead_assign'])->name('lead.assign');
    Route::post('lead/assign/counselor', [LeadController::class, 'lead_assign_counselor'])->name('lead.assign.counselor');
    Route::get('lead/edit/{id}', [LeadController::class, 'edit'])->name('lead.edit');
    Route::post('lead/update', [LeadController::class, 'update'])->name('lead.update');
    Route::get('lead/details/{id}', [LeadController::class, 'details'])->name('lead.details');
    Route::post('lead/transfer', [LeadController::class, 'lead_transfer'])->name('lead.transfer');
    Route::get('lead/pending/list', [LeadController::class, 'pending'])->name('lead.pending');
    Route::get('lead/search', [LeadController::class, 'search'])->name('lead.search');
    Route::get('lead/name/search', [LeadController::class, 'lead_search'])->name('lead.name.search');
    Route::post('lead/export', [LeadExportController::class, 'export_leads'])->name('school.export');
    Route::get('lead/location/export', [LeadExportController::class, 'export_leads_location'])->name('export.location');
    //School Dashboards
    Route::get('schooldashboard/list', [DashboardController::class, 'all_schools'])->name('schooldashboard.list');
    //School Wise Leads
    Route::get('lead/schoolwise', [SchoolLeadController::class, 'school_lead_list'])->name('lead.schoolwise');
    //Admitted Leads
    Route::get('lead/admission', [AdmissionLeadController::class, 'admitted_leads'])->name('lead.admission');
    //School Application Leads
    Route::get('school/application/list', [SchoolApplicationController::class, 'school_applications'])->name('school.applications');

});

    Route::get('school/application/details/{id}', [SchoolApplicationController::class, 'application_details'])->name('school.application.details');
    Route::post('school/application/export', [SchoolApplicationController::class, 'application_export'])->name('school.application.export');

