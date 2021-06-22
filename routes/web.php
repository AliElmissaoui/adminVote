<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\QuestionComponennt;
use App\Http\Controllers\voteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\AdminAuthController;

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
});


 Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('user', UserController::class);
    Route::resource('permission', 'PermissionController');


    Route::get('/profile', [UserController::class,'profile'])->name('user.profile');

    Route::post('/profile', [UserController::class,'postProfile'])->name('user.postProfile');

    Route::get('/password/change', [UserController::class,'getPassword'])->name('userGetPassword');

    Route::post('/password/change', [UserController::class,'postPassword'])->name('userPostPassword');

 });


Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', 'RoleController');



});
Auth::routes();
Route::get('admin/Login',[AdminAuthController::class,'getLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class,'postLogin'])->name('adminLoginPost');
Route::post('admin/logout',[AdminAuthController::class,'logout'])->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
    Route::get('vote/{id}',QuestionComponennt::class);
	// Admin Dashboard
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('home', [AdminController::class,'dashboard1'])->name('admin.home');
    Route::resource('user', UserController::class);
    Route::post('votecreate', [voteController::class,'store'])->name('vote.store');
    Route::get('vote', [voteController::class,'index'])->name('vote.index');
    Route::get('voteshow', [voteController::class,'show'])->name('vote.show');
    Route::get('profile', [AdminController::class,'profile'])->name('user.profile');
    Route::post('profile', [AdminController::class,'postProfile'])->name('user.postProfile');
    Route::get('password/change', [AdminController::class,'getPassword'])->name('userGetPassword');
    Route::post('password/change', [AdminController::class,'postPassword'])->name('userPostPassword');
    Route::get('Notifications', [AdminController::class,'getuserstatus'])->name('user.status');
    //Route::get('vote/{id}', [App\Http\Controllers\QuestionController::class,'index'])->name('question.index');
    // Route::get('vote/{id}', [App\Http\Controllers\voteController::class,'showvote'])->name('question.showvote');
    // Route::get('vote/{id}', [App\Http\Controllers\QuestionController::class,'showvquestion'])->name('question.showvote');
    Route::post('createQuetion', [QuestionController::class,'storequestion'])->name('question.store');
    Route::get('change-status', [AdminController::class,'changeStatus'])->name('admin.change');
    route::get('createQuetion',[QuestionController::class,'index'])->name('admin.question');




});










//////////////////////////////// axios request
Route::get('/getAllUsers', [UserController::class,'getAll']);
Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");
//Route::get("/getAllUsers", "UserController@getAll");
Route::get("/getAllRoles", "RoleController@getAll");
Route::get("/getAllPermissions", "PermissionController@getAll");

/////////////axios create user
Route::post('/account/create',[UserController::class,'store']);
Route::put('/account/update/{id}', [UserController::class,'update']);
Route::delete('/delete/user/{id}', [UserController::class,'delete']);
Route::get('/search/user', [UserController::class,'search']);
