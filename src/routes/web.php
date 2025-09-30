<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Weight_logController;

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
/* ブラウザに画面を表示しようroute編確認する */
Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/auth/register_1', function () {
    return view('auth.register_1');
});

Route::get('/auth/register_2', function () {
    return view('auth.register_2');
});

Route::middleware('auth')->prefix('weight_logs')->group(function () {
    Route::get('/', [Weight_logController::class, 'index']);/* トップページ */
    Route::get('search', [Weight_logController::class, 'find']);/* 何件の方 */
    Route::post('search', [Weight_logController::class, 'search']);/* 検索の方 */
    Route::post('create', [Weight_logController::class, 'create']);/* 体重登録 */
    Route::delete('{weightLogId}/delete', [Weight_logController::class, 'destroy']);/* 削除 */
    Route::patch('{weightLogId}/update', [weight_logController::class, 'update']);/* 更新 */
    Route::get('{weightLogId}', [Weight_logController::class, 'show'])->name('weight_logs.show');/* 詳細 */
    Route::get('goal_setting', [Weight_logController::class, 'showGoalForm']);/* 目標設定 */
    Route::patch('goal_setting', [Weight_logController::class, 'updateTarget']);/* 目標設定 */
});