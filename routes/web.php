<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\LoginController;
use Illuminate\Support\Facades\Artisan;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    echo "Cache is cleared<br>";
    Artisan::call('route:clear');
    echo "route cache is cleared<br>";
    Artisan::call('config:clear');
    echo "config is cleared<br>";
    Artisan::call('view:clear');
    echo "view is cleared<br>";
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('check-login', [LoginController::class, 'check_login'])->name('check-login');

Route::get('testing-mail', function(){

    $mailData = [
        "name" => "Test NAME",
        "dob" => "12/12/1990"
    ];

    Mail::to("parthkhunt123@yopmail.com")->send(new TestEmail($mailData));
    dd("Mail Sent Successfully!");
});
// Route::get('/testing-mail', [LoginController::class, 'testingmail'])->name('testing-mail');
