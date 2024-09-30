<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\SchoolAdmin\ClaimController;
use App\Http\Controllers\SchoolAdmin\SchoolController;
use App\Http\Controllers\SchoolAdmin\SupportController;
use App\Http\Controllers\SchoolAdmin\SchoolAddController;
use App\Http\Controllers\SchoolAdmin\SchoolEditController;
use App\Http\Controllers\SchoolAdmin\SchoolLeadController;
use App\Http\Controllers\SchoolAdmin\ApplicationController;
use App\Http\Controllers\SchoolAdmin\SubscriptionController;
use App\Http\Controllers\SchoolAdmin\SchoolNewAdminController;
use App\Http\Controllers\SchoolAdmin\AccountSettingsController;
use App\Http\Controllers\SchoolAdmin\RazorpayController;
use App\Http\Controllers\SchoolAdmin\SchoolComplimentaryController;
use App\Http\Controllers\SchoolAdmin\SchoolDetailsUpdateController;

Route::get('all/school/list', [SchoolNewAdminController::class, 'allschoollist'])->name('schooladmin.school.list');
Route::group(
    ['as' => 'schooladmin.', 'namespace' => 'SchoolAdmin', 'middleware' => ['auth', 'is_SchoolAdmin'], 'prefix' => 'school-admin'],
    function () {
        Route::get('dashboard', [SchoolNewAdminController::class, 'index'])->name('dashboard');
        //razorpay payment
        Route::get('checkout/{schoolid}', [SchoolNewAdminController::class, 'checkout'])->name('checkout');
        Route::post('pay',[RazorpayController::class, 'payment_checkout'])->name('pay');
        Route::get('schools', [SchoolController::class, 'schools'])->name('schools');
        Route::get('notifications', [SchoolNewAdminController::class, 'notifications'])->name('notifications');
        Route::get('support', [SchoolNewAdminController::class, 'support'])->name('support');
        Route::get('faq1', [SchoolNewAdminController::class, 'faq'])->name('faq');
        Route::get('priority_support', [SchoolNewAdminController::class, 'priority_support'])->name('prioritysupport');
        Route::get('ticket_history', [SchoolNewAdminController::class, 'ticket_history'])->name('ticket_history');
        Route::get('ticket/details/{id}', [SupportController::class, 'ticket_details'])->name('ticket.details');
        Route::get('all_lead', [SchoolNewAdminController::class, 'all_leads'])->name('all_leads');
        Route::get('lead_export', [SchoolNewAdminController::class, 'lead_export'])->name('lead_export');
        Route::get('subscription', [SchoolNewAdminController::class, 'subscription'])->name('subscription');
        // Route::get('payment_history', [SchoolNewAdminController::class, 'payment_history'])->name('payment_history');//To be opened soon
        Route::get('subscription_benefit', [SchoolNewAdminController::class, 'subscription_benefit'])->name('subscription_benefit');
        Route::get('manage_user', [SchoolNewAdminController::class, 'manage_user'])->name('manage_user');
        Route::get('account_settings', [AccountSettingsController::class, 'account_settings'])->name('account_settings');
        Route::post('reset_pass', [AccountSettingsController::class, 'password_update'])->name('reset_pass');
        Route::get('reset_password', [AccountSettingsController::class, 'reset_password'])->name('reset_password');
        Route::post('ticket_generate', [SupportController::class, 'ticket_generate'])->name('ticket_generate');
        // Route::get('bill/{id}', [SchoolNewAdminController::class, 'payment_receipt'])->name('payment_receipt');//To be opened after billing section ready
        //Edit school 
        Route::get('about_new/edit/{id}', [SchoolEditController::class, 'school_about'])->name('about_new.edit');
        Route::post('about_new/update', [SchoolEditController::class, 'update_school_about'])->name('about_new.update');

        Route::get('contact_new/edit/{id}', [SchoolEditController::class, 'school_contact'])->name('contact_new.edit');
        Route::post('contact_new/update', [SchoolEditController::class, 'update_school_contact'])->name('contact_new.update');
        Route::get('eligibility_new/edit/{id}', [SchoolEditController::class, 'eligibility'])->name('eligibility_new.edit');
        Route::post('eligibility_new/update', [SchoolEditController::class, 'update_school_elligibility'])->name('eligibility_new.update');
        Route::get('opening_hour/edit/{id}', [SchoolEditController::class, 'opening_hour'])->name('opening_hour_new.edit');
        Route::post('opening_hour/update', [SchoolEditController::class, 'update_opening_hour'])->name('opening_hour_new.update');
        Route::get('fees_new/edit/{id}', [SchoolEditController::class, 'fees_structure'])->name('fees_new.edit');
        Route::post('fees_new/update', [SchoolEditController::class, 'update_fees_structure'])->name('fees_new.update');
        Route::get('facilities/edit/{id}', [SchoolEditController::class, 'facilities'])->name('facilities_new.edit');
        Route::post('facilities/update', [SchoolEditController::class, 'update_facilities'])->name('facilities_new.update');
        //remaining development
        Route::get('principal_new/edit/{id}', [SchoolEditController::class, 'school_principal'])->name('principal_new.edit');
        Route::post('principal_new/update', [SchoolEditController::class, 'update_school_principal'])->name('principal_new.update');
        Route::get('gallery/edit/{id}', [SchoolEditController::class, 'gallery'])->name('gallery_new.edit');
        Route::get('school_claim/{id}', [ClaimController::class, 'claim'])->name('claim.add');
        Route::post('claim/new/submit', [ClaimController::class, 'claim_submit'])->name('claim.new.submit');
        //Add School
        Route::get('school/add', [SchoolAddController::class, 'add'])->name('add');
        Route::get('schooladmin/contact_details', [SchoolAddController::class, 'contact'])->name('contact.details');
        Route::get('schooladmin/eligibility', [SchoolAddController::class, 'eligibility'])->name('eligibility.details');
        Route::get('schooladmin/timing', [SchoolAddController::class, 'openinghour'])->name('timing.details');
        Route::get('schooladmin/feesstructrure', [SchoolAddController::class, 'feesstructure'])->name('fees.details');
        Route::get('schooladmin/gallery', [SchoolAddController::class, 'gallery'])->name('gallery.details');
        Route::get('schooladmin/logout', [LogoutController::class, 'perform'])->name('logout');
        Route::post('account_details/update', [AccountSettingsController::class, 'account_update'])->name('account_update');
        //Lead manage
        Route::get('leads', [SchoolLeadController::class, 'index'])->name('leads.all');
        Route::post('lead/submit/remarks', [SchoolLeadController::class, 'submit_remarks'])->name('lead.remarks.submit');
        Route::get('leads/filter', [SchoolLeadController::class, 'lead_by_school'])->name('leads.filter');
        Route::get('lead/{id}/details/{school_id}', [SchoolLeadController::class, 'details'])->name('lead.details');
        Route::get('leads/export', [SchoolLeadController::class, 'show_export_leads'])->name('lead.export');
        Route::post('leads/export', [SchoolLeadController::class, 'export_leads'])->name('lead.export.save');
        Route::post('principal/update', [SchoolDetailsUpdateController::class, 'update_principal'])->name('principal.update');
        Route::post('school_logo/update', [SchoolDetailsUpdateController::class, 'update_school_logo'])->name('logo.update');
        Route::post('gallery/new/pic/upload', [SchoolEditController::class, 'upload_new_image'])->name('gallery.new.upload');
        //Application Form
        Route::get('application/form/create/{id}', [ApplicationController::class, 'createform'])->name('application.form');
        Route::get('application/form/details/{school_id}', [ApplicationController::class, 'getDetailsApi'])->name('application.details');
        Route::post('application/form/create', [ApplicationController::class, 'createFormApi'])->name('application.form.create');
        Route::post('application/form/update', [ApplicationController::class, 'updateFormApi'])->name('application.form.update');
        //Complimentary
        Route::get('complimentary/list', [SchoolComplimentaryController::class, 'complimentary_list'])->name('complimentary.list');
        Route::get('complimentary/pictures/{id}', [SchoolComplimentaryController::class, 'event_pictures'])->name('complimentary.event.pictures');
        Route::get('complimentary/use/image/{id}', [SchoolComplimentaryController::class, 'use_image'])->name('complimentary.use.image');
        Route::get('complimentary/school/selection/{school_id}', [SchoolComplimentaryController::class, 'school_selection'])->name('complimentary.school.selection');
    }
);
