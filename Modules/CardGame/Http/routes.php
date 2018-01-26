<?php

use Illuminate\Support\Facades\Route;

Route::get('replace_card', 'CardController@replaceCard')
    ->name('replaceCard');
Route::post('begin.game', 'CardController@replaceCardSubmit')
    ->name('replaceCardSubmit');
Route::get('battleground', 'CardController@battleGround')
    ->name('battleGround');

Route::group([
    'middleware' => 'web',
    'prefix' => 'cardgame',
    'namespace' => 'Modules\CardGame\Http\Controllers'
], function() {
    Route::get('/', 'CardGameController@index');

    Route::group(['prefix' => 'card'], function() {
// Route::group(['prefix' => 'card', 'middleware' => ['auth', 'admin']], function () {

        Route::get('index', 'CardController@index')->name('cardIndex');
        Route::get('create', 'CardController@create')->name('cardCreate');
        Route::post('create', 'CardController@store')->name('cardStore');
        Route::get('update.{id}', 'CardController@edit')->name('cardEdit');
        Route::post('update', 'CardController@update')->name('cardUpdate');
        Route::delete('destroy.{id}', 'CardController@destroy')->name('cardDelete');
        Route::delete('force_destroy.{id}', 'CardController@forceDestroy')
            ->name('cardForceDelete');
        Route::delete('delete.{card}.{ability}', 'CardController@deleteTag')
            ->name('cardTagDelete');
        Route::get('restore.{card}', 'CardController@restore')->name('cardRestore');
    });

    Route::group(['prefix' => 'card_set'], function() {
        Route::get('index', 'CardSetController@index')->name('cardSetIndex');
        Route::post('create', 'CardSetController@store')->name('cardSetStore');
        Route::get('create', 'CardSetController@create')->name('cardSetCreate');
        Route::get('update.{id}', 'CardSetController@edit')->name('cardSetEdit');
        Route::any('update', 'CardSetController@update')->name('cardSetUpdate');
        Route::delete('card_set.{card_set}', 'CardSetController@destroy')
            ->name('cardSetDelete');
        Route::get('card_set.restore.{card_set}', 'CardSetController@restore')
            ->name('cardSetRestore');
    });

    Route::group(['prefix' => 'race'], function() {
        Route::get('index', 'RaceController@index')->name('raceIndex');
        Route::post('create', 'RaceController@store')->name('raceStore');
    });

    Route::group(['prefix' => 'ability'], function() {
        Route::get('index', 'AbilityController@index')->name('abilityIndex');
        Route::post('create', 'AbilityController@store')->name('abilityStore');
        Route::post('update', 'AbilityController@update')->name('abilityUpdate');
        Route::delete('delete.{id}', 'AbilityController@destroy')->name('abilityDelete');
        Route::delete('force_destroy.{id}', 'AbilityController@forceDestroy')
            ->name('abilityForceDelete');
        Route::get('restore.{ability}', 'AbilityController@restore')
            ->name('abilityRestore');
    });
});
