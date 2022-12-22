<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
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

/*Route::get('/', function () {
    return view('layouts/frontend');
});*/

Route::get('/pauldb', function(){
    Artisan::call('migrate');
    return response()->json("Database migration successful");
});
Route::get('/pauldbfresh', function(){
    Artisan::call('migrate:fresh');
    return response()->json('Database migration is FRESH');
});
Route::get('/pauldbseed', function(){
    Artisan::call('db:seed');
    return response()->json('All tables have been seeded with base data');
});
Route::get('/paullink', function(){
    Artisan::call('storage:link');
    return response()->json('Symlink created successfully');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> ['auth']], function() {
   Route::resource('permissions', PermissionController::class);
   Route::resource('roles', RoleController::class);
   Route::resource('users', UserController::class);
   Route::resource('food', FoodController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);


});
