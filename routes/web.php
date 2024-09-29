<?php

use App\Http\Controllers\Livechat\AdminChatController;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Livechat\ChatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignupController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Livechat\UserChatController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

// Public routes accessible by guests and authenticated users
Route::get('/', function () { return view('home'); })->name('home');
Route::get('about', function () { return view('about'); })->name('about');
Route::get('portfolio', function () { return view('portfolio'); })->name('portfolio');
// Define route to the portfolio page
Route::get('/portfolio', [ProductController::class, 'showPortfolio'])->name('portfolio');
Route::get('contact', function () { return view('contact'); })->name('contact');

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
    Route::post('register/action', [SignupController::class, 'actionregister'])->name('actionregister');
    Route::get('register/verify/{email_verified_at}', [SignupController::class, 'verify'])->name('verify');
    
    Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
    Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);
});

// Authenticated users-only routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::get('/livechat', [UserChatController::class, 'index'])->name('livechat.index');
    Route::post('/send-message', [UserChatController::class, 'sendMessage'])->name('send-message');
    Route::get('/livechat', [UserChatController::class, 'index'])->name('livechat.index');
    Route::post('/livechat/send', [UserChatController::class, 'sendMessage'])->name('livechat.send');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route for regular users to access the chatroom
    Route::get('/chatroom', [ChatController::class, 'userChatroom'])->name('chatroom.user')->middleware('auth');

    // Route for AdminChat to manage all chats
    Route::get('/adminchat/chatroom', [ChatController::class, 'adminChatroom'])->name('chatroom.adminchat')->middleware('auth');

    // AdminChat routes
    Route::middleware('AdminChat')->group(function () {
        // Rute untuk AdminChat
        Route::get('/dashboard/adminchat', function () {
            return view('dashboard.dashboard-adminchat');
        })->name('dashboard.adminchat');
    
        
        Route::get('/dashboard/livechat', function () {
            return view('dashboard.livechat-adminchat');
        })->name('livechat');

        Route::get('/livechat', [AdminChatController::class, 'index'])->name('livechat.index');
        Route::get('/adminchat/{user}', [AdminChatController::class, 'show'])->name('adminchat.show');
        Route::post('/livechat/send', [AdminChatController::class, 'sendMessage'])->name('livechat.send');

    });

    // Super Admin routes
    Route::middleware('SuperAdmin')->group(function () {
        Route::get('/dashboard/superadmin', function () {
            return view('dashboard.dashboard-superadmin');
        })->name('dashboard.superadmin')->middleware(['auth', 'SuperAdmin']);

        Route::resource('products', ProductController::class);

        Route::get('superadmin/product', [ProductController::class, 'index'])->name('product');
        Route::post('superadmin/product', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product_id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product_id}', [ProductController::class, 'update'])->name('products.update');
        });

});

// Fallback route
Route::fallback(function () {
    return redirect()->route('home');
});