<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
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

/*お問い合わせ入力*/
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/confirm', function () {
    return redirect()->route('contact.index');
});
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

/*お問い合わせ確認*/
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

/*完了*/
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

/*管理*/
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/contacts/{id}', [AdminController::class, 'destroy'])->name('admin.contacts.destroy');


/*ログイン*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

/*登録*/
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');