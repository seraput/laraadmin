<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\Service\Attribute\Required;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('pages/auth/login');
});

Route::get('/register', function () {
    return view('pages/auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// require __DIR__ . '\auth.php';

Route::controller(RoleController::class)->group(function () {
    Route::get('/routes', 'index');
});