<?php

use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

//Auth::routes(['register' => false]);


Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

    Route::get('/home', 'HomeController@index');

    Route::get('profile','UserController@profile')->name('profile');

    Route::post('update_avatar', 'UserController@update_avatar');


    Route::resource('invoices', 'InvoicesController');

    Route::resource('InvoiceAttachments', 'InvoicesAttachmentsController');

    Route::resource('sections', 'SectionsController');

    Route::resource('products', 'ProductsController');


    Route::get('/section/{id}', 'InvoicesController@getproducts');

    Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');

    Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');

    Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');

    Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

    Route::get('/edit_invoice/{id}', 'InvoicesController@edit');

    Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');

    Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

    Route::resource('Archive', 'InvoiceAchiveControllre');


    Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');

    Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');

    Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

    Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');

    Route::get('export_invoices', 'InvoicesController@export');



Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

});

    Route::get('invoices_report', 'Invoices_ReportController@index');

    Route::post('Search_invoices', 'Invoices_ReportController@Search_invoices');

    Route::get('customers_report', 'Customers_ReportController@index')->name("customers_report");

    Route::post('Search_customers', 'Customers_ReportController@Search_customers')->name('Search_customers');

    Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

    Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');

    Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');

    Route::get('/{page}', 'AdminController@index');


});


