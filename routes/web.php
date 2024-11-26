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
use App\Http\Controllers\Backoffice\TransactionDepositController;
use App\Http\Controllers\Backoffice\TransactionWithdrawController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController as ControllersPromotionController;
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

Route::get('/slots', function() {
    $games = Game::limit(52)->get();
    return view('frontend.slot', compact('games'));
});

Route::get('/load-more-games', [GameController::class, 'loadMoreGames']);
Route::get('/search-games', [GameController::class, 'searchGames']);

// backoffice
Route::get('/backoffice/{a}', [AuthController::class, 'login'])->name('backoffice.login');
Route::post('/backoffice/{a}', [AuthController::class, 'authenticate'])->name('backoffice.authenticate');

Route::get('/promotion', [ControllersPromotionController::class, 'index'])->name('promotion.index');
Route::get('/promotion/{a}', [ControllersPromotionController::class, 'show'])->name('promotion.show');


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('backoffice.logout');

    // USER
    Route::get('/games/play-game/{a}', [GameController::class, 'playGame'])->name('game.playGame');
    Route::get('/profile/wallet', [ProfileController::class, 'wallet'])->name('wallet');
    Route::get('/profile/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::post('/profile/deposit/store', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('/profile/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
    Route::post('/profile/withdraw/store', [WithdrawController::class, 'store'])->name('withdraw.store');
    Route::get('/profile/transactions', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/user/getBall', [HomeController::class, 'getBall'])->name('getBall');
    Route::get('/promotion-progress/{a}', [HomeController::class, 'getPromotionProgress'])->name('getPromotionProgress');
    Route::get('/history-game', [HomeController::class, 'getHistoryGame'])->name('getHistoryGame');

    // BACKOFFICE
    $setting = Setting::first();
    Route::get('/backoffice/dashboard/' . $setting->web_token, [DashboardController::class, 'index'])->name('backoffice.dashboard');
    Route::get('/backoffice/dashboard/get-transaction-data/' . $setting->web_token, [DashboardController::class, 'getTransactionData'])->name('backoffice.getTransactionData');
    Route::get('/backoffice/dashboard/transaction-summary/' . $setting->web_token, [DashboardController::class, 'getTransactionSummary'])->name('backoffice.getTransactionSummary');


    Route::get('/backoffice/categories/' . $setting->web_token, [CategoryController::class, 'index'])->name('backoffice.category');

    Route::get('/backoffice/providers/createOrUpdateProviderApiNexus', [ProviderController::class, 'createOrUpdateProviderApiNexus'])->name('backoffice.createOrUpdateProviderApiNexus');
    Route::get('/backoffice/providers/createOrUpdateGameApiNexus', [ProviderController::class, 'createOrUpdateGameApiNexus'])->name('backoffice.createOrUpdateGameApiNexus');
    Route::get('/backoffice/providers/createOrUpdateGameApiSG', [ProviderController::class, 'createOrUpdateGameApiSG'])->name('backoffice.createOrUpdateGameApiSG');
    Route::get('/backoffice/providers/getProviderListSG', [ProviderController::class, 'getProviderListSG'])->name('backoffice.getProviderListSG');
    Route::get('/backoffice/providers/' . $setting->web_token, [ProviderController::class, 'index'])->name('backoffice.provider');
    Route::get('/backoffice/providers/update/' . $setting->web_token, [ProviderController::class, 'updateProvider'])->name('backoffice.updateProvider');
    Route::get('/backoffice/providers/update-game/' . $setting->web_token, [ProviderController::class, 'updateGame'])->name('backoffice.updateGame');
    Route::post('/backoffice/providers/update/data/' . $setting->web_token, [ProviderController::class, 'update'])->name('backoffice.provider.update');

    Route::get('/backoffice/games/' . $setting->web_token, [BGameController::class, 'index'])->name('backoffice.games');
    Route::get('/backoffice/games/update/' . $setting->web_token, [BGameController::class, 'updateGame'])->name('backoffice.updateGames');
    Route::post('backoffice/update-game-status/' . $setting->web_token, [BGameController::class, 'updateGameStatus'])->name('backoffice.updateGameStatus');


    Route::get('/backoffice/api-credentials/' . $setting->web_token, [ApiCredentialController::class, 'index'])->name('backoffice.apicredentials');
    Route::post('/backoffice/api-credentials/store/' . $setting->web_token, [ApiCredentialController::class, 'store'])->name('backoffice.apicredentials.store');
    Route::get('/backoffice/api-credentials/edit/' . $setting->web_token . '/{a}', [ApiCredentialController::class, 'edit'])->name('backoffice.apicredentials.edit');
    Route::put('/backoffice/api-credentials/update/' . $setting->web_token . '/{a}', [ApiCredentialController::class, 'update'])->name('backoffice.apicredential.update');
    Route::delete('/backoffice/api-credentials/destroy' . $setting->web_token . '/{a}', [ApiCredentialController::class, 'destroy'])->name('backoffice.apicredential.destroy');

    Route::get('/backoffice/banks/' . $setting->web_token, [BankController::class, 'index'])->name('backoffice.banks');
    Route::post('/backoffice/banks/store/' . $setting->web_token, [BankController::class, 'store'])->name('backoffice.banks.store');
    Route::get('/backoffice/banks/edit/' . $setting->web_token . '/{a}', [BankController::class, 'edit'])->name('backoffice.banks.edit');
    Route::put('/backoffice/banks/update/' . $setting->web_token . '/{b}', [BankController::class, 'update'])->name('backoffice.banks.update');
    Route::delete('/backoffice/banks/destroy/' . $setting->web_token . '/{a}', [BankController::class, 'destroy'])->name('backoffice.banks.destroy');

    Route::get('/backoffice/bankaccounts/' . $setting->web_token, [BankAccountController::class, 'index'])->name('backoffice.bankaccounts');
    Route::post('/backoffice/bankaccounts/store' . $setting->web_token, [BankAccountController::class, 'store'])->name('backoffice.bankaccounts.store');
    Route::get('/backoffice/bankaccounts/edit/' . $setting->web_token . '/{a}', [BankAccountController::class, 'edit'])->name('backoffice.bankaccounts.edit');
    Route::put('/backoffice/bankaccounts/update/' . $setting->web_token . '/{a}', [BankAccountController::class, 'update'])->name('backoffice.bankaccounts.update');
    Route::delete('/backoffice/bankaccounts/destroy/' . $setting->web_token . '/{a}', [BankAccountController::class, 'destroy'])->name('backoffice.bankaccounts.destroy');

    Route::get('/backoffice/members/' . $setting->web_token, [MemberController::class, 'index'])->name('backoffice.members');
    Route::post('/backoffice/members/store/' . $setting->web_token, [MemberController::class, 'store'])->name('backoffice.members.store');
    Route::get('/backoffice/members/edit/' . $setting->web_token . '/{b}', [MemberController::class, 'edit'])->name('backoffice.members.edit');
    Route::post('/backoffice/members/update/' . $setting->web_token . '/{b}', [MemberController::class, 'update'])->name('backoffice.members.update');
    Route::delete('/backoffice/members/delete/' . $setting->web_token . '/{b}', [MemberController::class, 'destroy'])->name('backoffice.members.destroy');

    Route::get('backoffice/settings/' . $setting->web_token, [SettingController::class, 'index'])->name('backoffice.settings.index');
    Route::post('backoffice/settings/' . $setting->web_token, [SettingController::class, 'storeOrUpdate'])->name('backoffice.settings.storeOrUpdate');


    Route::get('backoffice/transactions/deposit/' . $setting->web_token, [TransactionDepositController::class, 'index'])->name('backoffice.transactions.deposit');
    Route::get('backoffice/transactions/deposit/' . $setting->web_token . '/{id}', [TransactionDepositController::class, 'show'])->name('backoffice.transactions.deposit.detail');
    Route::post('backoffice/transactions/deposit/' . $setting->web_token . '/{id}/update-status', [TransactionDepositController::class, 'updateStatus'])->name('backoffice.transactions.deposit.updateStatus');

    Route::get('backoffice/transactions/withdraw/' . $setting->web_token, [TransactionWithdrawController::class, 'index'])->name('backoffice.transactions.withdraw');
    Route::get('backoffice/transactions/withdraw/' . $setting->web_token . '/{id}', [TransactionWithdrawController::class, 'show'])->name('backoffice.transactions.withdraw.detail');
    Route::post('backoffice/transactions/withdraw/' . $setting->web_token . '/{id}/update-status', [TransactionWithdrawController::class, 'updateStatus'])->name('backoffice.transactions.withdraw.updateStatus');


    Route::get('backoffice/banners/' . $setting->web_token . '/{id?}', [BannerController::class, 'index'])->name('backoffice.banners');
    Route::post('backoffice/banners/' . $setting->web_token, [BannerController::class, 'store'])->name('backoffice.banners.store');
    Route::put('backoffice/banners/' . $setting->web_token . '/{id}', [BannerController::class, 'update'])->name('backoffice.banners.update');
    Route::delete('backoffice/banners/' . $setting->web_token . '/{id}', [BannerController::class, 'destroy'])->name('backoffice.banners.destroy');

    Route::get('backoffice/promotions/' . $setting->web_token, [PromotionController::class, 'index'])->name('backoffice.promotions');
    Route::get('backoffice/promotions/create/' . $setting->web_token, [PromotionController::class, 'create'])->name('backoffice.promotions.create');

    Route::post('backoffice/promotions/store/' . $setting->web_token, [PromotionController::class, 'store'])->name('backoffice.promotions.store');

    Route::get('backoffice/promotions/' . $setting->web_token . '/edit/{id}', [PromotionController::class, 'edit'])->name('backoffice.promotions.edit');
    Route::put('backoffice/promotions/' . $setting->web_token . '/update/{id}', [PromotionController::class, 'update'])->name('backoffice.promotions.update');
    Route::delete('backoffice/promotions/' . $setting->web_token . '/destroy/{id}', [PromotionController::class, 'destroy'])->name('backoffice.promotions.destroy');


    Route::get('/transaction/bonus', [BonusController::class, 'index'])->name('backoffice.transactions.bonus');
    Route::put('/transaction/bonus/update', [BonusController::class, 'updateStatus'])->name('backoffice.transaction.bonus.updateStatus');

    Route::get('/backoffice/promotion-bonus/'.$setting->web_token, [PromotionBonusController::class, 'index'])->name('backoffice.promotionbonus');
    Route::post('/backoffice/promotion-bonus/'.$setting->web_token, [PromotionBonusController::class, 'store'])->name('backoffice.promotionbonus.store');
});