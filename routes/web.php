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
})->middleware('lang');
Route::post('/user_register', [App\Http\Controllers\PageController::class, 'input']);

Route::post('/user_login', [App\Http\Controllers\PageController::class, 'check_user_login']);

Route::get('/register',function() {
    return view('auth.register');
})->middleware('lang');

Route::get('/login',function() {
    return view('auth.login');
})->middleware('lang');

Route::post('/logout', [App\Http\Controllers\PageController::class, 'user_logout']);

Route::get('/home', [App\Http\Controllers\PageController::class, 'show_ebook'])->middleware('guestlock','lang');

Route::get('/ebookdetail/{id}', [App\Http\Controllers\PageController::class, 'ebook_detail'])->middleware('guestlock','lang');

Route::get('/rentbook/{id}', [App\Http\Controllers\PageController::class, 'rent_book'])->middleware('guestlock','lang');

Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->middleware('guestlock','lang');

Route::get('/orderdelete/{id}', [App\Http\Controllers\PageController::class, 'delete_order','lang']);

Route::get('/submitorder', [App\Http\Controllers\PageController::class, 'submitorder'])->middleware('guestlock','lang');

Route::get('/profile', [App\Http\Controllers\PageController::class, 'profile'])->middleware('guestlock','lang');

Route::post('/save', [App\Http\Controllers\PageController::class, 'save'])->middleware('lang');

Route::get('/allAccount', [App\Http\Controllers\PageController::class, 'manageacc'])->middleware('guestlock','userlock','lang');

Route::get('/manage/delete/{id}', [App\Http\Controllers\PageController::class, 'deleteacc']);

Route::get('/manage/updaterole/{id}', [App\Http\Controllers\PageController::class, 'updaterole'])->middleware('guestlock','lang');

Route::post('/updatedrole', [App\Http\Controllers\PageController::class, 'updatedrole']);

Route::get('/success',function() {
    return view('success');
});

Route::get('/setlocale/{lang}', [App\Http\Controllers\PageController::class, 'change_lang']);


