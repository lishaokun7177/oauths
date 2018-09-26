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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/oauth',function() {
	$query = http_build_query([
        'client_id' => '4',
        'redirect_uri' => 'http://www.passportclient.com/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://www.passportdev.com/oauth/authorize?'.$query);
});

Route::get('/callback','AuthController@getcode');