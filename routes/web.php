<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::middleware(['user'])->group(function () {
    // Common user routes (both buyers and sellers)
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/', 'HomeController@index')
    ->name('home')
    ->middleware('inertia');


    // ...

    
});

Route::middleware(['auth', 'seller'])->group(function () {
    // Define your seller-specific routes here
    Route::get('/seller-dashboard', 'SellerController@dashboard');
    Route::get('/seller-products', 'SellerController@products');
    // Add more routes as needed
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
