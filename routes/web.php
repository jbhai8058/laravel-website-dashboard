<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\MultiPic;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $images= MultiPic::all();
    $contacts= Contact::first();
    return view('home',compact('brands','abouts','images','contacts'));
});

//Category Controler
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'EditCat']);
Route::post('/category/update/{id}',[CategoryController::class,'UpdateCat']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDeleteCat']);
Route::get('/category/restore/{id}',[CategoryController::class,'RestoreCat']);
Route::get('/pdelete/category/{id}',[CategoryController::class,'pDeleteCat']);

//For Brand
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('/delete/brand/{id}',[BrandController::class,'DeleteBrand']);

//For MultiPics
Route::get('/multi/image',[BrandController::class,'MultiPics'])->name('multi.image');
// Route::post('/multi/add',[BrandController::class,'AddMultiImage'])->name('store.image');
Route::post('/multi/add', [BrandController::class, 'store'])->name('store.image');


//Admin All Routes
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/slider/add',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/slider/store',[HomeController::class,'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class,'EditSlider']);
Route::post('/slider/update/{id}',[HomeController::class,'UpdateSlider']);
Route::get('/delete/slider/{id}',[HomeController::class,'DeleteSlider']);

//Home About
Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class,'EditAbout']);
Route::post('/about/update/{id}',[AboutController::class,'UpdateAbout']);
Route::get('/about/delete/{id}',[AboutController::class,'DeleteAbout']);

//contact page
Route::get('/admin/contact',[ContactController::class,'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact',[ContactController::class,'AdminAddContact'])->name('add.contact');
Route::post('admin/store/contact',[ContactController::class,'AdminStoreContact'])->name('store.contact');
Route::get('admin/contact/edit/{id}',[ContactController::class,'AdminEditContact']);
Route::post('admin/contact/update/{id}',[ContactController::class,'AdminUpdateContact']);
Route::get('admin/contact/delete/{id}',[ContactController::class,'AdminDeleteContact']);

Route::get('/admin/message',[ContactController::class,'AdminMessage'])->name('admin.message');
Route::get('message/delete/{id}',[ContactController::class,'MessageDelete']);

//home contact page
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     $users=User::all();
    //     return view('dashboard',compact('users'));
    // })->name('dashboard');
    Route::get('/dashboard', function () {
        // $users=User::all();
        return view('admin.index');
    })->name('dashboard');
});
//logout
Route::get('/user/logout',[LogoutController::class,'Logout'])->name('user.logout');
//password change
Route::get('/user/password',[ChangePass::class,'ChangePassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'PasswordUpdate'])->name('password.update');
//profile
Route::get('/profile/update',[ChangePass::class,'PUpdate'])->name('profile.update');
Route::post('/user/profile/update',[ChangePass::class,'ProfileUpdate'])->name('update.user.profile');
