<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;

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
/*---------------Admin Route--------------*/
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout')->middleware('admin');
    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::post('/register/owner', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
// profile
    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('edit.profile');
    Route::post('/profile/update', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
// Change Password
    Route::get('change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('change.password');
    Route::post('/admin/update/password', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.update.password');
//Brand
    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::get('/add', [BrandController::class, 'BrandAdd'])->name('add.brand');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });
//All Category
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::get('/add', [CategoryController::class, 'CategoryAdd'])->name('add.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');


        //Sub Category

        Route::get('sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::get('sub/add', [SubCategoryController::class, 'SubCategoryAdd'])->name('add.subcategory');
        Route::post('sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

        //Sub SubCategory

        Route::get('sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.sub_subcategory');
        Route::get('subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
        Route::get('sub/sub/add', [SubCategoryController::class, 'SubSubCategoryAdd'])->name('add.sub_subcategory');
        Route::post('sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('sub_subcategory.store');
        Route::get('sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('sub_subcategory.edit');
        Route::post('sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('sub_subcategory.update');
        Route::get('sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('sub_subcategory.delete');
    });


});
/*---------------End Admin Route--------------*/

/*---------------Web Route--------------------*/
// Route::get('/', function () {
//     return view('welcome');
// });
//Profile
Route::get('/', [IndexController::class, 'Index']);
Route::get('user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');

Route::get('/dashboard', function () {
    $id = Auth::User()->id;
    $user = User::find($id);
    return view('dashboard', [
        'user' => $user
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
/*---------------End Web Route----------------*/

