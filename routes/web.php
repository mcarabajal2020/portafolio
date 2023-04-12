<?php

use App\Mail\TestMail;
use Illuminate\Mail\Mailable;
use App\Http\Controllers\mails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactFormController;

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
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/posts', 'App\Http\Controllers\HomeController@posts')->name('posts');
Route::get('/posts/{category}', [App\Http\Controllers\HomeController::class, 'postByCategory'])->name('posts.category');
Route::get('/post/{postId}', [App\Http\Controllers\HomeController::class, 'post'])->name('post');


//Route::get('/admin', function () {
 //   return view('admin');
//});

Route::get('/portafolio', 'App\Http\Controllers\PortfolioController@index');
Route::get('/categorias', 'App\Http\Controllers\CategoriesController@index');

route::get('/home', function(){
    return view('home');
})->middleware('auth');
Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
Route::post('/admin/categories/store', [\App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{categoryID}/update', [\App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{categoryID}/delete', [\App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

Route::get('/admin/posts', [\App\Http\Controllers\Admin\PostsController::class, 'index'])->name('admin.posts');
Route::post('/admin/posts/store', [\App\Http\Controllers\Admin\PostsController::class, 'store'])->name('admin.posts.store');
Route::post('/admin/posts/{postsId}/update', [\App\Http\Controllers\Admin\PostsController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{postsId}/delete', [\App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('admin.posts.delete');

Route::get('contact', [ContactFormController::class, 'form'])->name('contact.form');
Route::post('send-form', [ContactFormController::class, 'send'])->name('contact.send');


Route::post('/mail', [\App\Http\Controllers\mails::class, 'create'] )->name('mail');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'posts'])->name('home');
