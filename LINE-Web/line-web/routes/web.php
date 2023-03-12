<?php

// use App\Http\Controllers\Admin\NotificationController;

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\User\ConnectGmailController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [UserController::class, 'index']);
Route::get('/login', [UserController::class, 'index']);

Route::get('/user', [UserController::class, 'viewUser']);
Route::get('/logout-user', [UserController::class, 'logoutUser']);

Route::get('/user/notify/list', [UserController::class, 'viewAllAnnounceUser']);
Route::post('/user/get-announce-content', [UserController::class, 'getAnnounceContentRead']);


// Login Line
Route::get('line/login', [UserController::class, 'redirectToLine'])->name('login.line');
// Callback url
Route::get('line/login/callback', [UserController::class, 'handleLineCallback'])->name('login.line.callback');

// Login Gmail
Route::get('authorized/google', [ConnectGmailController::class, 'redirectToGoogle']);
// Callback Gmail
Route::get('authorized/google/callback', [ConnectGmailController::class, 'handleGoogleCallback']);


 // admin 
Route::group(array('prefix' => '/admin'), function() {
    Route::get('/', [NotificationController::class, 'NavigationView']);
    // Route::get('/line-user-view', [AdminController::class, 'index']);
    // Route::get('/announce-view', [AdminController::class, 'announceView']);
    // Route::get('/send-message-view', [AdminController::class, 'sendMessView']);

    Route::post('/send-mess', [AdminController::class, 'sendMessForListUser']);
    Route::post('/get-announce-content', [AdminController::class, 'getAnnounceContent']);

    Route::get('/register-line-list', [NotificationController::class, 'RegisterLineList'])->name('register-line-list');
    Route::get('/notification-list', [NotificationController::class, 'NotificationList'])->name('notification-list');
    Route::get('/send-notification-view/{notification_type}', [NotificationController::class, 'SendNotificationView'])->name('notification-list');



    // Route::get('/notification-list', [NotificationController::class, 'NotificationList'])->name('notification-list');


});

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');







