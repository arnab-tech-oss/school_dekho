<?php
use App\Http\Controllers\Admin\ComplimentaryController;
use Illuminate\Support\Facades\Route; 

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'is_Admin'], 'prefix' => 'admin'], function () {
    Route::get('complimentary/add', [ComplimentaryController::class, 'add_event'])->name('complimentary.add');
    Route::post('complimentary/add/submit', [ComplimentaryController::class, 'add_event_submit'])->name('complimentary.add.submit');
    Route::get('complimentary/list', [ComplimentaryController::class, 'complimentary_event_list'])->name('complimentary.list');
    Route::get('complimentary/edit/{id}', [ComplimentaryController::class, 'complementary_edit'])->name('complimentary.edit');
    Route::post('complimentary/update', [ComplimentaryController::class, 'complimentary_update'])->name('complimentary.update');
    Route::get('complimentary/upload/{id}', [ComplimentaryController::class, 'upload_image'])->name('complimentary.upload');
    Route::post('complimentary/upload/submit', [ComplimentaryController::class, 'upload_image_submit'])->name('complimentary.upload.submit');
    Route::get('complimentary/delete/image/{id}', [ComplimentaryController::class, 'delete_image'])->name('complimentary.delete.image');
});
