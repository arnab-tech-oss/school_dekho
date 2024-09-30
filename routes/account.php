<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\SessionController;
use Illuminate\Support\Facades\Route; 

Route::group(['as' => 'account.', 'namespace' => 'Account', 'middleware' => ['auth', 'is_Account'], 'prefix' => 'account'], function () {

    Route::get('account/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
    // Bill Sessions
    Route::get('account/billsession/list', [SessionController::class, 'bill_session_list'])->name('session.list');
    Route::get('account/billsession/add', [SessionController::class, 'bill_session_add'])->name('session.add');
    Route::post('account/billsession/submit', [SessionController::class, 'bill_session_submit'])->name('session.submit');
    Route::get('account/bill/list', [AccountController::class, 'list'])->name('list');
    Route::get('account/bill/proforma/list', [AccountController::class, 'proforma_list'])->name('proforma.list');
    Route::get('account/bill/add', [AccountController::class, 'add'])->name('add');
    Route::post('account/bill/submit', [AccountController::class, 'submit'])->name('submit');
    Route::get('account/school/original/receipt/{id}', [AccountController::class, 'schoolcopy_original'])->name('schoolreceipt.original');
    Route::get('account/school/proforma/receipt/{id}', [AccountController::class, 'schoolcopy_proforma'])->name('schoolreceipt.proforma');
    Route::get('account/office/original/receipt/{id}', [AccountController::class, 'officecopy_original'])->name('officereceipt.original');
    Route::get('account/office/proforma/receipt/{id}', [AccountController::class, 'officecopy_proforma'])->name('officereceipt.proforma');
    Route::get('account/bill/original/edit/{id}', [AccountController::class, 'original_edit'])->name('original.edit');
    Route::get('account/bill/proforma/edit/{id}', [AccountController::class, 'proforma_edit'])->name('proforma.edit');
    Route::post('account/bill/original/update', [AccountController::class, 'original_update'])->name('original.update');
    Route::post('account/bill/proforma/update', [AccountController::class, 'proforma_update'])->name('proforma.update');
    Route::get('bill/cancel/{id}', [AccountController::class, 'cancel_original_bill'])->name('original.cancel');
    Route::get('logout', [AccountController::class, 'logout'])->name('logout');
});
