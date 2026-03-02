<?php
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeController2;
use App\Http\Controllers\Stripe2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\LensController;
use App\Http\Controllers\MController;
use App\Http\Controllers\MembershipPaymentController;

// Static pages only
Route::get('/', fn() => view('web.index'))->name('home');
Route::get('/aboutus', fn() => view('web.content.aboutus'))->name('aboutus');
Route::get('/features', fn() => view('web.content.feature'))->name('features');
Route::get('/price', fn() => view('web.content.price'))->name('pricing');
Route::get('/catalog', fn() => view('web.content.catalog'))->name('catalog');
Route::get('/contact', fn() => view('web.content.contact'))->name('contact');
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Shopkeeper dashboard - uses existing shopkeeper.blade.php
Route::get('/shopkeeper/dashboard', function () {
    return view('shopkeeper.shopkeeper');
})->name('shopkeeper.dashboard');

// Admin dashboard route - corrected to use admindashboard.blade.php
Route::get('/admin/dashboard', function () {
    return view('admin.admindashboard');
})->name('admin.dashboard');

Route::prefix('subscription')->name('subscription.')->group(function () {
    Route::get('/start', [SubscriptionController::class, 'start'])->name('start');
    Route::post('/checkout', [SubscriptionController::class, 'checkout'])->name('checkout');
    Route::get('/success', [SubscriptionController::class, 'success'])->name('success');
    Route::get('/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
});

Route::get('/admin/messages', function () {
    return view('web.content.messages');
})->name('messages');
//contact page routing
Route::get('/contact', function () {
    return view('web.content.contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/shopkeeper/catalog', [ShopkeeperController::class, 'showCatalog'])->name('shopkeeper.catalog');


Route::get('/price', function () {
    return view('web.content.price'); // adjust path according to your structure
})->name('price');

Route::get('/shopkeeper/catalog1', function () {
    return view('web.content.catalog1'); // adjust path according to your structure
})->name('price');


// Subscription routes
Route::get('/subscription/start', [SubscriptionController::class, 'start'])->name('subscription.start');
Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');





// Public routes
Route::get('/', function () {
    return view('web.index');
})->name('home');

Route::get('/lenses', [LensController::class, 'index'])->name('lenses.index');

// Admin routes (add authentication middleware in production)
Route::prefix('admin')->group(function () {
    Route::get('/lenses', [LensController::class, 'adminIndex'])->name('admin.lenses.index');
    Route::get('/lenses/create', [LensController::class, 'create'])->name('admin.lenses.create');
    Route::get('/lenses/{id}/edit', [LensController::class, 'edit'])->name('admin.lenses.edit');
});



// routes/web.php
Route::get('/price', function () {
    return view('web.content.price');   // ← yahi sahi hai
})->name('price');
// routes/web.php
Route::get('/contact-us', function () {
    return view('web.content.contact');
})->name('contactus');



// In routes/web.php (for admin panel)
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/lenses', LensController::class);
});



// Shopkeeper Approval Routes
Route::get('/shopkeeper-approvals', [ShopkeeperController::class, 'index'])
    ->name('shopkeeper.approvals.index');

Route::get('/shopkeeper-approvals/get-pending', [ShopkeeperController::class, 'getPending'])
    ->name('shopkeeper.approvals.getPending');

Route::post('/shopkeeper-approvals/approve/{id}', [ShopkeeperController::class, 'approve'])
    ->name('shopkeeper.approvals.approve');

Route::post('/shopkeeper-approvals/decline/{id}', [ShopkeeperController::class, 'decline'])
    ->name('shopkeeper.approvals.decline');

Route::get('/shopkeeper-approvals/details/{id}', [ShopkeeperController::class, 'getDetails'])
    ->name('shopkeeper.approvals.details');




//model ko controll krra

Route::get('/lens', [MController::class, 'index']);
Route::get('/video_feed', [MController::class, 'stream']);
Route::get('/lens/next', [MController::class, 'nextLens']);
Route::get('/lens/prev', [MController::class, 'prevLens']);

// routes/web.php
Route::get('shopkeeper/dashboard', function () {
    return view('shopkeeper.shopkeeper');   // ← yahi sahi hai
})->name('shopkeeper.dashboard');

//stripe ke routes
Route::get('/stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');



Route::get('/membership', [MembershipPaymentController::class, 'membership']);
Route::post('/membership-payment', [MembershipPaymentController::class, 'paymentPost'])
        ->name('membership.payment');

Route::get('/stripe2', [Stripe2Controller::class, 'stripe2']);
Route::post('/stripe2-payment', [Stripe2Controller::class, 'stripe2Post'])
        ->name('stripe2.post');