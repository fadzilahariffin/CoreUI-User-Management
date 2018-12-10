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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('login', 'LoginController@Acclogin');

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/sample', function () {
    return view('samples');
});

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * These routes require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('dashboard');
    // Route::resource('access/permission', 'Access\\PermissionController');
    // Route::resource('access/role', 'Access\\RoleController');
    // Route::resource('access/user', 'Access\\UserController');

    Route::prefix('access')->group(function () {

        //User Management
        Route::get('user', 'Access\UserController@index')->name('user.index');

        Route::get('user/create', 'Access\UserController@create')->name('user.create');

        Route::post('user', 'Access\UserController@store')->name('user.save');

        Route::get('user/{id}', 'Access\UserController@show')->name('user.show');

        Route::get('user/{id}/edit', 'Access\UserController@edit')->name('user.edit');

        Route::patch('user/{id}', 'Access\UserController@update')->name('user.update');

        Route::get('user/{id}/delete', 'Access\UserController@destroy')->name('user.delete');

        Route::get('user/{id}/deactivate', 'Access\UserController@deactivate');

        Route::get('user/{id}/reactivate', 'Access\UserController@reactivate');

        Route::get('user/{id}/password', 'Access\UserController@password')->name('user.password.change');

        Route::patch('users/change/{id}', 'Access\UserController@resetPassword');

        //Role Management
        Route::get('role', 'Access\RoleController@index')->name('role.index');

        Route::get('role/create', 'Access\RoleController@create')->name('role.create');

        Route::post('role', 'Access\RoleController@store')->name('role.save');

        Route::get('role/{id}', 'Access\RoleController@show')->name('role.show');

        Route::get('role/{id}/edit', 'Access\RoleController@edit')->name('role.edit');

        Route::patch('role/{id}', 'Access\RoleController@update')->name('role.update');

        Route::get('role/{id}/delete', 'Access\RoleController@destroy')->name('role.delete');

        //Permission Management
        Route::get('permission', 'Access\PermissionController@index')->name('permission.index');

        Route::get('permission/create', 'Access\PermissionController@create')->name('permission.create');

        Route::post('permission', 'Access\PermissionController@store')->name('permission.save');

        Route::get('permission/{id}', 'Access\PermissionController@show')->name('permission.show');

        Route::get('permission/{id}/edit', 'Access\PermissionController@edit')->name('permission.edit');

        Route::patch('permission/{id}', 'Access\PermissionController@update')->name('permission.update');

        Route::get('permission/{id}/delete', 'Access\PermissionController@destroy')->name('permission.delete');

    });

    Route::get('profile', 'ProfileController@index')->name('profile.index');

    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');

    Route::patch('profile/{id}', 'ProfileController@update')->name('profile.update');

    //View Template
    Route::view('/sample/dashboard', 'samples.dashboard');
    Route::view('/sample/buttons', 'samples.buttons');
    Route::view('/sample/social', 'samples.social');
    Route::view('/sample/cards', 'samples.cards');
    Route::view('/sample/forms', 'samples.forms');
    Route::view('/sample/modals', 'samples.modals');
    Route::view('/sample/switches', 'samples.switches');
    Route::view('/sample/tables', 'samples.tables');
    Route::view('/sample/tabs', 'samples.tabs');
    Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
    Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
    Route::view('/sample/widgets', 'samples.widgets');
    Route::view('/sample/charts', 'samples.charts');

    Route::view('/sample/error404', 'errors.404')->name('error404');
    Route::view('/sample/error500', 'errors.500')->name('error500');

    Route::view('/page/login', 'pages.login');
    Route::view('/page/register', 'pages.register');

});

/*
 * These routes require no user to be logged in
 */
Route::group(['middleware' => 'guest'], function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login.main');

    Route::post('login', 'Auth\LoginController@login')->name('login.post');

});

Auth::routes();

// Route::get('access/user', 'UserController@index');
// Route::get('access/user/{id}', 'UserController@show');
// Route::get('access/user', 'UserController@create');
// Route::post('access/user', 'UserController@store');
// Route::get('access/user/{id}/edit', 'UserController@edit');
// Route::put('access/user/{id}', 'UserController@update');
// Route::get('access/user/{id}/delete', 'UserController@destroy');

// Route::controller('datatables', 'Access\UserController', [
//                 'getIndex'  => 'datatables.data',
//             ]);
