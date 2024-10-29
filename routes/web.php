<?php

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

use App\Foundation\Regexp;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\CheckController;

Route::group(
    [
        'as' => 'web::',
    ],
    function () {
        // 首页
        Route::get('/', 'HomeController@index')->name('index');

        // 模型内容列表
        Route::get('/entity/{entityId}/content/', 'HomeController@content')
            ->name('entity.content.list')->where(['entityId' => Regexp::RESOURCE_ID]);
        // 模型内容详情
        Route::get('/entity/{entityId}/content/{contentId}', 'ContentController@show')
            ->name('content')->where(['entityId' => Regexp::RESOURCE_ID, 'contentId' => Regexp::RESOURCE_ID]);

        // 评论列表
        Route::get('/entity/{entityId}/content/{contentId}/comment', 'CommentController@list')
            ->name('comment.list')->where(['entityId' => Regexp::RESOURCE_ID, 'contentId' => Regexp::RESOURCE_ID]);

        // 带名称的路由
//        Route::get('/qrcode/{id}', [QrcodeController::class, 'show'])->name('qrcode.show');
//        Route::get('/qrcode/image/{id}', [QrcodeController::class, 'image'])->name('qrcode.image');
//        Route::resource('qrcode', QrcodeController::class);
        // 带名称的路由
        Route::get('/qrcode/{id}', [QrcodeController::class, 'show'])->name('qrcode.show');
        Route::get('/qrcode/image/{id}', [QrcodeController::class, 'image'])->name('qrcode.image');
        Route::get('qrcode/download/{id}', [QrcodeController::class, 'downloadQrCode'])->name('qrcode.download');


        Route::get('/check/{id}', [CheckController::class, 'show'])->name('check.show');

    }
);
