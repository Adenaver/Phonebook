<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Phonebook\PhonebookController;
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
$phonebookcfg = [
    'namespace' => 'App\Http\Controllers\Phonebook\Admin',
    'prefix' => 'admin',
];
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PhonebookController::class, 'getPhonebook'])->name('home');
Route::get('/search', [PhonebookController::class, 'getSearchPhonebook'])->name('search');
//Route::resource('phonebook','PhonebookController');
Route::group($phonebookcfg, function(){
    Route::resource('phonebook','PhonebookControllerAdmin');
});

