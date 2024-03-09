<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\CommentController;

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

// Route::resource('contacts', ContactFormController::class);

Route::prefix('contacts') // 頭に contacts をつける
->middleware(['auth']) // 認証
->name('contacts.') // ルート名
->controller(ContactFormController::class) // コントローラ指定(laravel9から)
->group(function(){ // グループ化
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

// GET|HEAD        chirps ................ chirps.index › ChirpController@index
// POST            chirps ................ chirps.store › ChirpController@store
// GET|HEAD        chirps/create ....... chirps.create › ChirpController@create
// GET|HEAD        chirps/{chirp} .......... chirps.show › ChirpController@show
// PUT|PATCH       chirps/{chirp} ...... chirps.update › ChirpController@update
// DELETE          chirps/{chirp} .... chirps.destroy › ChirpController@destroy
// GET|HEAD        chirps/{chirp}/edit ..... chirps.edit › ChirpController@edit
Route::resource('chirps', ChirpController::class)->middleware(['auth']);

// GET|HEAD        comments ...................................................................... comments.index › CommentController@index
// POST            comments ...................................................................... comments.store › CommentController@store
// GET|HEAD        comments/create ............................................................. comments.create › CommentController@create
// GET|HEAD        comments/{comment} .............................................................. comments.show › CommentController@show
// PUT|PATCH       comments/{comment} .......................................................... comments.update › CommentController@update
// DELETE          comments/{comment} ........................................................ comments.destroy › CommentController@destroy
// GET|HEAD        comments/{comment}/edit ......................................................... comments.edit › CommentController@edit
// Route::resource('comments', CommentController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::post('/chirps/{chirp}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::get('/comments/{chirp}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
