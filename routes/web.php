<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DeliveryMenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
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
Route::post('Restaurant/{id}/Order/store', [App\Http\Controllers\OrderController::class, 'store'])->middleware('auth')->name('store.order');
Route::get('/Order/create', [App\Http\Controllers\OrderController::class, 'create'])->middleware('auth')->name('create.order');
*/





Auth::routes();
Route::get('Restaurant/show/{id}', [App\Http\Controllers\RestaurantController::class, 'show'])->name('Restaurant.show');
Route::post('Restaurant/{id}/AddToCart/{idp}', [App\Http\Controllers\ProductController::class, 'cart'])->name('product.cart');
Route::put('Restaurant/UpdateCart/{id}', [App\Http\Controllers\ProductController::class, 'updatecart'])->name('product.updatecart');
Route::delete('Restaurant/DestroyCart/{id}', [App\Http\Controllers\ProductController::class, 'destroycart'])->name('product.destroycart');
Route::put('Restaurant/DeleteCart/{id}', [App\Http\Controllers\ProductController::class, 'deletecart'])->name('product.deletecart');
Route::get('Restaurant/{id}/cart', [App\Http\Controllers\ProductController::class, 'mycart'])->name('product.mycart');
Route::resource('Restaurant/{id}/Order', OrderController::class)->middleware('auth')->only(['create','store']);  
Route::resource('/Orders/History', OrderProductController::class)->middleware('auth')->only(['index','show']);  
Route::get('Order/{id}', [App\Http\Controllers\OrderController::class, 'userorder'])->name('userorder')->middleware('auth');


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::prefix('vendor')->name('vendor.')->group(function(){
       
    Route::middleware(['guest:vendor','PreventBackHistory'])->group(function(){
        Route::get('/login', [App\Http\Controllers\VendorController::class, 'login'])->name('login');
        Route::post('/check', [App\Http\Controllers\VendorController::class, 'check'])->name('check');

    });

   Route::middleware(['auth:vendor'])->group(function(){
    Route::resource('Order', OrderController::class)->only(['index','show','update']);  
    Route::resource('Restaurant', RestaurantController::class)->except('show','index','edit'); 
    Route::get('Restaurant/Edit', [App\Http\Controllers\RestaurantController::class, 'editing'])->name('Restaurant.edit');
    Route::resource('Category', CategoryController::class);    
    Route::resource('Product', ProductController::class);    
    Route::get('Dashboard', [App\Http\Controllers\HomeController::class, 'Vendor'])->name('dashboard');
    Route::get('Edit', [App\Http\Controllers\VendorController::class, 'edit'])->name('edit');
    Route::put('Update', [App\Http\Controllers\VendorController::class, 'update'])->name('update');
    Route::get('Profile', [App\Http\Controllers\VendorController::class, 'show'])->name('show');
    Route::get('logout', [App\Http\Controllers\VendorController::class, 'logout'])->name('logout');
    Route::get('/OrderStatus/{id_status}', [App\Http\Controllers\OrderController::class, 'filter2'])->name('filter2');

   
    });

});
Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        
        Route::get('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login');
        Route::post('/check', [App\Http\Controllers\AdminController::class, 'check'])->name('check');

    });

   Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){

    Route::get('/Dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('Dashboard');
    Route::resource('Vendor', VendorController::class)->except(['edit','update','destroy']);   
    Route::resource('Delivery', DeliveryMenController::class);    
    Route::get('Profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    Route::get('Dashboard', [App\Http\Controllers\HomeController::class, 'Super'])->name('dashboard');
    Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
    Route::get('Orders', [App\Http\Controllers\OrderController::class, 'indexadmin'])->name('indexadmin');
    Route::get('Order/{id}', [App\Http\Controllers\OrderController::class, 'adminorder'])->name('adminorder');
    Route::put('Order/update/{id}', [App\Http\Controllers\OrderController::class, 'updateorder'])->name('updateorder');   
    Route::get('/OrderStatus/{id_status}', [App\Http\Controllers\OrderController::class, 'filter'])->name('filter');
    Route::resource('Restaurant', RestaurantController::class)->only('index'); 

    });

    Route::middleware(['auth:admin','PreventBackHistory','super'])->group(function(){

        Route::resource('Status', StatusController::class)->except(['create','store']);    
        Route::resource('Admin', AdminController::class); 
        Route::resource('City', CityController::class);   
        Route::post('/Super/Create/{id}', [App\Http\Controllers\AdminController::class, 'new'])->name('super.create');
        Route::post('/Super/Remove/{id}', [App\Http\Controllers\AdminController::class, 'remove'])->name('super.remove');
        Route::get('/Super', [App\Http\Controllers\AdminController::class, 'all'])->name('super');
        Route::get('/All', [App\Http\Controllers\AdminController::class, 'alls'])->name('all');

        });    

});


Route::prefix('delivery')->name('delivery.')->group(function(){
       
    Route::middleware(['guest:delivery','PreventBackHistory'])->group(function(){
        Route::get('/login', [App\Http\Controllers\DeliveryMenController::class, 'login'])->name('login');
        Route::post('/check', [App\Http\Controllers\DeliveryMenController::class, 'check'])->name('check');

    });

   Route::middleware(['auth:delivery','PreventBackHistory'])->group(function(){

    Route::get('logout', [App\Http\Controllers\DeliveryMenController::class, 'logout'])->name('logout');
    Route::get('index', [App\Http\Controllers\OrderController::class, 'indexdelivery'])->name('index');
    Route::get('History', [App\Http\Controllers\DeliveryMenController::class, 'history'])->name('history');
    Route::get('Profile', [App\Http\Controllers\DeliveryMenController::class, 'show'])->name('show');
    Route::get('Order/Show/{id}', [App\Http\Controllers\DeliveryMenController::class, 'details'])->name('details');
    //Route::put('Profile/Update/{id}', [App\Http\Controllers\DeliveryMenController::class, 'update'])->name('update');
    Route::put('/Order/{id}', [App\Http\Controllers\DeliveryMenController::class, 'choose'])->name('choose');
    Route::put('Update/Order/{id}', [App\Http\Controllers\DeliveryMenController::class, 'updateorder'])->name('updateorder');
    Route::get('OrderStatus/{id_status}', [App\Http\Controllers\OrderController::class, 'filter2'])->name('filter2');
    Route::get('Actual/Orders', [App\Http\Controllers\OrderController::class, 'indexdelivery'])->name('indexdelivery');
    Route::get('Order/{id}', [App\Http\Controllers\OrderController::class, 'deliveryorder'])->name('deliveryorder');
    Route::get('Actual/Order', [App\Http\Controllers\DeliveryMenController::class, 'last'])->name('last');
    Route::get('Dashboard', [App\Http\Controllers\HomeController::class, 'Delivery'])->name('dashboard');

    });
});