<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExerciseController;


use App\Http\Controllers\WeatherController; 
use App\Http\Controllers\IfscController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\DashboardController2;
use App\Http\Controllers\BankVerifyController;


use App\Http\Controllers\ApyHubBankController;




use App\Http\Controllers\GuzzleExercisesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/




// 🌤️ Weather module
Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/get-weather', [WeatherController::class, 'getWeather'])->name('weather.get');

// 💳 Fintech dashboard + API verification
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/ifsc', [IfscController::class, 'index'])->name('ifsc.verify.form');
Route::post('/ifsc-verify', [IfscController::class, 'verify'])->name('ifsc.verify');



Route::get('/bank-verify', [BankVerifyController::class, 'index'])->name('bank.verify');
Route::post('/bank-verify', [BankVerifyController::class, 'verify'])->name('bank.verify');


Route::get('/apyhub-bank', [ApyHubBankController::class, 'index'])
    ->name('apyhub.bank.form');

Route::post('/apyhub-bank-verify', [ApyHubBankController::class, 'verify'])
    ->name('bank.verify.apy');











Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('exercises', ExerciseController::class);
});

Route::get('/dashboard-2',[DashboardController2::class ,'index'])->name('view-dashboard2');

Route::get('/exercises', [GuzzleExercisesController::class, 'index'])->name('exercises.index');
Route::get('/exercises/{exercise}', [GuzzleExercisesController::class, 'show'])->name('exercises.show');

