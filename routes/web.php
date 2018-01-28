<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/verify_email/{token}', 'Auth\RegisterController@verify');

Route::get('register', function(){
    return view('auth.register');
})->name('registerForm');

Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Logout
Route::any('/logout', function() { //TODO Не доделал
    Auth::logout();
    return redirect()->back();
})->name('logout');

// Contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');

Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index'])->name('home');

// Отправка электронной почты
//Route::post('send.simple.email','MailController@simplePHPEmail')->name('simplePHPEmail');
//Route::post('send.row.email','MailController@rowEmail')->name('rowEmail');
//Route::post('send.basic.email','MailController@basicEmail')->name('basicEmail');
//Route::post('send.html.email','MailController@htmlEmail')->name('htmlEmail');
//Route::post('send.attachment.email','MailController@attachmentEmail')->name('attachmentEmail');

