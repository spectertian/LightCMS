<?php

namespace App\Observers;

use App\Model\Admin\Report;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ReportObserver
{
    /**
     * Handle the Report "created" event.
     */
    public function created(Report $report): void
    {
        //
        Log::info('从模型中获取用户[' . $report->id . ']:' . $report->report_id);
        $url = route('web::check.show', ['id' => $report->id]);
        // 基本生成并保存
        $qrcode = QrCode::format('png')
            ->size(200)
            ->generate($url);

        // 保存到storage目录
        Storage::disk("qrcode_img")->put($report->id.'.jpg', $qrcode);
        $base64Qrcode = base64_encode($qrcode);

        $report->update([
            'medium_data' => $base64Qrcode,
        ]);
    }

    /**
     * Handle the Report "updated" event.
     */
    public function updated(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "deleted" event.
     */
    public function deleted(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "restored" event.
     */
    public function restored(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     */
    public function forceDeleted(Report $report): void
    {
        //
    }
}
