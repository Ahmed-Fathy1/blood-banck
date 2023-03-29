<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\GovernorateController;
use App\Http\Controllers\Dash\CityController;
use App\Http\Controllers\Dash\PostController;
use App\Http\Controllers\Dash\ClientController;
use App\Http\Controllers\Dash\CategoryController;
use App\Http\Controllers\Dash\DonationController;
use App\Http\Controllers\Dash\SettingController;
use App\Http\Controllers\Dash\ContactController;
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

// ['register' => false]
Auth::routes();

// Admin Panal
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('governorates',GovernorateController::class);
Route::resource('cities',CityController::class);
Route::resource('clients',ClientController::class);
Route::get('clients-activate/{id}', [ClientController::class, 'activate'])->name('clients.activate');
Route::get('clients-deactivate/{id}',[ClientController::class, 'deactivate'] )->name('clients.deactivate');
Route::resource('posts',PostController::class);
Route::resource('categories',CategoryController::class);
Route::resource('donations',DonationController::class);
Route::resource('settings',SettingController::class);
Route::resource('contacts',ContactController::class);
/////////////////////////////////////////////////////////////////////////////////


