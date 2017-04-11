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

Route::get('/', 'HomeController@index');
Route::get('/home', function()
{
    return redirect('/');
});

Route::get('/register/confirm/{token}', ["uses" =>"\\App\\Http\\Controllers\\Auth\\RegisterController@confirm", "as" => "token"]);

Route::group(['prefix' => 'account'], function ()
{
    Route::get('/', "AccountController@myAccount");
    Route::group(['prefix' => "update"], function ()
    {
        Route::get('/lang/{lang}', ["uses" => "AccountController@updateLang", "as" => "lang"]);
        Route::post('/avatar', "AccountController@updateAvatar");
    });
});

Route::group(['prefix' => 'user'], function()
{
    Route::get('/{id}', ['uses' => 'UsersController@profile', 'as' => 'id']);
});

/*
 * Search routes
 */

Route::group(['prefix' => 'search'], function()
{
    Route::get('/user', "SearchController@searchUser");
    Route::post('/user', "SearchController@searchUser");

    Route::get('/', "SearchController@searchView");
});