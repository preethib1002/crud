<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
//Route::get('/', function () {

 //   return view('welcome');
//});

Route::get('/', function () {

    return view('contact_form');
});

Route::post('/send',[MailController::class,"sendContactMail"])->name('send.contact_mail');
Route::resource('/contacts', ContactController::class);

Route::middleware(['auth', 'isAdmin'])->group(function () {
   Route::get('/admin', function () {

      return view('contacts.index');

    });

  });

Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);






Route::post('api/fetch-states', [ContactController::class, 'fetchState']);
Route::post('api/fetch-cities', [ContactController::class, 'fetchCity']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/admin', 'AdminController@index')->name('admin');
/*Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/contact', ContactController::class);
})*/
/*
Route::get('/contacts', function () {
  return view('contacts.index');
})->name('dashboard');*/
