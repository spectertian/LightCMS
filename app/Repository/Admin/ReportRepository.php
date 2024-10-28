<?php
/**
 * @author  Eddy <cumtsjh@163.com>
 */

namespace App\Repository\Admin;

use App\Model\Admin\Report;
use App\Repository\Searchable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReportRepository
{
    use Searchable;

    public static function list($perPage, $condition = [])
    {

        QrCode::encoding('UTF-8')->format('png')->generate('我是内容',public_path('image/123.png'));
//        原文链接：https://blog.csdn.net/qq_25296245/article/details/134278816
        $data = Report::query()
            ->where(function ($query) use ($condition) {
                Searchable::buildQuery($query, $condition);
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
        $data->transform(function ($item) {
            $item->editUrl = route('admin::report.edit', ['id' => $item->id]);
            $item->deleteUrl = route('admin::report.delete', ['id' => $item->id]);
//            $item->url = "127.0.0.1/check/".$item->id;
            $item->url = '<img src="https://img12.iqilu.com/10339/article/202405/23/1ab84568f2206606ac8c98f592319449.jpeg">';
            $item->url = '<img src="https://img12.iqilu.com/10339/article/202405/23/1ab84568f2206606ac8c98f592319449.jpeg">';
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
