<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

//login route
Route::get('/login','App\Http\Controllers\AuthController@GetLogin')->name('Login');

//Post login
Route::get('/Post-Login','App\Http\Controllers\AuthController@PostLogin')->name('PostLoginForm');

//forgot password route
Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
});

//User routing
Route::group(['prefix' => 'user','middleware' => 'userauth'], function () {
    Route::get('/home','App\Http\Controllers\UserController@dashboard')->name('UserDashboard');
});