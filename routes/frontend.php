<?php

use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Frontend\ApplicationOtpController;
use App\Http\Controllers\Frontend\SchoolPageLeadController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Front\TestController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\UserController;
// use App\Http\Controllers\Frontend\SchoolController;
// use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FacebookController;
use App\Http\Controllers\Frontend\FrontController;
// New UI integration
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\BlogLeadController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\JobApplyController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\SchoolClaimQueryController;
use App\Http\Controllers\Frontend\SchoolNewApplicationController;
use App\Http\Controllers\Frontend\UnsubscribeController;

Route::group(['namespace' => 'Frontend'], function () {
  Route::get('/', [FrontController::class, 'index'])->name('schools.index');
  Route::get('/add-school', [FrontController::class, 'registerSchool'])->name('register-school');
  Route::get('register/claim/school/{id}', [FrontController::class, 'registerclaimschool'])->name('register.claim.school');
  Route::get('/trial', [FrontController::class, 'index1'])->name('schools.trial');
  Route::get('school/header/search/{key}/{latitude}/{longitude}', [FrontController::class, 'school_header_search']);
  Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
  Route::post('/user/signup', [UserController::class, 'signup'])->name('user.signup');

  Route::get('facebook/login', [FacebookController::class, 'provider'])->name('facebook.login');
  Route::get('facebook/callback', [FacebookController::class, 'handleCallback'])->name('facebook.callback');
  Route::get('google/login', [GoogleController::class, 'provider'])->name('google.login');
  Route::get('google/callback', [GoogleController::class, 'handleCallback'])->name('google.callback');

  Route::get('/searchin/{key?}', [FrontController::class, 'search'])->name('searchin');
  Route::get('/recommend/{keys?}', [FrontController::class, 'school_trends']);
  Route::get('/details/{slug}', [FrontController::class, 'details'])->name('details');
  Route::post('/school/review/add', [FrontController::class, 'postreview'])->name('school.review.add');

  Route::get('/about-us', [FrontController::class, 'about'])->name('about-us');
  // Route::get('/careers', [FrontController::class, 'careers'])->name('careers');
  Route::get('/careers', [JobController::class, 'careers'])->name('careers');
  Route::get('career/apply/{id}', [JobController::class, 'apply'])->name('career.apply');
  Route::post('job/apply/submit', [JobApplyController::class, 'apply'])->name('job.apply.submit');
  // Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
  Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
  Route::post('/submitcontact', [FrontController::class, 'submitcontact'])->name('school.submit.contact');
  Route::get('/privacy', [FrontController::class, 'privacy'])->name('privacy');
  Route::get('/refund', [FrontController::class, 'refund'])->name('school.refund');
  Route::get('/shipping', [FrontController::class, 'shipping'])->name('school.shipping');
  // Route::get('/about',[SchoolController::class,"about"])->name('school.about');
  // School Page Lead Submit
  Route::post('/school/lead/submit', [SchoolPageLeadController::class, 'submit_query'])->name('school.page.lead.submit');
  Route::get('/terms', [FrontController::class, 'terms'])->name('school.terms');
  Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
  Route::get('/blogs/list', [BlogController::class, 'bloglist'])->name('blog.list');
  Route::get('/school/blog/details/{slug}', [BlogController::class, 'blogdetails'])->name('blog.details');
  Route::post('/blogs/comment/add', [BlogController::class, 'blogcommentadd'])->name('blog.comment.new');

  Route::get('/schools/compare/', [FrontController::class, 'compare']);
  Route::get('/school/compares/', [CompareController::class, 'school_compare'])->name('schools.compare');
  Route::get('/school/addtocompare/{id}', [CompareController::class, 'addToCompare']);
  Route::get('/school/compare', [CompareController::class, 'schoolcompare'])->name('school.compare');
  Route::get('/school/compare/remove/{id}', [CompareController::class, 'removecompare'])->name('school.compare.remove');

  // Route::get('/school/application/{id}', [FrontController::class, "school_application"])->name('school.application');
  Route::get('/school/applicationform/fields', [FrontController::class, 'get_application_fields']);
  Route::post('/school/application/save', [FrontController::class, 'save_application_form']);
  Route::get('test-form/{school_id}', function () {
    return view('frontend.testForm');
  });
  Route::get('school/new/application/form/{school_id}', [SchoolNewApplicationController::class, 'application_form'])->name('school.new.application.form');
  Route::post('school/new-application/submit', [SchoolNewApplicationController::class, 'application_submit'])->name('school.new.application.submit');

  Route::post('/front/counsellor/enquery', [FrontController::class, 'front_counsellor_enquiry'])->name('front.counsellor.enquiry');
  Route::get('school/claimquery', [SchoolClaimQueryController::class, 'schoolclaimquery'])->name('school.claimquery');
  Route::post('school/claimquery/submit', [SchoolClaimQueryController::class, 'newclaim'])->name('school.claimquery.submit');
  Route::post('school/claimquery/register/submit', [SchoolClaimQueryController::class, 'newclaimregister'])->name('school.claimquery.register.submit');

  Route::get('unsubcribe/{school_id}', [UnsubscribeController::class, 'unsubscribe'])->name('unsubscribe');

  Route::get('/logout', [UserController::class, 'logout'])->name('student.front.logout');

  // Blog Lead Route
  Route::post('blog-lead/submit', [BlogLeadController::class, 'blog_lead_submit'])->name('blog.lead.submit');
  //
  // Test cases
  Route::get('/test1/{key}', [FrontController::class, 'test_index'])->name('schools.test.index');
  // Application OTP
  Route::post('/send/application/otp', [ApplicationOtpController::class, 'send_otp'])->name('send.application.otp');
  Route::post('/verify/application/otp', [ApplicationOtpController::class, 'verify'])->name('verify.application.otp');
});
Route::get('/article/', [ArticleController::class, 'articlelist'])->name('article.list');
Route::get('/article/{custom_url}', [ArticleController::class, 'articledetails'])->name('article.details');
Route::get('/article/category/{category_slug}', [ArticleController::class, 'articlecategorylist'])->name('article.category.list');
Route::get('/article/author/{author_slug}', [ArticleController::class, 'authorwise_articles'])->name('article.authorwise.list');
