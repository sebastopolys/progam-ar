<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\IntralogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ExpoPageController;
use App\Http\Controllers\PositionsPageController;

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

Auth::routes();
Route::get('/', [PagesController::class, 'index']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [PagesController::class, 'index']);
Route::get('/info', [PagesController::class, 'info']);

Route::get('/expo', [ExpoPageController::class, 'expo'])->name('expo');
Route::get('/position/{expopost}', [PositionsPageController::class, 'positions'])->name('positions');
Route::get('/proyects/{expopost}', [PositionsPageController::class, 'positions'])->name('positions');






Route::get('user/{name}', [PagesController::class, 'show'])->where(['name'=>'[A-Za-z]+'])->name('user');

Route::get('user/{name}/settings', [PagesController::class, 'settings'])->where(['name'=>'[A-Za-z]+'])->name('settings');
Route::post('/user/*/settings', [PagesController::class, 'store'])->name('store');

//Route::post('logout', [UserController::class, 'logout'])->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







admin('456723u78k89985t3t');
function admin($hash){
    Route::get('/intralog_dash317/'.$hash,[IntralogController::class, 'index'])->name('index');
    Route::post('/intralog_dash317/'.$hash,[IntralogController::class, 'storeops'])->name('intralog_hash');
}
   

//intralog_dash317/456723u78k89985t3t

 


  




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
