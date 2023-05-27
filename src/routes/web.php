<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('main.index');
});

Route::get('/products/{city}/{category}', [\App\Http\Controllers\BusinessController::class, 'search']);
Route::get('/products/{city}', [\App\Http\Controllers\BusinessController::class, 'searchCity']);

Route::get('/register', [\App\Http\Controllers\UserController::class, 'customerregiter']);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'customerstore']);


Route::get('/login', [\App\Http\Controllers\UserController::class, 'Login'])->name('login');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'authenticate']);
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);

Route::get('/restaurant/{business}', [\App\Http\Controllers\BusinessController::class, 'singlebusiness']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');




// Admin Routes
Route::group(['middleware' => ['auth','roleVerify:Admin']], function () {
    Route::get('/admin/home', [\App\Http\Controllers\UserController::class, 'adminHome']);
    Route::get('/admin/register', [\App\Http\Controllers\UserController::class, 'adminRegsiter']);
    Route::post('/admin/register', [\App\Http\Controllers\UserController::class, 'adminStore']);
    Route::get('/admin/manageadmins', [\App\Http\Controllers\UserController::class, 'manageAdmins']);
    Route::get('/admin/categories', [\App\Http\Controllers\CategoriesController::class, 'index']);
    Route::get('/admin/addcategory', [\App\Http\Controllers\CategoriesController::class, 'add']);
    Route::post('/admin/categories', [\App\Http\Controllers\CategoriesController::class, 'store']);
    Route::get('/admin/editcategory/{category}', [\App\Http\Controllers\CategoriesController::class, 'edit']);
    Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoriesController::class, 'update']);
    Route::get('/admin/orders', [\App\Http\Controllers\BillController::class, 'allorders']);
    Route::get('/admin/business', [\App\Http\Controllers\UserController::class, 'allbusiness']);

});



// Business Routes

Route::group(['middleware' => ['auth','roleVerify:Business']], function () {
    Route::get('/business/home', [\App\Http\Controllers\UserController::class, 'businessHome']);
    Route::get('business/managedishes', [\App\Http\Controllers\UserController::class, 'businessDishes']);
    Route::get('business/dishes', [\App\Http\Controllers\DishesController::class, 'addDish']);
    Route::post('business/dishes', [\App\Http\Controllers\DishesController::class, 'storeDish']);
    Route::put('business/dishes/{dsh}', [\App\Http\Controllers\DishesController::class, 'updateDish']);
    Route::get('business/editdishes/{dsh}', [\App\Http\Controllers\DishesController::class, 'editdsh']);
    Route::get('/business/orders', [\App\Http\Controllers\BillController::class, 'businessOrders']);
    Route::get('/business/manage', [\App\Http\Controllers\BusinessController::class, 'businessmanage']);
    Route::post('/business/manage', [\App\Http\Controllers\BusinessController::class, 'businessmanagestore']);




});

Route::get('business', [\App\Http\Controllers\UserController::class, 'businessRegister']);
Route::post('/business', [\App\Http\Controllers\UserController::class, 'businessStore']);



// Customer Routes

Route::get('/checkout', [\App\Http\Controllers\UserController::class, 'checkout'])->middleware(['checkoutPath','roleVerify:Customer']);
Route::post('/checkout', [\App\Http\Controllers\UserController::class, 'checkoutstore'])->middleware(['checkoutPath','roleVerify:Customer']);
Route::group(['middleware' => ['auth','roleVerify:Customer']], function () {
    Route::get('/customer/home', [\App\Http\Controllers\UserController::class, 'customerHome']);
    Route::get('/customer/orders', [\App\Http\Controllers\BillController::class, 'customerorders']);


});



Route::get('/orders/details/{bid}', [\App\Http\Controllers\BillController::class, 'billdetails']);
Route::get('/orders/status/{bd}', [\App\Http\Controllers\BillController::class, 'updateStatus']);
Route::post('/orders/statusupdate/{bd}', [\App\Http\Controllers\BillController::class, 'updateStatusstore']);
