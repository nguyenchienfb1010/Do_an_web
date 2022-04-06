<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController as WebLoginController;
use App\Models\Category;

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


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginAdmin'])->name('admin.login.store');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
   
    Route::prefix('admin')->group(function () {
        Route::get('/main', [MainController::class, 'index'])->name('admin.main');    
        Route::prefix('category')->group(function () {
            route::get('/',[CategoryController::class,'index'])->name('admin.cate');
            route::get('/add',[CategoryController::class,'create'])->name('admin.create.cate');
            route::post('/add',[CategoryController::class,'store'])->name('admin.store.cate');
            route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.edit.cate');
            route::post('/update/{id}',[CategoryController::class,'update'])->name('admin.update.cate');
            route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.delete.cate');
        });
        Route::prefix('user')->group(function () {
            route::get('/',[UserController::class,'index'])->name('admin.user');
            route::get('/add',[UserController::class,'create'])->name('admin.create.user');
            route::post('/add',[UserController::class,'store'])->name('admin.store.user');
            route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.edit.user');
            route::post('/update/{id}',[UserController::class,'update'])->name('admin.update.user');
            route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.delete.user');
          
        });

        Route::prefix('product')->group(function () {
            route::get('/',[ProductController::class,'index'])->name('admin.product');
            route::get('/add',[ProductController::class,'create'])->name('admin.create.product');
            route::post('/add',[ProductController::class,'store'])->name('admin.store.product');
            route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.edit.product');
            route::post('/update/{id}',[ProductController::class,'update'])->name('admin.update.product');
            route::get('/delete/{id}',[ProductController::class,'delete'])->name('admin.delete.product');
            Route::get('/del-image/{id}',[ProductController::class,'delete_img'])->name('admin.delete_img.product');
        });
        Route::prefix('contact')->group(function () {
            route::get('/',[ContactController::class,'index'])->name('admin.contact');
            route::get('/add',[ContactController::class,'create'])->name('admin.create.contact');
            route::post('/add',[ContactController::class,'store'])->name('admin.store.contact');        
            route::get('/delete/{id}',[ContactController::class,'delete'])->name('admin.delete.contact');
          
        });
        Route::prefix('order')->group(function () {
            route::get('/',[OrderController::class,'index'])->name('admin.order');
            route::get('/delete/{id}',[OrderController::class,'delete'])->name('admin.delete.order');
            route::get('/detail/{id}',[OrderController::class,'detail'])->name('admin.detail.order');
            route::post('/update/{id}',[OrderController::class,'update'])->name('admin.update.order');
          
        });
        Route::prefix('blog')->group(function () {
            route::get('/',[BlogController::class,'index'])->name('admin.blog');
            route::get('/add',[BlogController::class,'create'])->name('admin.create.blog');
            route::post('/add',[BlogController::class,'store'])->name('admin.store.blog');  
            route::get('/edit/{id}',[BlogController::class,'edit'])->name('admin.edit.blog');
            route::post('/update/{id}',[BlogController::class,'update'])->name('admin.update.blog');      
            route::get('/delete/{id}',[BlogController::class,'delete'])->name('admin.delete.blog');
          
        });
    });

    
});
route::get('/',[HomeController::class,'index'])->name('web.index');
route::get('/contact',[HomeController::class,'createContact']);
route::post('/contactStore',[HomeController::class,'storeContact'])->name('contact.store');
Route::get('/category/{slug}',[HomeController::class,'cateegoryShow'])->name('web.category');
Route::get('/single/{slug}',[HomeController::class,'singleShow'])->name('web.product.single');
Route::get('cart/{id}',[HomeController::class,'addCart'])->name('add_Cart');
Route::get('showCart',[HomeController::class,'showCart'])->name('show_Cart');
Route::get('updateCart',[HomeController::class,'updateCart'])->name('update_cart');
Route::get('deleteCart',[HomeController::class,'deleteCart'])->name('delete_cart');

//Login web
Route::get('/login',[WebLoginController::class,'index'])->name('web.login');
Route::post('/login',[WebLoginController::class,'store'])->name('login.store.web');
Route::get('/register',[WebLoginController::class,'register'])->name('web.register');
Route::post('/register',[WebLoginController::class,'registerStore'])->name('web.register.store');
Route::get('/logout',[WebLoginController::class,'logout'])->name('web.logout');

//Forget Password
Route::get('/forget',[WebLoginController::class,'forget'])->name('web.forget');
Route::post('/forget',[WebLoginController::class,'postForget'])->name('web.post.forget');
Route::get('/getPass',[WebLoginController::class,'getPass'])->name('web.getPass');
Route::post('/getPass/{id}',[WebLoginController::class,'savePass'])->name('web.getPass.post');

//Checkout
Route::get('/checkout',[HomeController::class,'checkout'])->name('web.checkout');
Route::post('/checkout',[HomeController::class,'checkoutPost'])->name('web.checkout.post');

//Blog
Route::get('/blogWeb',[HomeController::class,'showBlog']);
Route::get('/blogWeb/{slug}',[HomeController::class,'showDetailBlog'])->name('web.blog.detail');
Route::post('/comment',[HomeController::class,'comment'])->name('web.comment');
Route::get('/comment/{id}',[HomeController::class,'commentShow'])->name('web.comment.show');
Route::get('/order',[HomeController::class,'order'])->name('web.order');
Route::get('/showorder/{id}',[HomeController::class,'orderDetail'])->name('web.order.detail');
Route::post('/search',[HomeController::class,'search'])->name('search');

//Login with Google
Route::get('login/google', [HomeController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [HomeController::class, 'handleGoogleCallback']);
