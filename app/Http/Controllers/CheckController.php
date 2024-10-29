<?php
// 控制器
namespace App\Http\Controllers;

use App\Model\Admin\Report;

class CheckController extends Controller
{
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('check.show', compact('report'));
    }
}

// 路由
//Route::get('/qrcode/{id}', [QrcodeController::class, 'show'])->name('qrcode.show');
//Route::get('/qrcode/image/{id}', [QrcodeController::class, 'image'])->name('qrcode.image');

// 视图 resources/views/qrcode/show.blade.php
//<
//div >
//    <h1 >{
//    {
//        $qrcode->title }
//}</h1 >
//    <img src     = "{{ route('qrcode.image', $qrcode->id) }}"
//         alt     = "QR Code"
//         loading = "lazy" >
//</div >