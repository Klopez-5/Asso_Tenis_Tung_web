<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Role;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/re', function () {
    return view('re');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'HomeController@indexPost');
Route::get('/home/{id}', 'HomeController@show');

Route::resource('/registro', 'RegistroController', ['only' => ['create', 'store']]);

Route::get('/dashboard','AdminController@index');

Route::resource('/achievements','AchievementController');

Route::resource('/categories','CategoryController');

Route::resource('/clubs','ClubController');

Route::resource('/levels','LevelController');

Route::resource('/tournaments','TournamentsController');
Route::get('/tournaments/{tournament}/form','TournamentsController@form');
Route::patch('/tournaments/{tournament}/inscribir','TournamentsController@inscribir');

Route::resource('/relation','RelationController');

Route::resource('/roles','RoleController');

Route::resource('/permissions','PermissionController');

Route::resource('/users','UsersController');


Route::get('/test', function () {
    $user=User::find(1);
    Gate::authorize('haveaccess', 'role.index');
    return $user;
});
