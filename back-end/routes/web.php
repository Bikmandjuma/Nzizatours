<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
})->name('home');

//forgot password route
Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
});

//test admin dashaboard
Route::get('/testadmin',function(){
	return view('user.home');
});

//staff member on homepage

Route::get('login','App\Http\Controllers\AuthController@GetLogin')->name('Login');
Route::post('Submit_login_data', 'App\Http\Controllers\AuthController@PostLogin')->name('LoginPost');
Route::post('logout', 'App\Http\Controllers\AuthController@Logout')->name('Logout');

//Admin routing
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('AdminDashboard');
	Route::get('information',[AdminController::class,'MyInformation'])->name('MyInfo');
	Route::post('Post_information',[AdminController::class,'Update_MyInfo'])->name('Post_MyInfo');
	Route::get('profile',[AdminController::class,'Profile'])->name('Profile');
	Route::post('Post_profile',[AdminController::class,'Post_Profile'])->name('Submit_Profile');
	Route::get('password',[AdminController::class,'Password'])->name('Password');
	Route::post('post_password',[AdminController::class,'Post_Password'])->name('Post_Password');
});