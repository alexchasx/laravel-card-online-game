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
Route::post('send.simple.email','MailController@simplePHPEmail')->name('simplePHPEmail');
Route::post('send.row.email','MailController@rowEmail')->name('rowEmail');
Route::post('send.basic.email','MailController@basicEmail')->name('basicEmail');
Route::post('send.html.email','MailController@htmlEmail')->name('htmlEmail');
Route::post('send.attachment.email','MailController@attachmentEmail')->name('attachmentEmail');

// Articles
Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index']);
Route::get('article.{id}', 'SiteController@show')->name('articleShow');
Route::get('category.{categoryId}', 'SiteController@showByCategory')->name('showByCategory');
Route::get('tag.{tagId}', 'SiteController@showByTag')->name('showByTag');

// Comments
Route::get('comment.index', 'CommentController@index')->name('commentIndex');
Route::get('comment.{id}', 'CommentController@show')->name('commentShow');
Route::post('comment.create', 'CommentController@store')->name('commentStore');
Route::post('comment.update', 'CommentController@update')->name('commentUpdate');
Route::delete('delete.{comment}', 'CommentController@delete')->name('commentDelete');
Route::get('restore.{comment}', 'CommentController@restore')->name('commentRestore');
Route::get('comment.status.{comment}', 'CommentController@statusChange')->name('commentStatusChange');

// ======== AdminPanel =========================
Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'article'], function() {
// Route::group(['prefix' => 'admin/article', 'middleware' => ['auth', 'admin']], function () {

        Route::get('index', 'Admin\AdminArticleController@index')->name('adminIndex');
        Route::post('create', 'Admin\AdminArticleController@store')->name('articleStore');
        Route::get('create', 'Admin\AdminArticleController@create')->name('articleCreate');
        Route::get('update.{id}', 'Admin\AdminArticleController@edit')->name('articleEdit');
        Route::post('update', 'Admin\AdminArticleController@update')->name('articleUpdate');
        Route::delete('destroy.{id}', 'Admin\AdminArticleController@destroy')->name('articleDelete');
        Route::delete('delete.{article}.{tag}', 'Admin\AdminArticleController@deleteTag')->name('articleTagDelete');
        Route::get('restore.{article}', 'Admin\AdminArticleController@restore')->name('articleRestore');
        Route::get('status.{article}', 'Admin\AdminArticleController@statusChange')->name('articleStatusChange');
    });

    Route::group(['prefix' => 'user'], function() {

        Route::get('index', 'Admin\AdminUserController@index')->name('userIndex');
        Route::get('update.{id}', 'Admin\AdminUserController@edit')->name('userEdit');
        Route::post('update', 'Admin\AdminUserController@update')->name('userUpdate');
        Route::delete('delete.{id}', 'Admin\AdminUserController@destroy')->name('userDelete');
        Route::get('restore.{user}', 'Admin\AdminUserController@restore')->name('userRestore');
    });

    Route::group(['prefix' => 'tag'], function() {

        Route::get('index', 'Admin\AdminTagController@index')->name('tagIndex');
        Route::post('create', 'Admin\AdminTagController@store')->name('tagStore');
        Route::get('create', 'Admin\AdminTagController@create')->name('tagCreate');
        Route::get('update.{id}', 'Admin\AdminTagController@edit')->name('tagEdit');
        Route::any('update', 'Admin\AdminTagController@update')->name('tagUpdate');
        Route::delete('delete.{id}', 'Admin\AdminTagController@destroy')->name('tagDelete');
        Route::get('restore.{tag}', 'Admin\AdminTagController@restore')
            ->name('tagRestore');
        Route::get('status.{tag}', 'Admin\AdminTagController@statusChange')
            ->name('tagStatusChange');
    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('index', 'Admin\AdminCategoryController@index')->name('categoryIndex');
        Route::post('create', 'Admin\AdminCategoryController@store')->name('categoryStore');
        Route::get('create', 'Admin\AdminCategoryController@create')->name('categoryCreate');
        Route::get('update.{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');
        Route::any('update', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
        Route::delete('category.{category}', 'Admin\AdminCategoryController@destroy')
            ->name('categoryDelete');
        Route::get('category.restore.{category}', 'Admin\AdminCategoryController@restore')
            ->name('categoryRestore');
        Route::get('status.{category}', 'Admin\AdminCategoryController@statusChange')
            ->name('categoryStatusChange');
    });

    Route::resource('file', 'Admin\AdminFileController', [
        'only' => [
            'store',
            'update',
            'destroy',
        ],
        [
            'names' => [
                'store' => 'file.store',
                'update' => 'file.update',
                'destroy' => 'file.destroy',
            ]
        ]
    ]);
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
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'article', 'middleware' => 'mymiddle:admin']); //admin - параметр
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'article'])->middleware(['mymiddle']);

// ============================================