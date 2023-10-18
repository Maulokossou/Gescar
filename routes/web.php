<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GestionVoitureController;
use App\Http\Controllers\LocationController;

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
Route::controller(CustomerController::class)->middleware('auth')->group(function(){
   Route::get('/','customers')->name('customers');
   Route::post('/newCustomers','newCustomersStore')->name('newCustomers');
   Route::get('/modifyForm/{id}','modifyForm')->name('modifyForm');
   Route::post('/modifyCustomerStore/{id}','modifyCustomerStore')->name('modifyCustomerStore');
   Route::get('/seeMore/{id?}','seeMore')->name('seeMore');
   Route::get('/customerDelete/{id}','customerDelete')->name('customerDelete');
});

Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/store/login','loginStore')->name('storeLogin');
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::post('/registerStore',[UserController::class,'registerStore'])->name('registerStore');
    Route::get('/verifyEmail/{email}',[UserController::class,'verifyEmail'])->name('verifyEmail');
    Route::get('/modifypassword',[UserController::class,'modifypassword'])->name('modifypassword');
    Route::post('/modifyUserStore',[UserController::class,'modifyUserStore'])->name('modifyUserStore');
    Route::get('/modifyVerify/{email}',[UserController::class,'modifyVerify'])->name('modifyVerify');
    Route::post('/reinitializeStore',[UserController::class,'reinitialize'])->name('reinitializeStore');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});
Route::controller(GestionVoitureController::class)->group(function(){
    Route::get('/gestionVoiture','gestionVoiture')->name('gestionVoiture');
    Route::get('/marqueVoiture','marqueVoiture')->name('marqueVoiture');
    Route::get('/modeleVoiture','modeleVoiture')->name('modeleVoiture');
    Route::get('/categorieVoiture','categorieVoiture')->name('categorieVoiture');
    Route::get('/addVoiture','addVoiture')->name('addVoiture');
});

Route::controller(CategorieController::class)->group(function(){
    Route::post('/addcategoryStore','categoryStore')->name('categoryAdd');
    Route::get('/categoryModify{id}','categoryModify')->name('catModify');
    Route::post('/categoryModify/Store{id}','categoryModifyStore')->name('categoryModifyStore');
    Route::get('/deleteCategory{id}','deleteCategory')->name('deleteCategory');
});


Route::controller(BrandController::class)->group(function(){
    Route::post('/addBrandStore','addBrandStore')->name('addBrandStore');
    Route::get('/brandModify{id}','brandModify')->name('brandModify');
    Route::post('/brandModify/Store{id}','brandModifyStore')->name('brandModifyStore');
    Route::get('/deleteBrand{id}','deleteBrand')->name('deleteBrand');
});

Route::controller(ModeleController::class)->group(function(){
    Route::post('/modelStore','addModelStore')->name('addModelStore');
    Route::get('/modelModify{id}','modelModify')->name('modelModify');
    Route::post('/modelModify/Store{id}','modelModifyStore')->name('modelModifyStore');
    Route::get('/deleteModel{id}','deleteModel')->name('deleteModel');
});


Route::controller(CarController::class)->group(function(){
    Route::post('/carStore','addCarStore')->name('addCarStore');
    Route::get('/deleteCar/{id}','deleteCar')->name('deleteCar');
    Route::get('/carModify/{id}','carModify')->name('carModify');
    Route::post('/modifyCarStore/{id}','modifyCarStore')->name('modifyCarStore'); 
    Route::get('/carSeeMore/{id}','carSeeMore')->name('carSeeMore');
   

});
Route::controller(LocationController::class)->group(function(){
    Route::get('/locationHome','locationHome')->name('locationHome'); 
    Route::get('/addlocation','addlocation')->name('addlocation'); 
    Route::post('/carLocation','carLocationStore')->name('carLocation');
    Route::get('/modifyLocation/{id}','modifyLocation')->name('modifyLocation');
    Route::post('/modifyLocationStore/{id}','modifyLocationStore')->name('modifyLocationStore');
    Route::get('/locationSeeMore/{id}','locationSeeMore')->name('locationSeeMore');
    Route::get('/locationDelete/{id}','locationDelete')->name('locationDelete');
});