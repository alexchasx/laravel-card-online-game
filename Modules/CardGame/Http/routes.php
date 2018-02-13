<?php

use Illuminate\Support\Facades\Route;

Route::get('replace_card', 'CardController@replaceCard')
    ->name('replaceCard');
Route::post('begin.game', 'CardController@replaceCardSubmit')
    ->name('replaceCardSubmit');
Route::get('battleground', 'CardController@battleGround')
    ->name('battleGround');

Route::group([
    'middleware' => ['web'],
    'namespace' => 'Modules\CardGame\Http\Controllers'
], function() {
    Route::get('battle.start', 'BattleController@start')->name('start');
});

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => 'cardgame',
    'namespace' => 'Modules\CardGame\Http\Controllers',
], function() {
    Route::get('/', 'CardGameController@index')->name('cardGameIndex');

    Route::group(['prefix' => 'card'], function() {
        Route::get('index', 'CardController@index')->name('cardIndex');
        Route::get('create', 'CardController@create')->name('cardCreate');
        Route::post('create', 'CardController@store')->name('cardStore');
        Route::get('edit.{id}', 'CardController@edit')->name('cardEdit');
        Route::post('update', 'CardController@update')->name('cardUpdate');
        Route::delete('destroy.{id}', 'CardController@destroy')->name('cardDelete');
        Route::get('restore.{card}', 'CardController@restore')->name('cardRestore');
        Route::delete('force_destroy.{id}', 'CardController@forceDestroy')
            ->name('cardForceDelete');
    });

    Route::group(['prefix' => 'card_set'], function() {
        Route::get('index', 'CardSetController@index')->name('cardSetIndex');
        Route::post('create', 'CardSetController@store')->name('cardSetStore');
        Route::get('create', 'CardSetController@create')->name('cardSetCreate');
        Route::get('update.{id}', 'CardSetController@edit')->name('cardSetEdit');
        Route::any('update', 'CardSetController@update')->name('cardSetUpdate');
        Route::delete('destroy.{card_set}', 'CardSetController@destroy')
            ->name('cardSetDelete');
        Route::get('restore.{card_set}', 'CardSetController@restore')
            ->name('cardSetRestore');
        Route::delete('force_destroy.{id}', 'CardSetController@forceDestroy')
            ->name('cardSetForceDelete');
    });

    Route::group(['prefix' => 'race'], function() {
        Route::get('index', 'RaceController@index')->name('raceIndex');
        Route::post('create', 'RaceController@store')->name('raceStore');
        Route::get('create', 'RaceController@create')->name('raceCreate');
        Route::get('update.{id}', 'RaceController@edit')->name('raceEdit');
        Route::any('update', 'RaceController@update')->name('raceUpdate');
        Route::delete('destroy.{race}', 'RaceController@destroy')
            ->name('raceDelete');
        Route::get('restore.{race}', 'RaceController@restore')
            ->name('raceRestore');
        Route::delete('force_destroy.{id}', 'RaceController@forceDestroy')
            ->name('raceForceDelete');
    });

    Route::group(['prefix' => 'rank'], function() {
        Route::get('index', 'RankController@index')->name('rankIndex');
        Route::post('create', 'RankController@store')->name('rankStore');
        Route::get('create', 'RankController@create')->name('rankCreate');
        Route::get('update.{id}', 'RankController@edit')->name('rankEdit');
        Route::any('update', 'RankController@update')->name('rankUpdate');
        Route::delete('destroy.{rank}', 'RankController@destroy')
            ->name('rankDelete');
        Route::get('restore.{rank}', 'RankController@restore')
            ->name('rankRestore');
        Route::delete('force_destroy.{id}', 'RankController@forceDestroy')
            ->name('rankForceDelete');
    });

    Route::group(['prefix' => 'ability'], function() {
        Route::post('create', 'AbilityController@store')->name('abilityStore');
        Route::get('edit.{id}', 'AbilityController@edit')->name('abilityEdit');
        Route::any('update', 'AbilityController@update')->name('abilityUpdate');
        Route::delete('destroy.{id}', 'AbilityController@destroy')->name('abilityDelete');
        Route::delete('force_destroy.{id}', 'AbilityController@forceDestroy')
            ->name('abilityForceDelete');
        Route::get('restore.{ability}', 'AbilityController@restore')
            ->name('abilityRestore');
    });

    Route::group(['prefix' => 'avatar'], function() {
        Route::get('index', 'AvatarController@index')->name('avatarIndex');
        Route::post('create', 'AvatarController@store')->name('avatarStore');
        Route::get('edit.{id}', 'AvatarController@edit')->name('avatarEdit');
        Route::any('update', 'AvatarController@update')->name('avatarUpdate');
        Route::delete('destroy.{id}', 'AvatarController@destroy')->name('avatarDelete');
        Route::delete('force_destroy.{id}', 'AvatarController@forceDestroy')
            ->name('avatarForceDelete');
        Route::get('restore.{avatar}', 'AvatarController@restore')
            ->name('avatarRestore');
    });

    Route::group(['prefix' => 'achievement'], function() {
        Route::get('index', 'AchievementController@index')->name('achievementIndex');
        Route::post('create', 'AchievementController@store')->name('achievementStore');
        Route::get('edit.{id}', 'AchievementController@edit')->name('achievementEdit');
        Route::any('update', 'AchievementController@update')->name('achievementUpdate');
        Route::delete('destroy.{id}', 'AchievementController@destroy')->name('achievementDelete');
        Route::delete('force_destroy.{id}', 'AchievementController@forceDestroy')
            ->name('achievementForceDelete');
        Route::get('restore.{achievement}', 'AchievementController@restore')
            ->name('achievementRestore');
    });
//    Route::resource('achievement', 'AchievementController', [
//        'only' => [
//            'index',
//            'store',
//            'edit',
//            'update',
//            'destroy',
//        ],
//        [
//            'names' => [
//                'index' => 'achievementIndex',
//                'store' => 'achievementStore',
//                'edit' => 'achievementEdit',
//                'update' => 'achievementUpdate',
//                'destroy' => 'achievementDelete',
//            ]
//        ]
//    ]);
//    Route::get('achievement/{name}', function($name) {
//        return view('errors.404');
//    })->where('name', '(.)*');
});
