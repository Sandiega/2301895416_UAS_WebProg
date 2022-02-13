<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/user_register', [App\Http\Controllers\PageController::class, 'input']);

Route::post('/user_login', [App\Http\Controllers\PageController::class, 'check_user_login']);

Route::get('/register',function() {
    return view('auth.register');
});

Route::get('/login',function() {
    return view('auth.login');
});

Route::post('/logout', [App\Http\Controllers\PageController::class, 'user_logout']);

Route::get('/home', [App\Http\Controllers\PageController::class, 'show_ebook'])->middleware('guestlock');

Route::get('/home/{lang}', [App\Http\Controllers\PageController::class, 'show_ebook2'])->middleware('guestlock');

Route::get('/ebookdetail/{id}', [App\Http\Controllers\PageController::class, 'ebook_detail'])->middleware('guestlock');

Route::get('/ebookdetail/{id}/{lang}', [App\Http\Controllers\PageController::class, 'ebook_detail2'])->middleware('guestlock');

Route::get('/rentbook/{id}', [App\Http\Controllers\PageController::class, 'rent_book'])->middleware('guestlock');

Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->middleware('guestlock');

Route::get('/cart/{lang}', [App\Http\Controllers\PageController::class, 'cart2'])->middleware('guestlock');

Route::get('/orderdelete/{id}', [App\Http\Controllers\PageController::class, 'delete_order']);

Route::get('/submitorder', [App\Http\Controllers\PageController::class, 'submitorder'])->middleware('guestlock');

Route::get('/profile', [App\Http\Controllers\PageController::class, 'profile'])->middleware('guestlock');

Route::get('/profile/{lang}', [App\Http\Controllers\PageController::class, 'profile2'])->middleware('guestlock');

Route::post('/save', [App\Http\Controllers\PageController::class, 'save']);

Route::get('/allAccount', [App\Http\Controllers\PageController::class, 'manageacc'])->middleware('guestlock','userlock');

Route::get('/allAccount/{lang}', [App\Http\Controllers\PageController::class, 'manageacc2'])->middleware('guestlock','userlock');

Route::get('/manage/delete/{id}', [App\Http\Controllers\PageController::class, 'deleteacc']);

Route::get('/manage/updaterole/{id}', [App\Http\Controllers\PageController::class, 'updaterole'])->middleware('guestlock');

Route::post('/updatedrole', [App\Http\Controllers\PageController::class, 'updatedrole']);

Route::get('/success',function() {
    return view('success');
});



