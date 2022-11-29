<?php


use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TestController;

use App\Http\Controllers\PostGuzzleController;
// use App\Http\Controllers\UserController;





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


Route::middleware([
    'auth:sanctum',
    config ('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');



    Route::get('/users',[App\Http\Controllers\UserController::class, 'users.index']);
});
    Route::get('/users',[App\Http\Controllers\UserController::class, 'index']);
   // Route::get('send/email/view/{id}',[App\Http\Controllers\UserController::class, 'emailView'])->name('send.email.view');

    // all users
    Route::get('/send/mail/view/all', [UserController::class, 'emailViewAll'])->name('send.email.view.all');

    Route::post('/store/email/all', [UserController::class, 'storeAllUserEmail'])->name('store.alluser.email');

//single users
Route::post('/store/email/{id}', [UserController::class, 'storeSingleEmail'])->name('store.user.email');
Route::get('/send/mail/view/{id}', [UserController::class, 'emailView'])->name('send.email.view');


Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
Route::get('/users/update{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::delete('/delete', 'UserController@destroy')->name('delete');








Route::get('posts', [PostGuzzleController::class,'index']);
Route::get('posts/store', [PostGuzzleController::class, 'store']);



















































































    //Route::get('/users',[UserController::class,'index'])->name('users.index');
   // Route::get('/users', 'App\Http\Controllers\UserController@index');
   //Route::get('/users', 'UserController@index')->name('users.index');
    //Route::get('/users', [UserController::class, 'users']);

   //Route::get('/users', [UserController::class, 'index']);

   //Route::get('/users',[App\Http\Controllers\TestController::class, 'index']);
   //Route::get('/test',['App\Http\Controllers\TestController::class@limo']);
