<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerAuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EnquiryMailController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function()  
{
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signup', function () {   return view('admin.auth.signup'); })->name('admin_signup');
        Route::post('/signup',[AuthController::class, 'signup']);
        Route::get('/', function () {   return view('admin.auth.login'); })->name('admin_login');
        Route::post('/login',[AuthController::class, 'login'])->name('admin_login_post');
    });
    Route::group(['middleware' => ['auth', 'role:admin']], function(){
        Route::get('/logout',[AuthController::class, 'logout'])->name('admin_logout');

        Route::resource('product', ProductController::class);
        Route::post('/product/status_active',[ProductController::class, 'statusActive']);
        Route::post('/product/status_inactive',[ProductController::class, 'statusInactive']);
        Route::get('enquiries',[ProductController::class, 'enquiries'])->name('enquiries');
        Route::get('customers',[ProductController::class, 'customers'])->name('customers');
    });
    
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/signup', function () {   return view('auth.signup'); })->name('signup');
    Route::post('/signup',[CustomerAuthController::class, 'signup']);
    Route::get('/login', function () {   return view('auth.login'); })->name('login');
    Route::post('/login',[CustomerAuthController::class, 'login']);
});
Route::group(['middleware' => ['auth', 'role:customer']], function(){
    Route::get('/logout',[CustomerAuthController::class, 'logout'])->name('logout');

    Route::get('enquiry/{id}',[HomeController::class, 'enquiry'])->name('enquiry');
    Route::post('send_enquiry',[HomeController::class, 'sendEnquiry'])->name('send_enquiry');
});