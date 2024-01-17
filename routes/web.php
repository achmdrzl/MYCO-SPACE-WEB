<?php

use App\Http\Controllers\Backoffice\LayananController;
use App\Http\Controllers\BackOffice\UsersController;
use App\Http\Controllers\FrontOffice\FrontOfficeController;
use App\Http\Controllers\ProfileController;
use App\Mail\MyMail;
use App\Models\Mc_Booking;
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
    // GET SYSTEM SETTING FOR UNIQUR CODE EACH TABLE
    $sys = SysCodeSetting::where('v_table', 'mc_booking')->first();

    // GET LAST ID
    $lastBooking = Mc_Booking::latest()->first();
    $lastId = ($lastBooking) ? $lastBooking->booking_id : 0;

    // Increment the last ID to get a new ID
    $newId = $lastId + 1;

    // Format Code
    $bookingCode = $sys->v_code . $sys->v_separator . date($sys->v_dateformat) . $sys->v_separator . sprintf("%0{$sys->i_digit}d", $newId);

    return $bookingCode;
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
