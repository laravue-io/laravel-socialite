<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LinkedinController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GithubController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

/** Gihtub OAuth routes */
Route::get('/auth/github/redirect', [GithubController::class, 'handleGithubRedirect']);
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback']);
