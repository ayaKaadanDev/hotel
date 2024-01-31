<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\IteamController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SecurityCardController;


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

Route::get('/', function () {
    // return view('tesssstingDashB');
    return view('welcome_page');
});

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('users',UserController::class);

Route::resource('rooms',RoomController::class);

Route::resource('reservation',ReservationController::class);

Route::resource('products',ProductController::class);

Route::resource('securitycards',SecurityCardController::class);

Route::resource('orders',OrderController::class);
Route::get('order/menu',[OrderController::class,'menu'])->name('orders.menu');
Route::get('order/message',[OrderController::class,'message'])->name('message');

Route::resource('invoices', InvoiceController::class);

// Route::resource('meals',MealController::class);
// Route::resource('orderrs',OrderrController::class);

Route::resource('iteams',IteamController::class);
Route::get('list/for/check',[IteamController::class,'listforcheck'])->name('list.for.check');
Route::post('iteam/selected',[IteamController::class,'checkboxHelper'])->name('iteam.selected');


Route::get('show/all/room/deleted',[RoomController::class,'showAllRoomDeleted'])->name('showAllRoomDeleted');
Route::get('get/this/room/deleted/{id}',[RoomController::class,'getThisRoomDeleted'])->name('getThisRoomDeleted');

Route::get('show/all/user/deleted',[UserController::class,'showAllUserDeleted'])->name('showAllUserDeleted');
Route::get('get/this/user/deleted/{id}',[UserController::class,'getThisUserDeleted'])->name('getThisUserDeleted');

Route::get('show/all/invoice/deleted',[InvoiceController::class,'showAllInvoiceDeleted'])->name('showAllInvoiceDeleted');
Route::get('get/this/invoice/deleted/{id}',[InvoiceController::class,'getThisInvoiceDeleted'])->name('getThisInvoiceDeleted');

Route::get('show/all/iteam/deleted',[IteamController::class,'showAllIteamDeleted'])->name('showAllIteamDeleted');
Route::get('get/this/iteam/deleted/{id}',[IteamController::class,'getThisIteamDeleted'])->name('getThisIteamDeleted');

Route::get('show/all/order/deleted',[OrderController::class,'showAllOrderDeleted'])->name('showAllOrderDeleted');
Route::get('get/this/order/deleted/{id}',[OrderController::class,'getThisOrderDeleted'])->name('getThisOrderDeleted');

Route::get('show/all/product/deleted',[ProductController::class,'showAllProductDeleted'])->name('showAllProductDeleted');
Route::get('get/this/product/deleted/{id}',[ProductController::class,'getThisProductDeleted'])->name('getThisProductDeleted');

Route::get('show/all/reservation/deleted',[ReservationController::class,'showAllReservationDeleted'])->name('showAllReservationDeleted');
Route::get('get/this/reservation/deleted/{id}',[ReservationController::class,'getThisReservationDeleted'])->name('getThisReservationDeleted');

Route::get('show/all/securityCard/deleted',[SecurityCardController::class,'showAllSecurityCardDeleted'])->name('showAllSecurityCardDeleted');
Route::get('get/this/securityCard/deleted/{id}',[SecurityCardController::class,'getThisSecurityCardDeleted'])->name('getThisSecurityCardDeleted');



Route::resource('employees',EmployeeController::class);
Route::get('show/all/employee/deleted',[EmployeeController::class,'showAllEmployeeDeleted'])->name('showAllEmployeeDeleted');
Route::get('get/this/employee/deleted/{id}',[EmployeeController::class,'getThisEmployeeDeleted'])->name('getThisEmployeeDeleted');

Route::resource('salaries',SalaryController::class);
Route::get('show/all/salary/deleted',[SalaryController::class,'showAllSalaryDeleted'])->name('showAllSalaryDeleted');
Route::get('get/this/salary/deleted/{id}',[SalaryController::class,'getThisSalaryDeleted'])->name('getThisSalaryDeleted');


Route::get('my/order/{id}',[IteamController::class,'my_order'])->name('my_order');
