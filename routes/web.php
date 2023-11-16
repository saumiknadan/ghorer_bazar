<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\SubCategoryController;

use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('frontend.welcome');
// });



                        // frontend route

// homepage route 
Route::get('/', [HomeController::class,'index']);
Route::get('/view-details{id}', [HomeController::class, 'view_details']);
Route::get('/product-by-cat/{id}', [HomeController::class, 'product_by_cat']);
Route::get('/product-by-subcat/{id}', [HomeController::class, 'product_by_subcat']);
Route::get('/all-products', [HomeController::class, 'view_all']);




                        // backend route
// dashboard route

Route::get('/dashboard', [AdminController::class,'dashboard']);

// All category related route
Route::resource('categories', CategoryController::class);
Route::get('cat-status{category}', [CategoryController::class, 'change_status']);

// All subcategory related route
Route::resource('sub-categories', SubCategoryController::class);
Route::get('subcat-status{subcategory}', [SubCategoryController::class, 'change_status']);

// All products related route
Route::resource('products', ProductController::class);
Route::get('subcat-status{product}', [ProductController::class, 'change_status']);
Route::get('/view-products/{id}', [ProductController::class, 'show']);


Route::get('GetSubCatAgainstMainCatEdit/{id}', 'ProductController@GetSubCat');

