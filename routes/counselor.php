<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Counselor\CounselorAdmissionController;
use App\Http\Controllers\Counselor\CounselorsController;
use App\Http\Controllers\Counselor\LeadTransferController;
use App\Http\Controllers\Counselor\WhatsappController;
use App\Service\BusinessService;

Route::get('counselor/login', [CounselorsController::class, 'login']);
Route::post('counselor/sendotp', [CounselorsController::class, 'send_otp']);
Route::post('counselor/verify', [CounselorsController::class, 'verify']);
Route::get("/send", function () {
    $message = "Your school dekho OTP is 72534";
    return BusinessService::SendSms(null, "7679195841", $message);
});
Route::group(['as' => 'counselor.', 'namespace' => 'Counselor', 'middleware' => ['auth', 'is_Counselor'], 'prefix' => 'counselor'], function () {

    Route::get('counselor/dashboard', [CounselorsController::class, 'dashboard'])->name('dashboard');
    Route::get('counselor/new/lead', [CounselorsController::class, 'new_assign_leads'])->name('new.leads');
    Route::get('counselor/lead/details/{id?}/{counselor_id?}', [CounselorsController::class, 'lead_details'])->name('lead.details');
    Route::post('counselor/remarks/submit', [CounselorsController::class, 'submit_remarks'])->name('remarks.submit');
    Route::get('counselor/old/lead', [CounselorsController::class, 'old_leads'])->name('old.leads');
    Route::get('counselor/interested/leads', [CounselorsController::class, 'interested_leads'])->name('interested.leads');
    Route::get('counselor/pending/leads', [CounselorsController::class, 'all_pending_leads'])->name('pending.leads');
    Route::get('counselor/lead/search', [CounselorsController::class, 'lead_search'])->name('lead.search');
    Route::get('counselor/lead/search/phone', [CounselorsController::class, 'lead_search_phone'])->name('lead.search.phone');
    Route::get('counselor/lead/followup', [CounselorsController::class, 'followup_leads'])->name('lead.followup');
    Route::get('counselor/lead/edit/{id}', [CounselorsController::class, 'lead_edit'])->name('lead.edit');
    Route::post('counselor/lead/update', [CounselorsController::class, 'lead_update'])->name('lead.update');
    Route::get('counselor/lead/delete/{lead_id}/{school_id}', [CounselorsController::class, 'lead_delete'])->name('lead.delete');
    Route::get('counselor/admitted/leads', [CounselorAdmissionController::class, 'admission_leads'])->name('lead.admission');
    Route::get('counselor/location/search', [LeadTransferController::class, 'search_result'])->name('location.serach');
    Route::post('counselor/lead/transfer', [LeadTransferController::class, 'lead_transfer'])->name('lead.transfer');
    Route::post('counselor/send/whatsapp', [WhatsappController::class, 'SendWhatsAppMessage'])->name('lead.whatsapp.message');
    Route::get('logout', [CounselorsController::class, 'logout'])->name('logout');
});
