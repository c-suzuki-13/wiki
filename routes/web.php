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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth:web')->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/information')->name('information.')->group(function () {
        Route::get('/add', 'InformationController@showAdd')->name('show.add');
        Route::post('/add', 'InformationController@add')->name('add');
        Route::get('/edit/{information_id}', 'InformationController@showEdit')->name('show.edit')->where('information_id', '\d+');
        Route::post('/edit/{information_id}', 'InformationController@edit')->name('edit')->where('information_id', '\d+');
        Route::post('/delete/{information_id}', 'InformationController@delete')->name('delete')->where('information_id', '\d+');
    });

    Route::prefix('/word')->name('word.')->group(function () {
        Route::get('/add', 'WordController@showAdd')->name('show.add');
        Route::post('/add', 'WordController@add')->name('add');
        Route::get('/edit/{word_id}', 'WordController@showEdit')->name('show.edit')->where('word_id', '\d+');
        Route::post('/edit/{word_id}', 'WordController@edit')->name('edit')->where('word_id', '\d+');
        Route::get('/{word_id}', 'WordController@detail')->name('detail')->where('user_id', '\d+')->where('word_id', '\d+');
        Route::post('/add/comment/{word_id}', 'WordController@addComment')->name('add.comment');
        Route::get('/search', 'WordController@search')->name('search');
        Route::post('/delete/{word_id}', 'WordController@delete')->name('delete')->where('word_id', '\d+');
    });
    
    Route::prefix('/member')->name('member.')->group(function () {
        Route::get('/', 'MemberController@showMember')->name('member');
        Route::get('/{user_id}', 'MemberController@detail')->name('detail')->where('user_id', '\d+');
    });

});


