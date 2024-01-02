<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
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

Route::prefix("/")->controller(HomeController::class)->group(function(){
    Route::get('/','home')->name("home");
    Route::get('/login','login_form')->name("login.form");
    Route::get('/signup','signup_form')->name("signup.form");
    Route::post('/login/verify','login')->name("login");
    Route::post('/signup/verify','signup')->name("signup");
});

Route::prefix('/dashboard')->middleware('is_customuser')->controller(DashboardController::class)->group(function(){

    Route::get("/",'home')->name("dashboard");
    // Route::get("/explore",'explore')->name("dashboard.explore");
    Route::get("/myskills",'myskills')->name("dashboard.myskills");
    Route::post("/createskill",'createSkill')->name("dashboard.createskill");
    Route::get("/skill/{id}",'skill')->name("dashboard.skill");

});
