<?php

use App\Http\Controllers\Admin\AllEnquiryManuallyController;
use App\Http\Controllers\Admin\ArticleAuthorController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogLeadManageController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ManageSchoolClaimController;
use App\Http\Controllers\Admin\MouController;
use App\Http\Controllers\Admin\SchoolAutoLeadExportController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SchoolDashboardController;
use App\Http\Controllers\Admin\SchoolFeatureController;
use App\Http\Controllers\Admin\SchoolFeatureEditController;
use App\Http\Controllers\Admin\SchoolLeadPageAdminController;
use App\Http\Controllers\Admin\SchoolNewApplicationAdminController;
use App\Http\Controllers\Admin\SchoolSettingController;
use App\Http\Controllers\Admin\SchoolVerificationController;
use App\Http\Controllers\Admin\StateDistrictController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserSettingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Frontend\SchoolSearchController;
use App\Http\Controllers\Lead\SchoolApplicationController;
use App\Http\Controllers\School\SchoolAdminController;
use App\Http\Controllers\School\SchoolClaimController;
use App\Http\Controllers\WhatsApp\MessageController;
use App\Http\Controllers\AccessDenied;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\SecurityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes(
  [
    'login' => false,
    'register' => false,
  ]
);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('schooladmin/home',[App\Http\Controllers\HomeController::class,'schoolHome'])->name('school.admin')->middleware('is_SchoolAdmin');
Route::get('index1', function () {
  return view('index1');
});

Route::view('best-school', 'frontend.best-school')->name('best-school');
Route::view('termsAndCondution', 'frontend.termsAndCondution')->name('termsAndCondution');
Route::view('terms', 'frontend.terms')->name('terms');
// Route::view('privacy', 'frontend.privacy')->name('privacy');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('claim/verify/mobile/{code}', [SchoolClaimController::class, 'claim_mobile_verify'])->name('claim.verify.mobile');
Route::post('claim/verify/otp', [SchoolClaimController::class, 'claim_mobile_otp'])->name('claim.verify.otp');
// Route::get('about-us', function () {
//  return view('frontend.about-us');
// })->name('about-us');
Route::get('registerYourSchool', function () {
  return view('frontend.registerYourSchool');
})->name('registerYourSchool');
Route::get('student/enquiry', function () {
  return view('frontend.social-enquiry');
});
//x----------------------------------------------- InterviewController---------------------------------------------------------------------------------x
Route::get('/interview-form', [InterviewController::class, 'showForm'])->name('interview.showfrom');
Route::get('/interview-user-details', [InterviewController::class, 'userDetails'])->name('interview.userdetails');
Route::post('/interview-user-details/store',[InterviewController::class,'storeuserDetails'])->name('interview.userdetails.store');
Route::post('/interview-form/store',[InterviewController::class,'storeshowForm'])->name('interview.showfrom.store');
//x----------------------------------------------- InterviewController---------------------------------------------------------------------------------x
Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'is_Admin'], 'prefix' => 'admin'], function () {
  Route::get('home', [DashboardController::class, 'index'])->name('home');
  Route::get('logout', [LogoutController::class, 'perform'])->name('logout.perform');
  Route::get('state', [SchoolController::class], 'state');
  Route::get('state_t', [SchoolController::class], 'state');
  // Route::post('/admin/addschool',[SchoolController::class],'addschool');

  // interview controller
  Route::get('interview/index', [InterviewController::class, 'index'])->name('interview.index');
  Route::get('interview/view/{id}', [InterviewController::class, 'view'])->name('interview.view');
  // Verification Route
  Route::get('school/verified/list', [SchoolVerificationController::class, 'verified_school_list'])->name('school.verified.list');
  Route::get('school/remove/verification/{id}', [SchoolVerificationController::class, 'remove_verification'])->name('school.remove.verification');
  Route::get('school/verify/school/{id}', [SchoolVerificationController::class, 'verify_school'])->name('school.verify');
  Route::get('district/list', [StateDistrictController::class, 'district_list'])->name('district.list');
  Route::post('claim/update', [SchoolController::class, 'claimverify'])->name('claim.verify');
  Route::get('students/all', [StudentController::class, 'index'])->name('students.all');
  Route::get('student/{id}/details', [StudentController::class, 'view'])->name('student.view');
  Route::get('student/query/{id}/approve', [StudentController::class, 'queryApprove'])->name('student.query.approve');
  Route::get('student/query/{id}/reject', [StudentController::class, 'queryReject'])->name('student.query.reject');
  Route::get('student/queries', [StudentController::class, 'allQueries'])->name('student.query');
  Route::get('queries/download', [StudentController::class, 'downloadStudentQueries'])->name('queries.download');
  Route::get('student/website/queries', [StudentController::class, 'webQueries'])->name('student.website.query');
  Route::get('student/website/query/details/{id}', [StudentController::class, 'webQueryDetails'])->name('student.website.query.details');
  Route::post('student/website/query/download', [StudentController::class, 'exportWebStudentQueries'])->name('student.website.query.export');
  /** School related setting */
  // Board settings
  Route::get('boards/list', [SchoolSettingController::class, 'boardlist'])->name('boards.list');
  Route::get('board/add', [SchoolSettingController::class, 'boards'])->name('board.add');
  Route::post('board/add', [SchoolSettingController::class, 'addboards'])->name('board.add.new');
  Route::get('board/edit/{id}', [SchoolSettingController::class, 'editboard'])->name('board.edit');
  Route::post('board/update', [SchoolSettingController::class, 'updateboard'])->name('board.update');
  // Manage Career and Jobs
  Route::get('career/job/add', [CareerController::class, 'job_add'])->name('career.job.add');
  Route::post('career/job/post', [CareerController::class, 'add_job'])->name('career.job.post');
  Route::get('career/job/list', [CareerController::class, 'job_list'])->name('career.job.list');
  Route::get('career/job/edit/details/{id}', [CareerController::class, 'job_edit'])->name('career.job.edit.details');
  Route::post('career/job/update', [CareerController::class, 'job_update'])->name('career.job.update');
  Route::get('career/job/applications', [CareerController::class, 'all_applications'])->name('career.job.applications');
  // Manage Mediums
  Route::get('medium/add', [SchoolSettingController::class, 'mediums'])->name('medium.add');
  Route::post('medium/add', [SchoolSettingController::class, 'addmediums'])->name('medium.add.new');
  Route::get('medium/list', [SchoolSettingController::class, 'mediumlist'])->name('medium.list');
  Route::get('medium/edit/{id}', [SchoolSettingController::class, 'editmedium'])->name('medium.edit');
  Route::post('medium/update', [SchoolSettingController::class, 'updatemedium'])->name('medium.update');
  // School category
  Route::get('category/list', [SchoolSettingController::class, 'categorylist'])->name('school.category.list');
  // Manage users
  Route::get('user/add', [UserSettingController::class, 'user'])->name('user.add');
  Route::post('user/add', [UserSettingController::class, 'adduser'])->name('user.add.new');
  Route::get('list/user', [UserSettingController::class, 'listuser'])->name('user.list');
  Route::get('user/{id}/approve', [UserSettingController::class, 'approvestatus'])->name('user.approve');
  Route::get('user/{id}/block', [UserSettingController::class, 'blockstatus'])->name('user.block');
  Route::get('admin/changepassword', [UserSettingController::class, 'changepass'])->name('admin.changepassword');
  Route::post('admin/changepassword', [UserSettingController::class, 'changepassword'])->name('change.password');
  Route::get('list/schooladmin', [UserSettingController::class, 'schooladminlist'])->name('school.user.list');
  // School Information
  Route::get('school/list', [SchoolController::class, 'schoollist'])->name('school.list');
  Route::get('school/applied/list', [SchoolController::class, 'appliedSchool'])->name('school.applied.list');
  Route::get('school/claimed/list', [SchoolController::class, 'claimschool'])->name('school.claimed.list');
  Route::get('school/details/{id}', [SchoolController::class, 'viewschool'])->name('school.details');
  Route::get('school/claim/{id}', [SchoolController::class, 'claimdetails'])->name('school.claim.details');
  Route::get('school/admission/list', [SchoolController::class, 'school_admission'])->name('school.admission.list');
  Route::post('school/admission/update', [SchoolController::class, 'admission_update'])->name('school.admission.update');
  Route::get('school/trending/list', [SchoolController::class, 'school_trending'])->name('school.trending.list');
  Route::post('school/trending/update', [SchoolController::class, 'trending_update'])->name('school.trending.update');
  Route::get('school/approved/list', [SchoolController::class, 'approveschoollist'])->name('school.approved.list');
  Route::get('school/incomplete/list', [SchoolController::class, 'incompleteSchool'])->name('school.incomplete.list');
  // Add School
  Route::get('school/add', [SchoolController::class, 'index'])->name('school.add');
  Route::post('school/add', [SchoolController::class, 'addschool'])->name('school.add.new');
  Route::get('school/add/about', [SchoolController::class, 'aboutschool'])->name('school.add.about');
  Route::post('school/add/about', [SchoolFeatureController::class, 'aboutschool'])->name('school.about.new');
  Route::get('school/add/eligibility', [SchoolController::class, 'eligibility'])->name('school.add.eligibility');
  Route::post('school/add/eligibility', [SchoolFeatureController::class, 'eligibility'])->name('school.eligibility.new');
  Route::get('school/add/academic/performance', [SchoolController::class, 'academicperformance'])->name('school.add.academic');
  Route::post('school/add/academic/performance', [SchoolFeatureController::class, 'academicperformance'])->name('school.academic.new');
  Route::get('school/add/opening/hours', [SchoolController::class, 'openinghours'])->name('school.add.hours');
  Route::post('school/add/opening/hours', [SchoolFeatureController::class, 'openinghours'])->name('school.hours.new');
  Route::get('school/add/gallery', [SchoolController::class, 'schoolgallery'])->name('school.add.gallery');
  Route::post('school/add/gallery', [SchoolFeatureController::class, 'schoolgallery'])->name('school.gallery.new');
  Route::get('school/add/seat/availability', [SchoolController::class, 'seatavailability'])->name('school.add.seatavailable');
  Route::post('school/add/seat/availability', [SchoolFeatureController::class, 'seatavailability'])->name('school.seatavailable.new');
  Route::get('school/add/facilities', [SchoolController::class, 'schoolfacilities'])->name('school.add.facility');
  Route::post('school/add/facilities', [SchoolFeatureController::class, 'schoolfacilities'])->name('school.facility.new');
  Route::get('school/add/fees/structure', [SchoolController::class, 'feesstructure'])->name('school.add.fees');
  Route::post('school/add/fees/structure', [SchoolFeatureController::class, 'feesstructure'])->name('school.fees.new');
  // Edit Schools
  Route::get('school/edit/{id}', [SchoolFeatureEditController::class, 'editschool'])->name('school.info.edit');
  Route::post('school/update', [SchoolFeatureEditController::class, 'updateschool'])->name('school.info.update');
  Route::get('about/edit/{id?}', [SchoolFeatureEditController::class, 'editaboutschool'])->name('school.about.edit');
  Route::post('about/update', [SchoolFeatureEditController::class, 'updateaboutschool'])->name('school.about.update');
  Route::get('elligibility/edit/{id}', [SchoolFeatureEditController::class, 'editschooleligibility'])->name('school.eligibility.edit');
  Route::post('elligibility/update', [SchoolFeatureEditController::class, 'updateschooleligibility'])->name('school.eligibility.update');
  Route::get('academic/edit/{id}', [SchoolFeatureEditController::class, 'academicperformance'])->name('school.academic.edit');
  Route::post('academic/update', [SchoolFeatureEditController::class, 'updateacademicperformance'])->name('school.academic.update');
  Route::get('fees/edit/{id}', [SchoolFeatureEditController::class, 'feesstructure'])->name('school.fees.edit');
  Route::post('fees/update', [SchoolFeatureEditController::class, 'updatefeesstructure'])->name('school.fees.update');
  Route::get('seat/edit/{id}', [SchoolFeatureEditController::class, 'seatavailable'])->name('school.seat.edit');
  Route::post('seat/update', [SchoolFeatureEditController::class, 'updateseatavailable'])->name('school.seat.update');
  Route::get('hour/edit/{id}', [SchoolFeatureEditController::class, 'openhour'])->name('school.hour.edit');
  Route::post('hour/update', [SchoolFeatureEditController::class, 'updateopenhour'])->name('school.hour.update');
  Route::get('facility/edit/{id}', [SchoolFeatureEditController::class, 'facilities'])->name('school.facility.edit');
  Route::post('facility/update', [SchoolFeatureEditController::class, 'updatefacilities'])->name('school.facility.update');
  Route::get('image/edit/{id}', [SchoolFeatureEditController::class, 'images'])->name('school.image.edit');
  Route::post('image/add/new', [SchoolFeatureEditController::class, 'addnewimage'])->name('school.image.new');
  Route::post('image/update', [SchoolFeatureEditController::class, 'imageupdate'])->name('school.image.update');

  Route::get('school/{id}/{status}/approve', [SchoolController::class, 'approval'])->name('school.approve');
  Route::get('school/{id}/{complete}/complete', [SchoolController::class, 'iscomplete'])->name('school.complete');
  // Blogs
  Route::get('blog/add', [BlogController::class, 'blogadd'])->name('blog.add');
  Route::post('blog/add/new', [BlogController::class, 'blogaddnew'])->name('blog.add.new');
  Route::get('blog/list', [BlogController::class, 'bloglist'])->name('blog.list');

  Route::get('blog/tag/list', [BlogController::class, 'blogtaglist'])->name('blog.tag.list');
  Route::get('blog/tag/add', [BlogController::class, 'blogtagadd'])->name('blog.tag.add');
  Route::post('blog/tag/new', [BlogController::class, 'blogtagnew'])->name('blog.tag.new');
  Route::get('blog/tag/edit/{id}', [BlogController::class, 'blogtagedit'])->name('blog.tag.edit');
  Route::post('blog/tag/update', [BlogController::class, 'blogtagupdate'])->name('blog.tag.update');
  Route::get('blog/category/list', [BlogController::class, 'blogcategorylist'])->name('blog.category.list');
  Route::get('blog/category/add', [BlogController::class, 'blogcategoryadd'])->name('blog.category.add');
  Route::post('blog/category/new', [BlogController::class, 'blogcategorynew'])->name('blog.category.new');
  Route::get('blog/category/edit/{id}', [BlogController::class, 'blogcategoryedit'])->name('blog.category.edit');
  Route::get('blog/edit/{id}', [BlogController::class, 'editblog']);
  Route::post('blog/category/update', [BlogController::class, 'blogcategoryupdate'])->name('blog.category.update');
  Route::get('blog/lead/list', [BlogLeadManageController::class, 'blog_lead_list'])->name('blog.lead.list');
  Route::post('blog/update', [BlogController::class, 'updateblog'])->name('blog.update');
  // Article Summernote
  Route::get('article/add', [ArticleController::class, 'article_add'])->name('article.add');
  Route::post('article/submit', [ArticleController::class, 'article_submit'])->name('article.submit');
  Route::get('article/list', [ArticleController::class, 'article_list'])->name('article.list');
  Route::get('article/edit/{id}', [ArticleController::class, 'article_edit'])->name('article.edit');
  Route::post('article/update', [ArticleController::class, 'article_update'])->name('article.update');
  Route::get('article/category/add', [ArticleController::class, 'article_category_add'])->name('article.category.add');
  Route::post('article/category/submit', [ArticleController::class, 'article_category_submit'])->name('article.category.submit');
  Route::post('article/category/update', [ArticleController::class, 'article_category_update'])->name('article.category.update');
  Route::get('article/category/list', [ArticleController::class, 'article_category_list'])->name('article.category.list');
  Route::get('article/writer/add', [ArticleAuthorController::class, 'article_writer_add'])->name('article.writer.add');
  Route::post('article/writer/submit', [ArticleAuthorController::class, 'article_author_submit'])->name('article.writer.submit');
  Route::get('article/writer/list', [ArticleAuthorController::class, 'article_writer_list'])->name('article.writer.list');
  Route::post('article/writer/update', [ArticleAuthorController::class, 'article_writer_update'])->name('article.writer.update');
  // Manage Lead
  Route::get('leads', [LeadController::class, 'index'])->name('leads.all');
  Route::get('/lead/location', [LeadController::class, 'lead_location'])->name('leads.location');
  Route::post('lead/export/location', [LeadController::class, 'export_leads_location'])->name('leads.location.export');
  Route::get('lead/{id}/details', [LeadController::class, 'details'])->name('lead.details');
  Route::get('lead/add/manual', [LeadController::class, 'manual'])->name('lead.manual');
  Route::post('lead/add', [LeadController::class, 'add_lead'])->name('lead.manual.add');
  Route::post('lead/export', [LeadController::class, 'export_leads'])->name('lead.export');
  Route::post('lead/admission', [LeadController::class, 'lead_admit_school'])->name('lead.admission');
  // Manage ClaimQueries
  Route::get('claim/query/list', [ManageSchoolClaimController::class, 'claim_list'])->name('claim.query.list');
  Route::get('claim/register/query/list', [ManageSchoolClaimController::class, 'claim_register_list'])->name('claim.register.query.list');
  Route::get('claim/query/details/{id}', [ManageSchoolClaimController::class, 'claimer_details'])->name('claim.query.details');
  // Route::post('claim/user/create',[ManageSchoolClaimController::class,'create_user'])->name('claim.user.create');
  // Route::post('claim/school/create',[ManageSchoolClaimController::class,'create_school'])->name('claim.school.create');
  // Route::post('claim/school/trial/create',[ManageSchoolClaimController::class,'create_claim'])->name('claim.school.trial');
  Route::post('claim/school/approve', [ManageSchoolClaimController::class, 'create_claim'])->name('school.approve.claim');
  Route::get('claim/{id}/verify/email', [ManageSchoolClaimController::class, 'claim_email_verify'])->name('claim.verify.email');
  // Manage Mous
  Route::get('mou/list', [MouController::class, 'list'])->name('mou.list');
  Route::get('mou/add', [MouController::class, 'add'])->name('mou.add');
  Route::get('mou/free/add', [MouController::class, 'mou_add'])->name('mou.free.add');
  Route::get('mou/free/list', [MouController::class, 'free_mou_school_list'])->name('mou.free.list');
  Route::get('mou/upgrade/{id}', [MouController::class, 'upgrade_mou'])->name('mou.upgrade');
  Route::post('mou/free/submit', [MouController::class, 'free_add_submit'])->name('mou.free.submit');
  Route::post('mou/submit', [MouController::class, 'submit'])->name('mou.submit');
  Route::get('mou/document/{id}', [MouController::class, 'details'])->name('mou.document');
  Route::get('mou/free/document/{id}', [MouController::class, 'free_details'])->name('mou.free.document');
  Route::get('mou/edit/{id}', [MouController::class, 'edit'])->name('mou.edit');
  Route::post('mou/update', [MouController::class, 'update'])->name('mou.update');
  // Add Dashboard For School
  Route::get('add/dashboard', [SchoolDashboardController::class, 'add_dashboard'])->name('school.add.dashboard');
  Route::post('submit/dashboard', [SchoolDashboardController::class, 'submit'])->name('school.submit.dashboard');
  // Enquiry form data
  Route::get('enquiry/front', [EnquiryController::class, 'enquiry_front_list'])->name('enquiry.front');
  Route::get('enquiry/councillor', [EnquiryController::class, 'enquiry_councillor_list'])->name('enquiry.councillor');
  Route::get('contact/list', [ContactController::class, 'contact_lists'])->name('contact.list');
  // ticket
  Route::get('ticket/list', [TicketController::class, 'ticket_list'])->name('ticket.list');
  Route::get('ticket/details/{id}', [TicketController::class, 'ticket_details'])->name('ticket.details');
  Route::get('ticket/solve/{id}', [TicketController::class, 'ticket_solve'])->name('ticket.solve');
  // School Application Leads
  Route::get('school/application/list', [EnquiryController::class, 'school_applications'])->name('school.applications');
  Route::get('school/new/application/list', [SchoolNewApplicationAdminController::class, 'school_application_new_leads'])->name('school.new.application.list');
  Route::get('school/new/application/daywise/{day}', [SchoolNewApplicationAdminController::class, 'daywise_lead_list'])->name('school.new.application.daywise');
  Route::get('school/new/application/by-school/{application_id}', [SchoolNewApplicationAdminController::class, 'school_application_new_leads_by_school'])->name('school.new.application.by-school');

  // School Details Page Leads
  Route::get('school/details/page/all/leads', [SchoolLeadPageAdminController::class, 'lead_list'])->name('school.details.page.all.leads');
  Route::post('school/details/page/lead/export', [SchoolLeadPageAdminController::class, 'details_page_lead_export'])->name('school.details.page.lead.export');
  //
  Route::get('all/enquiry/manually', [AllEnquiryManuallyController::class, 'add'])->name('all.enquiry.manual.add');
  Route::post('all/enquiry/manually/submit', [AllEnquiryManuallyController::class, 'submit_number'])->name('all.enquiry.manual.submit');
  // Export Leads
  Route::get('lead/export/schoolwise', [ExportController::class, 'export_school_wise'])->name('lead.export.schoolwise');
  Route::post('lead/export/school/wise', [ExportController::class, 'export_lead_school_wise'])->name('lead.export.school.wise');
  Route::get('lead/export/locationwise', [ExportController::class, 'export_location_wise'])->name('lead.export.location.wise');
  route::post('lead/export/location/wise', [ExportController::class, 'export_lead_location_wise'])->name('lead.export.locationwise');
  // School Auto Lead Export
  Route::get('lead/school/autotransfer/export', [SchoolAutoLeadExportController::class, 'school_auto_lead_export'])->name('lead.export.schoolwise.autotransfer');
  Route::post('lead/school/autotransfer/export/submit', [SchoolAutoLeadExportController::class, 'school_auto_lead_export_submit'])->name('lead.export.schoolwise.autotransfer.submit');
  // Location Auto Lead Export
  Route::get('lead/location/autotransfer/export', [SchoolAutoLeadExportController::class, 'location_wise_auto_lead_export'])->name('lead.export.locationwise.autotransfer');
  Route::post('lead/location/autotransfer/export/submit', [SchoolAutoLeadExportController::class, 'location_wise_auto_lead_export_submit'])->name('lead.export.locationwise.autotransfer.submit');
});
Route::get('search/claim', [SchoolAdminController::class, 'searchschool'])->name('search.claim');
Route::post('image/update', [SchoolFeatureEditController::class, 'imageupdate'])->name('school.image.update');
Route::post('image/delete', [SchoolFeatureEditController::class, 'imagedelete'])->name('school.image.delete');
Route::get('/schoolSearch', [SchoolSearchController::class, 'schoolSearch']);
Route::group(
  ['as' => 'whatsapp.', 'namespace' => 'Whatsapp', 'middleware' => ['auth', 'is_Whatsapp'], 'prefix' => 'whatsapp'],
  function () {
    Route::get('dashboard', [MessageController::class, 'dashboard'])->name('dashboard');
    Route::get('add', [MessageController::class, 'send'])->name('send');
    Route::post('send-message', [MessageController::class, 'send_message'])->name('send-message');
    Route::get('list-message', [MessageController::class, 'send_list'])->name('list_message');
  }
);
Route::get('404', function () {
  return view('frontend.error');
})->name('404');;
// Route::get('maintenance', function () { return view('frontend.maintenance'); })->name('maintenance');

Route::get('executive-counselling', function () {
  return view('frontend.executiveCounselling');
})->name('executive-counselling');
Route::get('manage', function () {
  return view('frontend.manage_school');
});
Route::get('logout', [LogoutController::class, 'perform'])->name('logout');

Route::get('test/add', function () {
  return view('admin.article.add');
})->name('article.add');

Route::get('/test-filter', function () {
  $exists = DB::connection('sqlite_ips')->getDatabaseName();
  return $exists ? 'Database is connected! Filter Enabled' : 'Database is not connected! Filter Disabled';
});

// Route::get('/test-ip-block', function () {
//   return 'Testing IP Block Middleware';
// })->middleware('IpFilter');

Route::get('/access-denied', [AccessDenied::class, 'blockUser'])->name('access-denied-view');
Route::match(['get'], '/security-check', [SecurityController::class, 'securityPage'])->name('security-check-view');
Route::match(['post'], '/security-check', [SecurityController::class, 'handleForm'])->name('security-check-submit');

// Route::get('test/list', function () {
//   return view('admin.article.list');
// })->name('article.list');

// Route::get('{url}', function ($url) {
//  return redirect()->away('http://www.schooldekho.org/' . $url, 301);
// })->where('url', '(.*)');

// Route::get('/route-clear', function () {
//     Artisan::call('route:clear');
// });
