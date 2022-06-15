<?php

use App\Http\Controllers\BookAuthorsController;
use App\Http\Controllers\BookIsbnController;
use App\Http\Controllers\BooksCategoriesController;
use App\Http\Controllers\BooksGenreController;
use App\Http\Controllers\BooksMaturityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\SystemUsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();
Route::resources([
    'home' => HomeController::class,
    'members' => MembersController::class,
    'sys-users' => SystemUsersController::class,
    'categories' => BooksCategoriesController::class,
    'maturity' => BooksMaturityController::class,
    'genre' => BooksGenreController::class,
    'authors' => BookAuthorsController::class,
    'book-isbn' => BookIsbnController::class,
]);
