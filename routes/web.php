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
use App\Http\Controllers\Backoffice\GamePlayController;
use App\Http\Controllers\Backoffice\LiveChatController;
use App\Http\Controllers\Backoffice\LogActivityController;
use App\Http\Controllers\Backoffice\MemberController;
use App\Http\Controllers\Backoffice\PromotionBonusController;
use App\Http\Controllers\Backoffice\PromotionController;
use App\Http\Controllers\Backoffice\SeoController;
use App\Http\Controllers\Backoffice\SettingController;
use App\Http\Controllers\Backoffice\SocialMediaController;
use App\Http\Controllers\Backoffice\TransactionBonusController;
use App\Http\Controllers\Backoffice\TransactionDepositController;
use App\Http\Controllers\Backoffice\TransactionWithdrawController;
use App\Http\Controllers\Backoffice\UserNetworkController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backoffice\ProfileController as BProfileController;
use App\Http\Controllers\Backoffice\PromotorController;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('member');

Route::get('/games/{a}', [GameController::class, 'detail'])->name('game');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/register', [UserAuthController::class, 'register'])->name('register');


Route::get('/login', function () {
    if(Auth::user()){
        return redirect()->route('member');
    }
    return view('frontend.auth.login');
});

Route::get('/register', function (Request $request) {
    if(Auth::user()){
        return redirect()->route('member');
    }
    $banks = Bank::get();
    $referral = $request->referral;
    return view('frontend.auth.register', compact('banks', 'referral'));
});

Route::get('/support', function () {
    return view('frontend.support');
});

Route::get('/contact', function () {
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

Route::get('/user/getBall', [HomeController::class, 'getBall'])->name('getBall');
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



    Route::get('/promotion-progress/{a}', [HomeController::class, 'getPromotionProgress'])->name('getPromotionProgress');
    Route::get('/history-game', [HomeController::class, 'getHistoryGame'])->name('getHistoryGame');

    // BACKOFFICE
    Route::group(['prefix' => 'backoffice', 'as' => 'backoffice.'], function () {
        // Dashboard Routes
        Route::group(['middleware' => ['role:admin,promotor']], function () {

            // Dashboard Routes
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/dashboard/get-transaction-data', [DashboardController::class, 'getTransactionData'])->name('getTransactionData');
            Route::get('/dashboard/transaction-summary', [DashboardController::class, 'getTransactionSummary'])->name('getTransactionSummary');
        
            // Transactions - Deposit Routes
            Route::get('/transactions-deposit', [TransactionDepositController::class, 'index'])->name('transactions.deposit.index');
            Route::get('/transactions/deposit/loadData', [TransactionDepositController::class, 'loadData'])->name('transactions.deposit.loadData');
            Route::post('/transactions/deposit/update-status', [TransactionDepositController::class, 'updateStatus'])->name('transactions.deposit.updateStatus');
        
            // Transactions - Withdraw Routes
            Route::get('/transactions-withdraw', [TransactionWithdrawController::class, 'index'])->name('transactions.withdraw.index');
            Route::get('/transactions/withdraw/loadData', [TransactionWithdrawController::class, 'loadData'])->name('transactions.withdraw.loadData');
            Route::post('/transactions/withdraw/update-status', [TransactionWithdrawController::class, 'updateStatus'])->name('transactions.withdraw.updateStatus');
        
            // Transactions - Bonus Routes
            Route::get('/transactions-bonus', [TransactionBonusController::class, 'index'])->name('transactions.bonus.index');
            Route::get('/transactions/bonus/loadData', [TransactionBonusController::class, 'loadData'])->name('transactions.bonus.loadData');
            Route::post('/transactions/bonus/update-status', [TransactionBonusController::class, 'updateStatus'])->name('transactions.bonus.updateStatus');
        
        });
        



        Route::group(['middleware' => ['admin:admin']], function () {
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

            Route::get('/bank-accounts', [BankAccountController::class, 'index'])->name('bank-accounts.index');
            Route::get('/bank-accounts/create', [BankAccountController::class, 'create'])->name('bank-accounts.create');
            Route::post('/bank-accounts', [BankAccountController::class, 'store'])->name('bank-accounts.store');
            Route::get('/bank-accounts/{bankAccount}/edit', [BankAccountController::class, 'edit'])->name('bank-accounts.edit');
            Route::post('/bank-accounts/{bankAccount}', [BankAccountController::class, 'update'])->name('bank-accounts.update');
            Route::post('/bank-accounts/delete/{bankAccount}', [BankAccountController::class, 'destroy'])->name('bank-accounts.destroy');

            // Member Routes
            Route::get('members', [MemberController::class, 'index'])->name('members.index');
            Route::put('members/change-password/{a}', [MemberController::class, 'updatePassword'])->name('members.change-password');
            Route::patch('members/{userId}/lock', [MemberController::class, 'lock'])->name('members.lock');
            Route::get('members-detail', [MemberController::class, 'show'])->name('members.show');
            Route::get('members-detail/history-game/{a}', [MemberController::class, 'getGameHistoryPlayer'])->name('members.getGameHistoryPlayer');
            Route::post('members-detail/setting-balance/{a}', [MemberController::class, 'settingBalance'])->name('members.settingBalance');

            // Setting Routes
            Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
            Route::post('/settings', [SettingController::class, 'storeOrUpdate'])->name('settings.storeOrUpdate');

            // Banner Routes
            Route::get('banners', [BannerController::class, 'index'])->name('banners.index');
            Route::post('banners/store', [BannerController::class, 'store'])->name('banners.store');
            Route::get('banners/edit/{id}', [BannerController::class, 'edit'])->name('banners.edit');
            Route::post('banners/update/{id}', [BannerController::class, 'update'])->name('banners.update');
            Route::post('banners/destroy/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');

            // Promotion Routes
            Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions');
            Route::get('/promotions-create', [PromotionController::class, 'create'])->name('promotions.create');
            Route::post('/promotions-store', [PromotionController::class, 'store'])->name('promotions.store');
            Route::get('/promotions-edit', [PromotionController::class, 'edit'])->name('promotions.edit');
            Route::post('/promotions-update', [PromotionController::class, 'update'])->name('promotions.update');
            Route::delete('/promotions-destroy/{a}', [PromotionController::class, 'destroy'])->name('promotions.destroy');

            // Bonus Routes
            Route::get('/transaction/bonus', [BonusController::class, 'index'])->name('transactions.bonus');
            Route::put('/transaction/bonus/update', [BonusController::class, 'updateStatus'])->name('transaction.bonus.updateStatus');

            // Promotion Bonus Routes
            Route::get('/promotion-bonus', [PromotionBonusController::class, 'index'])->name('promotionbonus');
            Route::post('/promotion-bonus', [PromotionBonusController::class, 'store'])->name('promotionbonus.store');


            // games
            Route::get('games', [GamePlayController::class, 'index'])->name('games.index');
            Route::get('games/load-data', [GamePlayController::class, 'loadData'])->name('games.loadData');


            Route::get('social-media', [SocialMediaController::class, 'index'])->name('social_media.index');
            Route::post('social-media', [SocialMediaController::class, 'store'])->name('social_media.store');
            Route::post('social-media/{id}', [SocialMediaController::class, 'update'])->name('social_media.update');
            Route::delete('social-media/{id}', [SocialMediaController::class, 'destroy'])->name('social_media.destroy');

            Route::get('/livechat', [LiveChatController::class, 'index'])->name('livechat.index');
            Route::post('/livechat', [LiveChatController::class, 'store'])->name('livechat.store');

            Route::get('/seo-settings', [SeoController::class, 'index'])->name('seo.index');
            Route::post('/seo-settings', [SeoController::class, 'store'])->name('seo.store');


            Route::get('networks', [UserNetworkController::class, 'index'])->name('networks.index');
            Route::post('networks', [UserNetworkController::class, 'store'])->name('networks.store');
            Route::get('networks/{id}/edit', [UserNetworkController::class, 'edit'])->name('networks.edit');
            Route::get('networks-detail', [UserNetworkController::class, 'detail'])->name('networks.detail');
            Route::patch('networks/{id}', [UserNetworkController::class, 'update'])->name('networks.update');
            Route::delete('networks/{id}', [UserNetworkController::class, 'destroy'])->name('networks.destroy');
            Route::get('/generateReferralCode', [UserNetworkController::class, 'generateReferralCode'])->name('networks.generateReferralCode');


            Route::get('/activity-logs', [LogActivityController::class, 'index'])->name('activity_logs.index');
            Route::get('/activity-logs/{a}', [LogActivityController::class, 'show'])->name('activity_logs.show');

            Route::get('/user-profile', [BProfileController::class, 'show'])->name('profile.show');
            Route::post('/user/profile/update', [BProfileController::class, 'update'])->name('profile.update');


            Route::get('/promotors', [PromotorController::class, 'index'])->name('promotors.index');
            Route::post('/promotor', [PromotorController::class, 'store'])->name('promotors.store');
            Route::put('/promotor/{id}', [PromotorController::class, 'update'])->name('promotors.update');
        });
    });

});