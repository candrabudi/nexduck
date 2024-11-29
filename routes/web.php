<?php

use App\Http\Controllers\Backoffice\ApiCredentialController;
use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\BankAccountController;
use App\Http\Controllers\Backoffice\BankController;
use App\Http\Controllers\Backoffice\BannerController;
use App\Http\Controllers\Backoffice\BonusController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\ProviderController;
use App\Http\Controllers\Backoffice\GameController as BGameController;
use App\Http\Controllers\Backoffice\MemberController;
use App\Http\Controllers\Backoffice\PromotionBonusController;
use App\Http\Controllers\Backoffice\PromotionController;
use App\Http\Controllers\Backoffice\SettingController;
use App\Http\Controllers\Backoffice\SocialMediaController;
use App\Http\Controllers\Backoffice\TransactionDepositController;
use App\Http\Controllers\Backoffice\TransactionWithdrawController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController as ControllersPromotionController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\WithdrawController;
use App\Models\Bank;
use App\Models\Game;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

$setting = Setting::first();
Route::get('/', [HomeController::class, 'index'])->name('member');

Route::get('/games/{a}', [GameController::class, 'detail'])->name('game');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/register', [UserAuthController::class, 'register'])->name('register');


Route::get('/login', function() {
    return view('frontend.auth.login');
});

Route::get('/register', function() {
    $banks = Bank::get();
    return view('frontend.auth.register', compact('banks'));
});

Route::get('/support', function() {
    return view('frontend.support');
});

Route::get('/contact', function() {
    return view('frontend.contact');
});

Route::get('/slots', [GameController::class, 'slot'])->name('game.slots');
Route::get('/casino', [GameController::class, 'casino'])->name('game.casino');

Route::get('/load-more-games', [GameController::class, 'loadMoreGames'])->name('games.loadMore');
Route::get('/search-games', [GameController::class, 'searchGames'])->name('games.search');

// backoffice
Route::get('/backoffice/login', [AuthController::class, 'login'])->name('backoffice.login');
Route::post('/backoffice/login', [AuthController::class, 'authenticate'])->name('backoffice.authenticate');

Route::get('/promotion', [ControllersPromotionController::class, 'index'])->name('promotion.index');
Route::get('/promotion/{a}', [ControllersPromotionController::class, 'show'])->name('promotion.show');


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('backoffice.logout');

    // USER
    Route::get('/games/play-game/{a}', [GameController::class, 'playGame'])->name('game.playGame');
    
    Route::get('/profile/wallet', [ProfileController::class, 'wallet'])->name('wallet');
    Route::get('/profile/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::get('/profile/setting', [ProfileController::class, 'profile'])->name('setting.profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/referral', [ReferralController::class, 'index'])->name('profile.referral');
    Route::post('/profile/deposit/store', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('/profile/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
    Route::post('/profile/withdraw/store', [WithdrawController::class, 'store'])->name('withdraw.store');
    Route::get('/profile/transactions', [TransactionController::class, 'index'])->name('transaction');


    Route::get('/user/getBall', [HomeController::class, 'getBall'])->name('getBall');
    Route::get('/promotion-progress/{a}', [HomeController::class, 'getPromotionProgress'])->name('getPromotionProgress');
    Route::get('/history-game', [HomeController::class, 'getHistoryGame'])->name('getHistoryGame');

    // BACKOFFICE
    $setting = Setting::first();
    Route::group(['prefix' => 'backoffice', 'as' => 'backoffice.'], function () {
        // Dashboard Routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/get-transaction-data', [DashboardController::class, 'getTransactionData'])->name('getTransactionData');
        Route::get('/dashboard/transaction-summary', [DashboardController::class, 'getTransactionSummary'])->name('getTransactionSummary');
    
        // Social Media Routes
        Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social-media.index');
        Route::post('/social-media', [SocialMediaController::class, 'store'])->name('social-media.store');
        Route::get('/social-media/{a}/edit', [SocialMediaController::class, 'edit'])->name('social-media.show');
        Route::put('/social-media/{a}', [SocialMediaController::class, 'update'])->name('social-media.update');
        Route::delete('/social-media', [SocialMediaController::class, 'destroy'])->name('social-media.destroy');
    
        // Category Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    
        // Provider Routes
        Route::get('/providers/createOrUpdateProviderApiNexus', [ProviderController::class, 'createOrUpdateProviderApiNexus'])->name('createOrUpdateProviderApiNexus');
        Route::get('/providers/createOrUpdateGameApiNexus', [ProviderController::class, 'createOrUpdateGameApiNexus'])->name('createOrUpdateGameApiNexus');
        Route::get('/providers/createOrUpdateGameApiSG', [ProviderController::class, 'createOrUpdateGameApiSG'])->name('createOrUpdateGameApiSG');
        Route::get('/providers/getProviderListSG', [ProviderController::class, 'getProviderListSG'])->name('getProviderListSG');
        Route::get('/providers', [ProviderController::class, 'index'])->name('provider');
        Route::get('/providers/update', [ProviderController::class, 'updateProvider'])->name('updateProvider');
        Route::get('/providers/update-game', [ProviderController::class, 'updateGame'])->name('updateGame');
        Route::post('/providers/update/data', [ProviderController::class, 'update'])->name('provider.update');
    
        // Game Routes
        Route::get('/games', [BGameController::class, 'index'])->name('games');
        Route::get('/games/update', [BGameController::class, 'updateGame'])->name('updateGames');
        Route::post('/update-game-status', [BGameController::class, 'updateGameStatus'])->name('updateGameStatus');
    
        // API Credentials Routes
        Route::get('/api-credentials', [ApiCredentialController::class, 'index'])->name('apicredentials');
        Route::post('/api-credentials/store', [ApiCredentialController::class, 'store'])->name('apicredentials.store');
        Route::get('/api-credentials/edit/{a}', [ApiCredentialController::class, 'edit'])->name('apicredentials.edit');
        Route::put('/api-credentials/update/{a}', [ApiCredentialController::class, 'update'])->name('apicredential.update');
        Route::delete('/api-credentials/destro/{a}', [ApiCredentialController::class, 'destroy'])->name('apicredential.destroy');
    
        // Bank Routes
        Route::get('/banks', [BankController::class, 'index'])->name('banks');
        Route::post('/banks/store', [BankController::class, 'store'])->name('banks.store');
        Route::get('/banks/edit/{a}', [BankController::class, 'edit'])->name('banks.edit');
        Route::put('/banks/update/{b}', [BankController::class, 'update'])->name('banks.update');
        Route::delete('/banks/destroy/{a}', [BankController::class, 'destroy'])->name('banks.destroy');
    
        // Bank Account Routes
        Route::get('/bankaccounts', [BankAccountController::class, 'index'])->name('bankaccounts');
        Route::post('/bankaccounts/store', [BankAccountController::class, 'store'])->name('bankaccounts.store');
        Route::get('/bankaccounts/edit/{a}', [BankAccountController::class, 'edit'])->name('bankaccounts.edit');
        Route::put('/bankaccounts/update/{a}', [BankAccountController::class, 'update'])->name('bankaccounts.update');
        Route::delete('/bankaccounts/destroy/{a}', [BankAccountController::class, 'destroy'])->name('bankaccounts.destroy');
    
        // Member Routes
        Route::get('/members', [MemberController::class, 'index'])->name('members');
        Route::post('/members/store', [MemberController::class, 'store'])->name('members.store');
        Route::get('/members/edit/{b}', [MemberController::class, 'edit'])->name('members.edit');
        Route::post('/members/update/{b}', [MemberController::class, 'update'])->name('members.update');
        Route::delete('/members/delete/{b}', [MemberController::class, 'destroy'])->name('members.destroy');
    
        // Setting Routes
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'storeOrUpdate'])->name('settings.storeOrUpdate');
    
        // Transaction Deposit Routes
        Route::get('/transactions/deposit', [TransactionDepositController::class, 'index'])->name('transactions.deposit');
        Route::get('/transactions/deposit/{id}', [TransactionDepositController::class, 'show'])->name('transactions.deposit.detail');
        Route::post('/transactions/deposit/{id}/update-status', [TransactionDepositController::class, 'updateStatus'])->name('transactions.deposit.updateStatus');
    
        // Transaction Withdraw Routes
        Route::get('/transactions/withdraw', [TransactionWithdrawController::class, 'index'])->name('transactions.withdraw');
        Route::get('/transactions/withdraw/{id}', [TransactionWithdrawController::class, 'show'])->name('transactions.withdraw.detail');
        Route::post('/transactions/withdraw/{id}/update-status', [TransactionWithdrawController::class, 'updateStatus'])->name('transactions.withdraw.updateStatus');
    
        // Banner Routes
        Route::get('/banners/{id?}', [BannerController::class, 'index'])->name('banners');
        Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
        Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
        Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
    
        // Promotion Routes
        Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions');
        Route::get('/promotions-create', [PromotionController::class, 'create'])->name('promotions.create');
        Route::post('/promotions-store', [PromotionController::class, 'store'])->name('promotions.store');
        Route::get('/promotions-edit', [PromotionController::class, 'edit'])->name('promotions.edit');
        Route::post('/promotions-update', [PromotionController::class, 'update'])->name('promotions.update');
        Route::delete('/promotions-destroy', [PromotionController::class, 'destroy'])->name('promotions.destroy');
    
        // Bonus Routes
        Route::get('/transaction/bonus', [BonusController::class, 'index'])->name('transactions.bonus');
        Route::put('/transaction/bonus/update', [BonusController::class, 'updateStatus'])->name('transaction.bonus.updateStatus');
    
        // Promotion Bonus Routes
        Route::get('/promotion-bonus', [PromotionBonusController::class, 'index'])->name('promotionbonus');
        Route::post('/promotion-bonus', [PromotionBonusController::class, 'store'])->name('promotionbonus.store');
    });
    
});