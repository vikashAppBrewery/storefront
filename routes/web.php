<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePass;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home', compact('brands', 'abouts', 'images'));
});

Route::get('/home', function () {
    echo "this is home page";
});

Route::get('/contact', function () {
    return view('contact');
});

 
// category controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/about-alpha-bita', [AboutusController::class, 'index'])->name('abo');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('category/update/{id}', [CategoryController::class, 'Update']);

Route::get('softdelete/category/{id}', [CategoryController::class, 'softDelete']);

Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

// for Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('brand/delete/{id}', [BrandController::class, 'Delete']);

// for multi image route

Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');

Route::get('/multi/delete/{id}', [BrandController::class, 'MultiDelete']);

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


// admin all route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('slider/delete/{id}', [HomeController::class, 'Delete']);

// about us section

Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('about/edit/{id}', [AboutController::class, 'EditAbout']);

Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);

Route::get('about/delete/{id}', [AboutController::class, 'Delete']);

// portifolio page

Route::get('/portifolio', [AboutusController::class, 'Portifolio'])->name('portifolio');

// contact page - admin

Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');

Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');

Route::get('contact/delete/{id}', [ContactController::class, 'AdminDeleteContact']);

Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');

Route::post('/update/contacts/{id}', [ContactController::class, 'AdminUpdateContact']);

Route::get('contact/edit/{id}', [ContactController::class, 'AdminEditContact']);

Route::get('/admin/contact/message', [ContactController::class, 'AdminContactMessage'])->name('admin.contact.message');

Route::get('message/delete/{id}', [ContactController::class, 'AdminDeleteMessage']);

// contact page - front

Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');

// admnin profile 0banckend

Route::get('/user/password', [ChangePass::class, 'Cpassword'])->name('change.password');

Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('password.update');
