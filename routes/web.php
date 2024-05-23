<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UploadController;


use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;



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


//==============================Forgot Password Routes=============================================================
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password-token/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('resetForm');
Route::post('reset-password-submit', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('submitData');



Route::get('/', function () {

    $user = Auth::user();

    $devices = Device::where('user_id', $user->id)->get();

    return view('devices', compact('devices'));


})->name('login.page')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {

    //=======================Subscription================================
    Route::get('/subs', [AdminController::class, 'subs'])->name('subs');

    //====================================User Side=========================================
    Route::get('/list_devices', [AdminController::class, 'list_devices'])->name('list_devices');
    Route::get('/device_details/{id}', [AdminController::class, 'device_details'])->name('device_details');
    Route::get('/add_device_page', [AdminController::class, 'add_device_page'])->name('add_device_page');
    Route::post('/add_device', [AdminController::class, 'add_device'])->name('add_device');
    Route::get('/edit_device/{id}', [AdminController::class, 'edit_device'])->name('edit_device');
    Route::post('device_update', [AdminController::class, 'device_update'])->name('device_update');
    Route::delete('device_delete', [AdminController::class, 'device_delete'])->name('device_delete');
    Route::get('delete_img/{id}', [AdminController::class, 'delete_img'])->name('delete_img');
    Route::get('delete_img_logo/{id}', [AdminController::class, 'delete_img_logo'])->name('delete_img_logo');
    Route::get('delete_vedio/{id}', [AdminController::class, 'delete_vedio'])->name('delete_vedio');


    Route::post('/change_status_disconnect', [AdminController::class, 'change_status_disconnect'])->name('change_status_disconnect');
    Route::post('/change_status_connect', [AdminController::class, 'change_status_connect'])->name('change_status_connect');

    Route::post('/upload', [UploadController::class, 'store'])->name('chunk.store');



;


});


Route::get('/dashboard', function () {

    $user = Auth::user();

    $devices = Device::where('user_id', $user->id)->get();

    return view('devices', compact('devices'));

 
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
