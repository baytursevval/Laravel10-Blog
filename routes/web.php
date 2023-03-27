<?php

use App\Http\Controllers\Admin\CommentController;
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
Route::get('/home3', function () {
    return view('home.blogdetay');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('login', [HomeController::class,'login'])->name('login');
Route::post('logincheck', [HomeController::class,'logincheck'])->name('logincheck');
Route::get('signup',[HomeController::class,'signup'])->name('signup');
Route::post('signupcheck',[HomeController::class,'signupcheck'])->name('signupcheck');
Route::get('logout', [HomeController::class,'logout'])->name('logout');

//category***********************

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::post('category/add', [CategoryController::class, 'add'])->name('category_add');
Route::post('category/create', [CategoryController::class, 'create'])->name('category_create');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category_update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category_delete');
Route::get('category/show', [CategoryController::class, 'show'])->name('admin_category_show');

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/add', [BlogController::class, 'create'])->name('blog_add');
Route::post('/update/{blogid}', [BlogController::class, 'update'])->name('blog_update');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog_store');
Route::get('/blog/delete/{blogid}', [BlogController::class, 'destroy'])->name('blog_delete');
Route::get('/blog/edit/{blogid}', [BlogController::class, 'edit'])->name('blog_edit');

Route::post('blogsearch', [HomeController::class,'blogsearch'])->name('blogsearch');

Route::get('blogdetay/{blog_id}', [HomeController::class, 'blogdetay'])->name('blogdetay');

Route::get('/mycomments', [CommentController::class, 'mycomments'])->name('mycomments');
Route::get('/delete/comments/{id}', [CommentController::class, 'delete'])->name('del_comment');
Route::get('/edit/comments/{id}', [CommentController::class, 'edit'])->name('edit_comment');
Route::post('/add/comment/{blog_id}', [CommentController::class, 'create'])->name('add_comment');



//ADMIN
Route::get('/admin',[HomeControllerAdmin::class,'index'])->name('admin_home')->middleware('auth');
Route::get('/admin/login',[HomeControllerAdmin::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeControllerAdmin::class,'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeControllerAdmin::class,'logout'])->name('admin_logout');

//Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/comments', [CommentController::class, 'index'])->name('admin_comment');
    Route::post('/comment/update/{id}', [CommentController::class, 'adminupdate'])->name('admin_comment_update');
    Route::get('delete/{id}', [CommentController::class, 'admindestroy'])->name('admin_comment_delete');
    Route::get('comment/edit/{id}', [CommentController::class, 'adminedit'])->name('admin_comment_edit');
    Route::get('show', [CommentController::class, 'adminshow'])->name('admin_comment_show');

//}); #admin



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
