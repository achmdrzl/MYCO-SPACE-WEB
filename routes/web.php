<?php

use App\Http\Controllers\Backoffice\LayananController;
use App\Http\Controllers\Backoffice\NotificationsController;
use App\Http\Controllers\Backoffice\RegistrationController;
use App\Http\Controllers\Backoffice\SettingsController;
use App\Http\Controllers\BackOffice\UsersController;
use App\Http\Controllers\FrontOffice\FrontOfficeController;
use App\Http\Controllers\ProfileController;
use App\Mail\MyMail;
use App\Models\Mc_Booking;
use App\Models\Mc_Company;
use App\Models\Mc_Member;
use App\Models\Mc_Notification;
use App\Models\Mc_Overtime;
use App\Models\Mc_Quota;
use App\Models\SysCodeSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// FRONT OFFICE
Route::get('/', function () {
    return view('frontoffice.homepage2');
});
Route::get('/homepage2', function () {
    return view('frontoffice.homepage2');
});

// SPACES ROUTES
Route::get('/myco-indragiri', FrontOfficeController::class . '@indragiriIndex')->name('indragiri.index');
Route::get('/myco-cw', FrontOfficeController::class . '@cwIndex')->name('cw.index');
Route::get('/myco-satoria', FrontOfficeController::class . '@satoriaIndex')->name('satoria.index');
Route::get('/myco-trilium', FrontOfficeController::class . '@triliumIndex')->name('trilium.index');

// OFFICES ROUTES
Route::get('/private-office', FrontOfficeController::class . '@privateOffice')->name('private.office');
Route::get('/manage-office', FrontOfficeController::class . '@manageOffice')->name('manage.office');
Route::get('/virtual-office', FrontOfficeController::class . '@virtualOffice')->name('virtual.office');
Route::get('/meeting-room', FrontOfficeController::class . '@meetingRoom')->name('meeting.room');

// COWORKING ROUTES
Route::get('/hot-desk', FrontOfficeController::class . '@hotDesk')->name('hot.desk');
Route::get('/dedicated-desk', FrontOfficeController::class . '@dedicatedDesk')->name('dedicated.desk');

// COMPANY ROUTES
Route::get('/blog-myco', FrontOfficeController::class . '@blogIndex')->name('blog.index');
Route::get('/trend-aplikasi-media-belajar-online', FrontOfficeController::class . '@blogDetailA')->name('blog.detail.a');
Route::get('/contact-myco', FrontOfficeController::class . '@contanctIndex')->name('contact.index');
Route::get('/about-myco', FrontOfficeController::class . '@aboutIndex')->name('about.index');

// SPACES
Route::get('/event-space', FrontOfficeController::class . '@eventIndex')->name('event.index');
Route::get('/podcast-room', FrontOfficeController::class . '@podcastIndex')->name('podcast.index');
Route::get('/studio-room', FrontOfficeController::class . '@studioIndex')->name('studio.index');

// PARTNERSHIP
Route::get('/partner-with-us', FrontOfficeController::class . '@partnershipIndex')->name('partnership.index');
Route::post('/partnership-store', FrontOfficeController::class . '@partnershipStore')->name('partnership.store');

Route::get('/check', function () {
    return view('backoffice.dashboard');
});

// ADD BOOKING FRONTOFFICE
Route::post('/add-booking', FrontOfficeController::class . '@AddBooking')->name('add.booking');


Route::get('/cekRelasi', function () {

    $query = Mc_Notification::select(
        'notification_id as id',
        'v_subject as subject',
        'v_location as locations',
        'v_spaces as spaces',
        'v_description as description',
        'mc_notifications.created_at as date',
        'mc_spaces.v_name as space',
        'mc_locations.v_name as location'
    )
        ->where('mc_notifications.b_status', 1)
        ->join('mc_spaces', 'mc_notifications.v_spaces', '=', 'mc_spaces.v_code')
        ->join('mc_locations', 'mc_notifications.v_location', '=', 'mc_locations.v_code')
        ->orderByDesc('mc_notifications.created_at')
        ->limit(5)
        ->get();


    return $query;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {

    // USER ROUTES
    Route::get('/userIndex', UsersController::class . '@userIndex')->name('user.index');
    Route::post('/userStore', UsersController::class . '@userStore')->name('user.store');
    Route::post('/userEdit', UsersController::class . '@userEdit')->name('user.edit');
    Route::post('/userDestroy', UsersController::class . '@userDestroy')->name('user.destroy');

    // LAYANAN ROUTES
    Route::get('/bookinglayanan', LayananController::class . '@bookingLayananIndex')->name('booking.layanan');
    Route::post('/bookingStore', LayananController::class . '@bookingStore')->name('booking.layanan.store');
    Route::post('/bookingedit', LayananController::class . '@bookingEdit')->name('booking.layanan.edit');
    Route::post('/bookingDestroy', LayananController::class . '@bookingDestroy')->name('booking.destroy');
    Route::post('/sortingBooking', LayananController::class . '@sortingBooking')->name('sorting.booking');
    
    Route::get('/overtime', LayananController::class . '@overtimeIndex')->name('overtime.index');
    Route::post('/overtimeStore', LayananController::class . '@overtimeStore')->name('overtime.store');
    Route::post('/overtimeEdit', LayananController::class . '@overtimeEdit')->name('overtime.edit');
    Route::post('/overtimeDestroy', LayananController::class . '@overtimeDestroy')->name('overtime.destroy');
    Route::post('/getCompany', LayananController::class. '@getCompany')->name('get.company');
    Route::post('/overtimeSorting', LayananController::class . '@overtimeSorting')->name('overtime.sorting');

    // REGISTRATION ROUTES
    Route::get('/company', RegistrationController::class. '@companyIndex')->name('company.index');
    Route::post('/companyStore', RegistrationController::class. '@companyStore')->name('company.store');
    Route::post('/companyEdit', RegistrationController::class. '@companyEdit')->name('company.edit');
    Route::post('/companyDestroy', RegistrationController::class. '@companyDestroy')->name('company.destroy');
    Route::post('/companySorting', RegistrationController::class. '@companySorting')->name('company.sorting');

    Route::get('/member', RegistrationController::class. '@memberIndex')->name('member.index');
    Route::post('/memberStore', RegistrationController::class. '@memberStore')->name('member.store');
    Route::post('/memberEdit', RegistrationController::class. '@memberEdit')->name('member.edit');
    Route::post('/memberDestroy', RegistrationController::class. '@memberDestroy')->name('member.destroy');
    Route::post('/memberSorting', RegistrationController::class. '@memberSorting')->name('member.sorting');
    
    Route::get('/non-member', RegistrationController::class. '@non_memberIndex')->name('non-member.index');
    Route::post('/non-memberStore', RegistrationController::class. '@non_memberStore')->name('non-member.store');
    Route::post('/non-memberEdit', RegistrationController::class. '@non_memberEdit')->name('non-member.edit');
    Route::post('/non-memberDestroy', RegistrationController::class. '@non_memberDestroy')->name('non-member.destroy');
    Route::post('/non-memberSorting', RegistrationController::class. '@non_memberSorting')->name('non-member.sorting');

    // SETTINGS ROUTE
    Route::get('/quotaMember', SettingsController::class . '@quotaMemberIndex')->name('quotaMember.index');
    Route::post('/quotaMemberStore', SettingsController::class . '@quotaMemberStore')->name('quotaMember.store');
    Route::post('/quotaMemberEdit', SettingsController::class . '@quotaMemberEdit')->name('quotaMember.edit');
    Route::post('/quotaMemberDestroy', SettingsController::class . '@quotaMemberDestroy')->name('quotaMember.destroy');

    // NOTIFICATIONS ROUTE
    Route::get('/notifications', NotificationsController::class . '@notificationsIndex')->name('notifications.index');
    Route::post('/navbarnotifications', NotificationsController::class . '@navbarNotifications')->name('navbar.notifications');



    Route::get('send-mail', function () {

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $emailAddress = 'ryp.peater@gmail.com';
        $bccEmail = 'indragiri@myco.space';
        $bccName = 'Indragiri - Admin';

        Mail::to($emailAddress)->send(new MyMail($details, $bccEmail, $bccName));

        return 'Test email sent successfully!';
    });
});


Route::get('/login2', FrontOfficeController::class . '@login2')->name('login2');

require __DIR__ . '/auth.php';
