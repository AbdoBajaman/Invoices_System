<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerReportsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoiceReportsController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('HomePage',[HomeController::class,'index'])->name('homepage')->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        return redirect()->route('homepage');
    })->name('dashboard');
    Route::get('/logout', function (Request $request) {
        auth::guard('web')->logout();
        // echo 'under';
        Session::flush();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logoutt');
});
// Route::get('HomePage', function () {
//     return view('index');

// })->name('homepage');
// Route::get('invoices', [InvoicesController::class, 'index'])->name('invoices');
// Route::get('payed_invoices', [InvoicesController::class, 'payed_invoices'])->name('payed_invoices');
// Route::get('Due_invoices', [InvoicesController::class, 'Due_invoices'])->name('Due_invoices');
// Route::get('partially_paid_invoices', [InvoicesController::class, 'partially_paid_invoices'])->name('partially_paid_invoices');

Route::resource('sections', SectionsController::class)->middleware('auth');
Route::resource('products', ProductsController::class)->middleware('auth');
Route::get('invoices/export/', [InvoicesController::class, 'export']);

Route::resource('invoices', InvoicesController::class)->middleware('auth');
Route::resource('invoice_details',InvoicesDetailsController::class)->middleware('auth');
Route::resource('invoice_attachment',InvoicesAttachmentsController::class)->middleware('auth');
Route::resource('archives',InvoiceArchiveController::class)->middleware('auth');

Route::get('view_file/{invoice_number}/{file_name}',[InvoicesAttachmentsController::class,'OpenFile'])->name('invoice_attachment.view_file');
Route::get('DownloadFile/{invoice_number}/{file_name}',[InvoicesAttachmentsController::class,'DownloadFile'])->name('invoice_attachment.DownloadFile');


//reports_invoice

Route::get('invoice_report',[InvoiceReportsController::class,'index'])->name('invoice_report');

Route::post('Search_invoices',[InvoiceReportsController::class,'Search_invoices'])->name('Search_invoices');

Route::get('customer_report',[CustomerReportsController::class,'index'])->name('customer_report');
Route::get('search_customer',[CustomerReportsController::class,'search'])->name('search_customer');
// Route::post('Search_customer',[CustomerReportsController::class,'Search_customer'])->name('Search_customer');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');

// Route::get('Invoice/details',InvoicesController::class,'Show_Details');
// Route::resource('Invoices', InvoicesController::class)->names([
//     // 'index' => 'invoices',
//     // // 'payed_invoices'=>'payed_invoices',
//     // // 'Due_invoices'=>'Due_invoices',
//     // // 'partially_paid_invoices'=>'partially_paid_invoices',
//     // 'create' => 'invoices.create',
//     // 'store' => 'invoices.store',
//     // 'show' => 'invoices.show',
//     // 'edit' => 'invoices.edit',
//     // 'update' => 'invoices.update',
//     // 'destroy' => 'invoices.destroy',
// ]);

Route::controller(InvoicesController::class)->group(function () {


    Route::get('Invoices','index')->name('invoices');
    Route::get('payed_invoices','payed_invoices')->name('payed_invoices');
    Route::get('Due_invoices','Due_invoices')->name('Due_invoices');
    Route::get('partially_paid_invoices','partially_paid_invoices')->name('partially_paid_invoices');

    Route::get('section/{id}','Get_Products')->name('Section_product');

    Route::get('status_show/{id}','status_show')->name('status_show');

    Route::post('status_update/{id}','status_update')->name('status_update');
    Route::get('print_invoice/{id}','print_invoice')->name('print_invoice');
    // Route::get('users/export/', [UsersController::class, 'export']);
    // Route::get('invoices/export/','export')->name('export_Excel');




});


Route::get('/{page}', [AdminController::class,'index'])->name('index');
