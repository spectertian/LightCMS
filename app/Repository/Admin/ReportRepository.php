<?php
/**
 * @author  Eddy <cumtsjh@163.com>
 */

namespace App\Repository\Admin;

use App\Model\Admin\Report;
use App\Repository\Searchable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ReportRepository
{
    use Searchable;

    public static function list($perPage, $condition = [])
    {
        $data = Report::query()
            ->where(function ($query) use ($condition) {
                Searchable::buildQuery($query, $condition);
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
        $data->transform(function ($item) {
            $item->editUrl = route('admin::report.edit', ['id' => $item->id]);
            $item->deleteUrl = route('admin::report.delete', ['id' => $item->id]);
            $item->qrcode_url = '<img src="/qrcode/image/'.$item->id.'">';
            return $item;
        });



        return [
            'code' => 0,
            'msg' => '',
            'count' => $data->total(),
            'data' => $data->items(),
        ];
    }

    public static function add($data)
    {
        return Report::query()->create($data);
    }

    public static function update($id, $data)
    {
        return Report::query()->where('id', $id)->update($data);
    }

    public static function find($id)
    {
        return Report::query()->find($id);
    }

    public static function delete($id)
    {
        return Report::destroy($id);
    }
}
