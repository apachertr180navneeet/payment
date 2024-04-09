<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
// use App\Http\Controllers\Admin\AdminAuthController;
// use App\Http\Controllers\Admin\PageController;
// use App\Http\Controllers\Admin\ContactController;
// use App\Http\Controllers\Admin\NotificationController;
// use App\Http\Controllers\Admin\AdminUserController;


use App\Http\Controllers\Admin\{
    AdminAuthController,
    PageController,
    ContactController,
    NotificationController,
    AdminUserController
};

use App\Http\Controllers\Admin\Resources\{
    SchemeManagerController,
    CompnayManagerController
};

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


Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index']);

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'adminDashboard'])->name('dashboard');
        Route::get('change-password', [AdminAuthController::class, 'changePassword'])->name('change.password');
        Route::post('update-password', [AdminAuthController::class, 'updatePassword'])->name('update.password');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('profile', [AdminAuthController::class, 'adminProfile'])->name('profile');
        Route::post('profile', [AdminAuthController::class, 'updateAdminProfile'])->name('update.profile');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get("/", [AdminUserController::class, 'index'])->name('index');
            Route::get("alluser", [AdminUserController::class, 'getallUser'])->name('alluser');
            Route::post("status", [AdminUserController::class, 'userStatus'])->name('status');
            Route::delete("delete/{id}", [AdminUserController::class, 'destroy'])->name('destroy');
            Route::get("{id}", [AdminUserController::class, 'show'])->name('show');
        });

        Route::prefix('contacts')->name('contacts.')->group(function () {
            Route::get("/", [ContactController::class, 'index'])->name('index');
            Route::get("all", [ContactController::class, 'getallcontact'])->name('allcontact');
            Route::delete("delete/{id}", [ContactController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('page')->name('page.')->group(function () {
            Route::get("create/{key}", [PageController::class, 'create'])->name('create');
            Route::put("update/{key}", [PageController::class, 'update'])->name('update');
        });

        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get("index", [NotificationController::class, 'index'])->name('index');
            Route::get("clear", [NotificationController::class, 'clear'])->name('clear');
            Route::delete("delete/{id}", [NotificationController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('resources/scheme')->name('resources.scheme.')->group(function () {
            Route::get("/index", [SchemeManagerController::class, 'index'])->name('index');
            Route::get("/create", [SchemeManagerController::class, 'create'])->name('create');
            Route::post("/store", [SchemeManagerController::class, 'store'])->name('store');
            Route::get("/status/{id}", [SchemeManagerController::class, 'status'])->name('status');
            Route::get("/delete/{id}", [SchemeManagerController::class, 'delete'])->name('delete');
            Route::get("/edit/{id}", [SchemeManagerController::class, 'edit'])->name('edit');
            Route::post("/update", [SchemeManagerController::class, 'update'])->name('update');
        });

        Route::prefix('resources/company')->name('resources.company.')->group(function () {
            Route::get("/index", [CompnayManagerController::class, 'index'])->name('index');
            Route::get("/create", [CompnayManagerController::class, 'create'])->name('create');
            Route::post("/store", [CompnayManagerController::class, 'store'])->name('store');
            Route::get("/status/{id}", [CompnayManagerController::class, 'status'])->name('status');
            Route::get("/delete/{id}", [CompnayManagerController::class, 'delete'])->name('delete');
            Route::get("/edit/{id}", [CompnayManagerController::class, 'edit'])->name('edit');
            Route::post("/update", [CompnayManagerController::class, 'update'])->name('update');
            Route::get("/profile/{id}", [CompnayManagerController::class, 'compnay_profile'])->name('profile');
            Route::get("/image/{id}", [CompnayManagerController::class, 'compnay_image'])->name('image');
            Route::post("/profile/image", [CompnayManagerController::class, 'profile_image'])->name('profile.image');
            Route::get("/news/{id}", [CompnayManagerController::class, 'compnay_news'])->name('news');
            Route::post("/news/store", [CompnayManagerController::class, 'news_store'])->name('news.store');
            Route::get("/delete/{id}", [CompnayManagerController::class, 'news_delete'])->name('news.delete');
            Route::get("/notice/{id}", [CompnayManagerController::class, 'compnay_notice'])->name('notice');
            Route::post("/notice/store", [CompnayManagerController::class, 'notice_store'])->name('notice.store');
        });
    });

    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'postLogin'])->name('login.post');
    Route::get('forget-password', [AdminAuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [AdminAuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [AdminAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [AdminAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

Route::middleware(['auth'])->group(function () {

});



