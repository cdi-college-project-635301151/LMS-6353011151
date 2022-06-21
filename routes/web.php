<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookIsbnController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MaturityController;
use App\Http\Controllers\DocumentRecordsController;
use App\Http\Controllers\DocumentTypeController;
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
    'categories' => CategoriesController::class,
    'maturity' => MaturityController::class,
    'genre' => GenreController::class,
    'authors' => AuthorsController::class,
    'book-isbn' => BookIsbnController::class,
    'documents' => DocumentRecordsController::class,
    'documents-types' => DocumentTypeController::class,
]);
