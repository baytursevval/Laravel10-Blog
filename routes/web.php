<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeControllerAdmin;

use Illuminate\Support\Facades\Route;

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

Route::get('/home2', function () {
    return view('welcome');
});

Route::get('/',function (){
    return view('home.index');
});
Route::get('/',[HomeController::class,'index'])->name('home');

//category***********************

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/add', [CategoryController::class, 'add'])->name('category_add');
Route::post('category/create', [CategoryController::class, 'create'])->name('category_create');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category_update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category_delete');
Route::get('category/show', [CategoryController::class, 'show'])->name('admin_category_show');

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/add', [BlogController::class, 'create'])->name('blog_add');
Route::post('/update/{blogid}', [BlogController::class, 'update'])->name('blog_update');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog_store');
Route::get('/blog/delete/{filmid}', [BlogController::class, 'destroy'])->name('blog_delete');
Route::get('/blog/edit/{filmid}', [BlogController::class, 'edit'])->name('blog_edit');


//ADMIN
Route::get('/admin',[HomeControllerAdmin::class,'index'])->name('admin_home')->middleware('auth');
Route::get('/admin/login',[HomeControllerAdmin::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeControllerAdmin::class,'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeControllerAdmin::class,'logout'])->name('admin_logout');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
