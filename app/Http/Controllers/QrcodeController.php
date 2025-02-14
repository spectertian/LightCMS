<?php
// 控制器
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\Admin\ReportRequest;
use App\Repository\Admin\ReportRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Model\Admin\Report;
use function PHPUnit\Framework\exactly;

class QrcodeController extends Controller
{
    public function show($id)
    {
        $qrcode = Report::findOrFail($id);
        return view('qrcode.show', compact('qrcode'));
    }

    public function image($id)
    {
        try {
            $qrcode = Report::findOrFail($id);

            // 如果是 base64 编码的数据需要先解码
            $imageData = base64_decode($qrcode->medium_data);

            return response($imageData)
                ->header('Content-Type', 'image/png')
                ->header('Cache-Control', 'public, max-age=31536000');

        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function downloadQrCode($id)
    {
        $report = Report::findOrFail($id);

        $imageData = base64_decode($report->medium_data);


        // 设置响应头
        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="'.$report->id.'.png"',
        ];

        // 返回下载响应
        return response($imageData)->withHeaders($headers);
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