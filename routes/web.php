<?php

use App\Http\Controllers\Backoffice\KeuanganController;
use App\Http\Controllers\Backoffice\LayananController;
use App\Http\Controllers\Backoffice\NotificationsController;
use App\Http\Controllers\Backoffice\RegistrationController;
use App\Http\Controllers\Backoffice\SettingsController;
use App\Http\Controllers\BackOffice\UsersController;
use App\Http\Controllers\FrontOffice\FrontOfficeController;
use App\Http\Controllers\ProfileController;
use App\Mail\MyMail;
use App\Models\Mc_Booking;
use App\Models\Mc_Booking_Facility;
use App\Models\Mc_Company;
use App\Models\Mc_Invoice;
use App\Models\Mc_InvoiceDetail;
use App\Models\Mc_Member;
use App\Models\Mc_Notification;
use App\Models\Mc_Overtime;
use App\Models\Mc_Quota;
use App\Models\SysCodeSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    $invoice = Mc_Invoice::select(
        'mc_invoices.invoice_id',
        'mc_invoices.v_code as code',
        'mc_invoices.fk_invoiceutama as fk_invoiceutama',
        'mc_invoices.fk_booking as booking_id',
        'mc_invoices.fk_memberpic as member_id',
        'mc_invoices.v_location as location',
        'mc_invoices.v_title as title',
        'mc_invoices.v_name as name',
        'mc_invoices.v_email as email',
        'mc_invoices.v_email2 as email2',
        'mc_invoices.v_email3 as email3',
        'mc_invoices.v_email4 as email4',
        'mc_invoices.v_email5 as email5',
        'mc_invoices.v_phone as phone',
        'mc_invoices.v_address as address',
        'mc_invoices.i_subtotal as subtotal',
        'mc_invoices.i_tax as tax',
        'mc_invoices.i_discount as discount',
        'mc_invoices.i_total as total',
        'mc_invoices.i_dp as dp',
        'mc_invoices.v_paymenttype as payment_type',
        'mc_invoices.v_proof as proof',
        'mc_invoices.b_renewal as renewal_status',
        'mc_invoices.b_hasdeposit as has_deposit',
        'mc_invoices.b_deposit as deposit_status',
        'mc_invoices.b_overtime as overtime_status',
        'mc_invoices.b_ispaid as paid_status',
        'mc_invoices.b_confirmed as confirmed_status',
        'mc_invoices.created_at as created_date',
        'mc_invoices.dt_due as due_date',
        'mc_invoices.dt_paid as paid_date',
        'mc_invoices.v_notes as notes',
        'mc_company.company_id'
    )
        ->leftJoin('mc_members', 'mc_invoices.fk_memberpic', '=', 'mc_members.member_id')
        ->leftJoin('mc_company', 'mc_members.fk_company', '=', 'mc_company.company_id')
        ->join('mc_bookings', function ($join) {
            $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')
            ->where('mc_bookings.b_status', '=', 1);
        })
        ->where('mc_invoices.b_status', '=', 1)
        ->where('mc_invoices.invoice_id', '=', 546)
        ->where('mc_invoices.b_deposit', '=', 0)
        ->where('mc_invoices.b_overtime', '=', 0)
        ->first();

    return $invoice;

    // Check if the invoice exists
    $result = Mc_Invoice::select('mc_invoices.invoice_id', /* ... other fields ... */)
        ->where('mc_invoices.b_status', '=', 1)
        ->where('mc_invoices.invoice_id', '=', 546)
        ->where('mc_invoices.b_deposit', '=', 0)
        ->where('mc_invoices.b_overtime', '=', 0)
        ->first();

    if ($result) {
        $returnData["invoice"]["header"] = $result->toArray();
        $invoiceId = $result->invoice_id;

        // Get Invoice Deposit
        $depositResult = Mc_Invoice::select('mc_invoices.i_total as deposit')
        ->where('mc_invoices.b_status', '=', 1)
        ->where('mc_invoices.fk_invoiceutama', '=', 546)
            ->where('mc_invoices.b_deposit', '=', 0)
            ->where('mc_invoices.b_overtime', '=', 0)
            ->first();

        $returnData["invoice"]["header"]["deposit"] = $depositResult ? $depositResult->deposit : 0;

        // Get Invoice Detail
        $detailResult = Mc_InvoiceDetail::select('mc_invoice_details.invoicedetail_id', 'mc_invoice_details.v_spaces as spaces', 'mc_invoice_details.i_qty as qty', 'mc_invoice_details.i_unit as unit_qty', 'mc_invoice_details.v_unit as unit', 'mc_invoice_details.v_periode as periode', 'mc_invoice_details.i_amount as amount', 'mc_invoice_details.i_discount as discount', 'mc_invoice_details.i_subtotal as subtotal', 'mc_invoice_details.v_notes as notes')
        ->where('mc_invoice_details.b_status', '=', 1)
        ->where('mc_invoice_details.fk_invoice', '=', $invoiceId)
            ->get();

        $returnData["invoice"]["detail"] = $detailResult->toArray();
    }

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
    
    Route::get('/bookingFasilitas', LayananController::class . '@bookingFasilitasIndex')->name('bookingFasilitas.index');
    Route::post('/bookingFasilitasStore', LayananController::class . '@bookingFasilitasStore')->name('bookingFasilitas.store');
    Route::post('/bookingFasilitasEdit', LayananController::class . '@bookingFasilitasEdit')->name('bookingFasilitas.edit');
    Route::post('/bookingFasilitasDestroy', LayananController::class . '@bookingFasilitasDestroy')->name('bookingFasilitas.destroy');
    Route::post('/getCompanySpaces', LayananController::class. '@getSpaces_Company')->name('get.company.spaces');
    Route::post('/bookingFasilitasSorting', LayananController::class . '@bookingFasilitasSorting')->name('bookingFasilitas.sorting');

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
    
    Route::get('/nonmember', RegistrationController::class. '@non_memberIndex')->name('nonmember.index');
    Route::post('/nonmemberStore', RegistrationController::class. '@non_memberStore')->name('nonmember.store');
    Route::post('/nonmemberEdit', RegistrationController::class. '@non_memberEdit')->name('nonmember.edit');
    Route::post('/nonmemberDestroy', RegistrationController::class. '@non_memberDestroy')->name('nonmember.destroy');
    Route::post('/nonmemberSorting', RegistrationController::class. '@non_memberSorting')->name('nonmember.sorting');

    // KEUANGAN ROUTES
    Route::get('/invoicelayanan', KeuanganController::class . '@invoicelayananIndex')->name('invoicelayanan.index');
    Route::post('/invoicelayananStore', KeuanganController::class . '@invoicelayananStore')->name('invoicelayanan.store');
    Route::post('/invoicelayananEdit', KeuanganController::class . '@invoicelayananEdit')->name('invoicelayanan.edit');
    Route::post('/invoicelayananDestroy', KeuanganController::class . '@invoicelayananDestroy')->name('invoicelayanan.destroy');
    Route::post('/invoicelayananSorting', KeuanganController::class . '@invoicelayananSorting')->name('invoicelayanan.sorting');
    Route::post('/getPriceSpace', KeuanganController::class. '@getSpaces')->name('get.price.space');

    Route::get('/invoicedeposit', KeuanganController::class . '@invoicedepositIndex')->name('invoicedeposit.index');
    Route::post('/invoicedepositStore', KeuanganController::class . '@invoicedepositStore')->name('invoicedeposit.store');
    Route::post('/invoicedepositEdit', KeuanganController::class . '@invoicedepositEdit')->name('invoicedeposit.edit');
    Route::post('/invoicedepositDestroy', KeuanganController::class . '@invoicedepositDestroy')->name('invoicedeposit.destroy');
    Route::post('/invoicedepositSorting', KeuanganController::class . '@invoicedepositSorting')->name('invoicedeposit.sorting');
    Route::post('/getInvoice', KeuanganController::class. '@getInvoice')->name('get.invoice.deposit');

    Route::get('/invoiceovertime', KeuanganController::class . '@invoiceovertimeIndex')->name('invoiceovertime.index');
    Route::post('/invoiceovertimeStore', KeuanganController::class . '@invoiceovertimeStore')->name('invoiceovertime.store');
    Route::post('/invoiceovertimeEdit', KeuanganController::class . '@invoiceovertimeEdit')->name('invoiceovertime.edit');
    Route::post('/invoiceovertimeDestroy', KeuanganController::class . '@invoiceovertimeDestroy')->name('invoiceovertime.destroy');
    Route::post('/invoiceovertimeSorting', KeuanganController::class . '@invoiceovertimeSorting')->name('invoiceovertime.sorting');


    // SETTINGS ROUTES
    Route::get('/quotaMember', SettingsController::class . '@quotaMemberIndex')->name('quotaMember.index');
    Route::post('/quotaMemberStore', SettingsController::class . '@quotaMemberStore')->name('quotaMember.store');
    Route::post('/quotaMemberEdit', SettingsController::class . '@quotaMemberEdit')->name('quotaMember.edit');
    Route::post('/quotaMemberDestroy', SettingsController::class . '@quotaMemberDestroy')->name('quotaMember.destroy');

    // NOTIFICATIONS ROUTES
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
