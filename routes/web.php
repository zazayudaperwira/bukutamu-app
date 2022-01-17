<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KepuasanController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\MediaController;
// use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;
// use App\Models\Medias;
// use App\Models\Category;
// use App\Models\User;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'defaultAdmin']);

    Route::get('/delete', [AdminController::class, 'defaultAdmin']);
    Route::post('/delete', [AdminController::class, 'delete']);

    Route::get('/update', [AdminController::class, 'defaultUpdate']);
    Route::post('/update', [AdminController::class, 'update']);

    Route::post('/register', [AdminController::class, 'store']);

    Route::get('/admin/checkoutall', [AdminController::class, 'defaultCheckout']);
    Route::post('/admin/checkoutall', [AdminController::class, 'autocheckout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('index', ["title" => "Home"]);
    });

    Route::get('/guestbook', [GuestController::class, 'defaultGuest']);
    Route::post('/guestbook', [GuestController::class, 'send']);

    Route::post('/', [KepuasanController::class, 'send']);
    Route::get('/tamu/update', [KepuasanController::class, 'defaultKepuasan']);

    Route::get('/tamu', [TamuController::class, 'defaultTamu']);
    Route::get('/tamu/update', [TamuController::class, 'defaultUpdate']);
    Route::post('/tamu/update', [TamuController::class, 'update']);
});

// Route::get('/register', [RegisterController::class, 'defaultRegister']);

// Route::get('/', [KepuasanController::class, 'defaultKepuasan']);

// Route::get('/messaging', [MessageController::class, 'defaultMessage']);

// Route::get('/media', [MediaController::class, "defaultMedia"]);
// Route::get('/media/{media_id:media_linker}', [MediaController::class, "showMedia"]);

// Route::get('/login', [LoginController::class, 'defaultIndex']);
// Route::post('/login', [LoginController::class, 'login']);

// Route::get('/tag', function () {
//     return view('tag', [
//         'title' => 'Post Tags List',
//         'tag' => Category::all()
//     ]);
// });
