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

// Logout
Route::any('/logout', function() { //TODO Не доделал
    Auth::logout();
    return redirect()->back();
})->name('logout');

// Contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');

// Отправка электронной почты
//Route::post('send.simple.email','MailController@simplePHPEmail')->name('simplePHPEmail');
//Route::post('send.row.email','MailController@rowEmail')->name('rowEmail');
//Route::post('send.basic.email','MailController@basicEmail')->name('basicEmail');
//Route::post('send.html.email','MailController@htmlEmail')->name('htmlEmail');
//Route::post('send.attachment.email','MailController@attachmentEmail')->name('attachmentEmail');

Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index'])->name('home');

//Route::get('replace_card', 'CardController@replaceCard')
//    ->name('replaceCard');
//Route::post('begin.game', 'CardController@replaceCardSubmit')
//    ->name('replaceCardSubmit');
//Route::get('battleground', 'CardController@battleGround')
//    ->name('battleGround');

Route::get('card.{id}', 'SiteController@show')->name('cardShow');
Route::get('card_set.{categoryId}', 'SiteController@showByCategory')->name('showByCategory');
Route::get('ability.{tagId}', 'SiteController@showByTag')->name('showByTag');

// ======== AdminPanel =========================
Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'user'], function() {

        Route::get('index', 'Admin\AdminUserController@index')->name('userIndex');
        Route::get('update.{id}', 'Admin\AdminUserController@edit')->name('userEdit');
        Route::post('update', 'Admin\AdminUserController@update')->name('userUpdate');
        Route::delete('delete.{id}', 'Admin\AdminUserController@destroy')->name('userDelete');
        Route::get('restore.{user}', 'Admin\AdminUserController@restore')->name('userRestore');
    });

//    Route::resource('file', 'Admin\AdminFileController', [
//        'only' => [
//            'store',
//            'update',
//            'destroy',
//        ],
//        [
//            'names' => [
//                'store' => 'file.store',
//                'update' => 'file.update',
//                'destroy' => 'file.destroy',
//            ]
//        ]
//    ]);
});

// ======== END AdminPanel =======================

// ======== MyExample =======================
// Route::post('registerX.{id?}', function() {

// 	$route = Route::current(); // new Route
// 	echo $route->getName; // покажет 'registerX'
// 	echo $route->getParameter('id', 25); // id, 25 - default
// 	print_r($route->parameters()); // покажет массив с параметрами

// })->name('registerX');

// php artisan make:controller PhotoController --resource --model=Photo
// Route::resource('/pages', 'PhotoController', [
// 'except'=> ['index', 'show'] // исключить методы: index, show
// ]); // CRUD (RESTfull: post, get, put, delete)

// Route::controller('/pages', 'NewController'); // methods: getShow, getIndex, postStore и др.

// uses ... as -> назначить имя,
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'card', 'middleware' => 'mymiddle:admin']); //admin - параметр
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'card'])->middleware(['mymiddle']);

// ============================================