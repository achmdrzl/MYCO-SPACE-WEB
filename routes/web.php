<?php

use App\Http\Controllers\Backoffice\LayananController;
use App\Http\Controllers\BackOffice\UsersController;
use App\Http\Controllers\FrontOffice\FrontOfficeController;
use App\Http\Controllers\ProfileController;
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
Route::get('/blog-detail-myco', FrontOfficeController::class . '@blogDetail')->name('blog.detail');
Route::get('/contact-myco', FrontOfficeController::class . '@contanctIndex')->name('contact.index');
Route::get('/about-myco', FrontOfficeController::class . '@aboutIndex')->name('about.index');

// SPACES
Route::get('/event-space', FrontOfficeController::class . '@eventIndex')->name('event.index');
Route::get('/podcast-room', FrontOfficeController::class . '@podcastIndex')->name('podcast.index');
Route::get('/studio-room', FrontOfficeController::class . '@studioIndex')->name('studio.index');

Route::get('/check', function () {
    return view('backoffice.dashboard');
});

// USER ROUTES
Route::get('/userIndex', UsersController::class . '@userIndex')->name('user.index');
Route::post('/userStore', UsersController::class . '@userStore')->name('user.store');
Route::post('/userEdit', UsersController::class . '@userEdit')->name('user.edit');
Route::post('/userDestroy', UsersController::class . '@userDestroy')->name('user.destroy');

// LAYANAN ROUTES
Route::get('/bookingLayanan', LayananController::class . '@bookingLayanan')->name('booking.layanan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login2', FrontOfficeController::class . '@login2')->name('login2');

require __DIR__ . '/auth.php';
