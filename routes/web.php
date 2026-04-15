<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CacheHeaders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoTestimonialController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PhotoListController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\RoomBookController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeamCategoryController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\NaraMemberController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogUsersController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\CurriculamController;
use App\Http\Controllers\Admin\CurriculamCategoryController;
use App\Http\Controllers\Admin\CurriculamListController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SeoMetaController;
use App\Http\Controllers\Admin\FeeCategoryController;
use App\Http\Controllers\Admin\FeeListController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FacilitieController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AllPageController;
use App\Http\Controllers\Admin\RetreatPageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\YogaClassController;
use App\Http\Controllers\Admin\BookingsController;
use App\Http\Controllers\Admin\ReferralsController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\ReferralSettingController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\Booking\BookingController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\front\LandingPageController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\LandingOutcomeController;
use App\Http\Controllers\KeyPointsController;
use App\Http\Controllers\LandingWhyChooseController;
use App\Http\Controllers\LandingCourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\WhyComeToPokharaController;

// header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
// header('Cache-Control: no-store, no-cache, must-revalidate');
// header('Cache-Control: post-check=0, pre-check=0', FALSE);
// header('Pragma: no-cache');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/foo', function () {
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    return "Cache Cleared";
});

Route::get('/cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:cache');
    // \Artisan::call('cache:clear');
    return "Cached";
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('admin/login');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', function () {
        return "Dashboard";
    })->middleware('auth');
});


// Route::middleware([CacheHeaders::class])->group(function () {
// Define your routes for serving static assets here






Route::get('/home', [HomeController::class, 'index'])->name('home');





Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::resource('aboutus', AboutUsController::class);
    Route::resource('welcome', WelcomeController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('quote', QuoteController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('video-testimonial', VideoTestimonialController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('photo-list', PhotoListController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('room-book', RoomBookController::class);
    Route::resource('course', CourseController::class);
    Route::resource('team-category', TeamCategoryController::class);
    Route::resource('our-team', OurTeamController::class);
    Route::resource('nara-member', NaraMemberController::class);
    Route::resource('blog', BlogController::class);
    Route::post('blog/upload-image', [BlogController::class, 'uploadImage'])
        ->name('admin.blog.uploadImage');
    Route::resource('blog-users', BlogUsersController::class);
    Route::resource('why-choose-us', WhyChooseUsController::class);
    Route::resource('why-come-to-pokhara', WhyComeToPokharaController::class);
    Route::resource('curriculam', CurriculamController::class);
    Route::resource('curriculam-category', CurriculamCategoryController::class);
    Route::resource('curriculam-list', CurriculamListController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('seo-meta', SeoMetaController::class);
    Route::resource('fee-category', FeeCategoryController::class);
    Route::resource('fee-list', FeeListController::class);
    Route::resource('feature', FeatureController::class);
    Route::resource('facilitie', FacilitieController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('all-page', AllPageController::class);
    Route::resource('retreat-page', RetreatPageController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('yoga-class', YogaClassController::class);

    // Menu custom routes
    Route::get('create-menu/{id}', [MenuController::class, 'createMenu']);
    Route::post('store-menu', [MenuController::class, 'storeMenu']);
    Route::post('destroy-menu/{id}', [MenuController::class, 'destroyMenu']);
    Route::get('edit-menu/{id}', [MenuController::class, 'editMenu']);
    Route::patch('edit-menu/{id}', [MenuController::class, 'updateMenu']);
    Route::post('/sub-menu-add', [MenuController::class, 'subMenuAdd']);
    Route::delete('/sub-menu-remove/{id}', [MenuController::class, 'subMenuRemove']);

    Route::get('/out-team/delete/{id}', [OurTeamController::class, 'delete']);

    Route::resource('bookings', BookingsController::class);
    Route::resource('referrals', ReferralsController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('qr', QrCodeController::class);

    // QR download
    Route::get('/download/{qr}', [QrCodeController::class, 'DownloadQR'])->name('download.qr');

    // Clear payment
    Route::get('clear-payment/{id}', [CustomerController::class, 'clearPayment'])->name('clear.payment');

    Route::get('customers/status/{id}', [CustomerController::class, 'status']);
    Route::get('bookings/status/{id}', [BookingsController::class, 'status']);
    Route::get('set_actual_price/{id}/{numberOfAttendants}', [BookingsController::class, 'set_actual_price']);

    // Referral settings
    Route::get('referral-setting', [ReferralSettingController::class, 'index'])->name('referral.setting');
    Route::post('referral-setting', [ReferralSettingController::class, 'setting'])->name('referral.setting');

    // Ad
    Route::resource('ad', AdController::class);

    // Highlight
    Route::resource('highlight', HighlightController::class);

    // Landing outcome
    Route::resource('outcome', LandingOutcomeController::class);

    // Key points
    Route::resource('keypoints', KeyPointsController::class);

    // Landing why choose us
    Route::resource('whychoose', LandingWhyChooseController::class);

    // Landing course
    Route::get('landing-course', [LandingCourseController::class, 'index'])->name('landing-course.index');
    Route::post('landing-course-post', [LandingCourseController::class, 'update'])->name('landing-course.update');
});

// this is front controller
Route::get('thank-you', [FrontController::class, 'thankYou'])->name('thankyou');

Route::get('/load-gallery', [FrontController::class, 'loadGallery'])->name('load-gallery');



Route::get('/',  [FrontController::class, 'index'])->name('front.index');
Route::get('/about-us', [FrontController::class,'aboutUs'])->name('front.about');
Route::get('/room', [FrontController::class, 'room']);
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('front.contact');
Route::post('/contact-us', [FrontController::class, 'contactUsPost'])->name('contact-us.post')->middleware('throttle:10,1');
Route::post('/check-book', [FrontController::class, 'checkBook']);
Route::post('/post-book', [FrontController::class, 'postBook']);
Route::get('/photo-list', [FrontController::class, 'photoList'])->name('front.photo-list');
Route::get('/single-post/{id}', [FrontController::class, 'singlePost']);
Route::get('/news-event', [FrontController::class, 'newsEvent']);
Route::get('/event', [FrontController::class, 'event']);
Route::get('/river-system', [FrontController::class, 'riverSystem']);
Route::get('/rafting-kayaking', [FrontController::class, 'raftingKayaking']);
Route::get('/our-team', [FrontController::class, 'ourTeam']);
Route::get('/our-team/{id}', [FrontController::class, 'ourTeamList']);
Route::get('/nara-member', [FrontController::class, 'naraMember']);
Route::get('/single-page/{slug}', [FrontController::class, 'singlePage'])->name('front.single-page');
Route::get('/single-course/{slug}', [FrontController::class, 'singleCourse']);
Route::get('/single-event/{slug}', [FrontController::class, 'singleEvent']);
Route::get('/single-blog/{slug}', [FrontController::class, 'singleBlog'])->name('blog.detail');
Route::get('/blog', [FrontController::class,'blogs'])->name('front.blog');
Route::get('/blog/author/{name}', [FrontController::class, 'blogUser'])->name('blog.author');
Route::get('/class/{slug}', [FrontController::class,'yogaClass'])->name('yoga-class.single-page');
Route::get('/popular-courses', [FrontController::class, 'popularCourse'])->name('popular-courses');
Route::get('faq', [FrontController::class, 'faq'])->name('front.faq');
Route::get('curriculam', [FrontController::class,'curriculam'])->name('front.curriculum');
Route::get('teacher/{id}', [FrontController::class, 'teacher'])->name('front.teacher-detail');
Route::get('teacher-all', [FrontController::class, 'teacherAll'])->name('front.teacher');
Route::get('training/{slug}', [FrontController::class, 'training'])->name('training.single-page');

Route::get('/single-page/privacy-policy', [FrontController::class, 'privacyPolicy'])->name('single-privacy-policy');
Route::get('our-testimonials', [FrontController::class, 'testimonial'])->name('front.testimonial');
Route::get('video-testimonials', [FrontController::class, 'videoTestimonial'])->name('front.video-testimonial');
Route::get('video-testimonials/{title}', [FrontController::class, 'videoTestimonialDetail'])->name('front.video-testimonial-detail');





//new login

// Route::get('customer-login', 'Front\LoginController@showForm')->name('customer.login');
// Route::post('customer-login', 'Front\LoginController@login')->name('customer.login');

Route::get('student-register', [RegisterController::class, 'showForm'])->name('customer.register');
Route::post('student-register', [RegisterController::class, 'signup'])->name('customer.register')->middleware('throttle:10,1');



Route::get('customer-activate/{id}', [RegisterController::class, 'activate'])->name('customer.activate');


Route::get('register_yoga/{token?}', [BookingController::class, 'register_yoga'])->name('booking');

Route::post('customer-booking', [BookingController::class, 'bookings'])->name('customer.booking');

// booking related routes

Route::get('set-price/{id}/{numberOfAttendants}', [BookingController::class, 'set_price']);



Route::get('get-package/{id}', [BookingController::class, 'getPackage']);


Route::get('set-price-discount/{id}/{numberOfAttendants}/{token}/{room_type}', [BookingController::class, 'discounted_price']);

Route::get('customer-booking-list', [BookingController::class, 'index'])->name('customer.booking.index');



Route::post('customer-booking/delete', [BookingController::class, 'delete'])->name('customer.booking.delete');


// token related routes

Route::get('refer-page', [BookingController::class, 'refer_page'])->name('customer.refer.page');

Route::get('generate_token', [BookingController::class, 'generate_token'])->name('generate.token');


Route::get('validate-token/{token}', [BookingController::class, 'validateToken']);





Route::get('admin/set-prices/{id}/{numberOfAttendants}', [BookingsController::class, 'set_price']);
Route::post('bookings', [FrontController::class, 'bookings']);
// Route::get('generate_token', [FrontController::class, 'generate_token']);
//Route::get('yoga_package/{token?}', [FrontController::class, 'yoga_package']);
//Route::post('yoga_package_bookings', [FrontController::class, 'yoga_package_bookings']);
Route::get('getReferralLink/{token?}', [FrontController::class, 'getReferralLink']);
Route::get('userprofile_dashboard', [FrontController::class, 'userprofile_dashboard']);



// landing page
Route::get('yoga-school-retreat-centre', [LandingPageController::class, 'landingPage']);


// payment
Route::get('student/pay', [CheckoutController::class, 'index'])->name('cyber.hosted.pay');
Route::post('confirm-pay', [CheckoutController::class, 'confirm'])->name('cyber.confirm.pay');
Route::post('payment-successful', [CheckoutController::class, 'paySuccessful'])->name('cyber.successful');


Route::middleware('customer')->group(function () {
    Route::group(['middleware' => 'prevent-back-history'], function () {
        Route::get('userprofile_dashboard', [FrontController::class, 'userprofile_dashboard']);
    });

    // Route::get('profile_page', [Front\FrontController::class, 'profile_page']);
});

//Route::get('register_yoga/{url}', [Front\FrontController::class, 'refer_link']);

Route::permanentRedirect('/https://pokharayogaschool.com/registration', '/https://www.pokharayogaschoolandretreatcenter.com/student-register');

// redirect all unavailable routes to 404
// Route::get('{uri}', function($uri)
// {
//     $id = request()->id;

//     if(preg_match('/', $uri) && isset($id)){
//         return Redirect::to('https://www.pokharayogaschoolandretreatcenter.com/'.$id);
//     }else{
//         abort(404);
//     }
// })->where('all', '.*');


// });
