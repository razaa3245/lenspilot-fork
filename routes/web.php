<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.index');
})->name('home');

Route::get('/aboutus.blade.php', function () {
    return view('web/content/aboutus');
});
Route::get('/signup.blade.php', function () {
    return view('web/content/signup');
});
Route::get('/price.blade.php', function () {
    return view('web/content/price');
});
Route::get('/shopkeeper.blade.php', function () {
    return view('web/content/shopkeeper');
});
Route::get('/features.blade.php', function () {
    return view('web/content/feature');
});
Route::get('/adminboard.blade.php', function () {
    return view('web/content/adminboard');
});
Route::get('/index.blade.php', function () {
    return view('web/index');
});
Route::get('/contact.blade.php', function () {
    return view('web/content/contact');
});
Route::get('/catalog.blade.php', function () {
    return view('web/content/catalog');
});