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

Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['login' => false]);
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['as' => 'web.'], function () {
    Route::get('/', 'Web\HomeController@index')->name('index');
    Route::get('/provider/{id}', 'Web\ProviderController@index')->name('provider');
    Route::get('/result/{category?}/{city?}', 'Web\ResultController@index')->name('result');
    Route::get('/opinions/{id}', 'Web\OpinionsController@index')->name('opinions');
    Route::get('/opinions/{id}/add', 'Web\OpinionsController@add')->name('opinions.add');
    Route::post('/opinions/{id}/add/store', 'Web\OpinionsController@addStore')->name('opinions.add.store');
    Route::get('/about', function () { $bodyClass = ''; return view('web.about', compact('bodyClass')); })->name('about');

    Route::get('/about-provider', function () { $bodyClass = ''; return view('web.about-provider', compact('bodyClass')); })->name('about-provider');

    Route::get('/signup-client', 'Web\UserController@signUpOperator')->name('signup-client');
    Route::post('/signup-client/store', 'Web\UserController@signUpOperatorStore')->name('signup-client.store');

    Route::get('/signup-provider', 'Web\UserController@signUpProvider')->name('signup-provider');
    Route::post('/signup-provider/store', 'Web\UserController@signUpProviderStore')->name('signup-provider.store');

    Route::post('/user/login', 'Web\UserController@login')->name('user.login');
    Route::get('/user/logout', 'Web\UserController@logout')->name('user.logout');

    Route::post('/user/note/get', 'Web\UserController@noteGet')->name('user.note.get');
    Route::post('/user/note/store', 'Web\UserController@noteStore')->name('user.note.store');

    Route::post('/user/message/store', 'Web\UserController@messageStore')->name('user.message.store');

    Route::get('/profile', 'Web\UserController@profile')->name('user.profile');
    Route::get('/profile/edit', 'Web\UserController@profileEdit')->name('user.profile.edit');
    Route::post('/profile/update', 'Web\UserController@profileUpdate')->name('user.profile.update');

    Route::get('/search/provider', 'Web\SearcherController@provider')->name('search.provider');

    Route::get('/provider-dashboard', 'Web\ProviderController@dashboard')->name('provider-dashboard');
    Route::get('/provider-showcase', 'Web\ProviderController@showcase')->name('provider-showcase');
    Route::post('/provider-showcase/update', 'Web\ProviderController@showcaseUpdate')->name('provider-showcase.update');
    //Route::get('/signup-provider', function () { return view('web.signup-provider'); })->name('signup-provider');


    Route::get('/inbox', 'Web\InboxController@index')->name('inbox');
    Route::get('/inbox/{id}', 'Web\InboxController@messageGet')->name('inbox.get');
    Route::post('/inbox/{id}/store', 'Web\InboxController@messageStore')->name('inbox.store');
});

Auth::routes();
