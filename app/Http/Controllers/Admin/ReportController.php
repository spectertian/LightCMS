<?php
/**
 * @author  Eddy <cumtsjh@163.com>
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReportRequest;
use App\Repository\Admin\ReportRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportController extends Controller
{
    protected $formNames = ['report_id', 'client_name', 'client_address', 'sample_name', 'model_spec','receive_date','test_date','report_date'];


    public function __construct()
    {
        parent::__construct();

        $this->breadcrumb[] = ['title' => '二维码列表', 'url' => route('admin::report.index')];
    }

    /**
     * 二维码管理-二维码列表
     *
     */
    public function index()
    {
        $this->breadcrumb[] = ['title' => '二维码列表', 'url' => ''];
        return view('admin.report.index', ['breadcrumb' => $this->breadcrumb]);
    }

    /**
     * 二维码列表数据接口
     *
     * @param Request $request
     * @return array
     */
    public function list(Request $request)
    {
        $perPage = (int) $request->get('limit', 50);
        $condition = $request->only($this->formNames);

        $data = ReportRepository::list($perPage, $condition);

        return $data;
    }

    /**
     * 二维码管理-新增二维码
     *
     */
    public function create()
    {
        $this->breadcrumb[] = ['title' => '新增二维码', 'url' => ''];
        return view('admin.report.add', ['breadcrumb' => $this->breadcrumb]);
    }

    /**
     * 二维码管理-保存二维码
     *
     * @param ReportRequest $request
     * @return array
     */
    public function save(ReportRequest $request)
    {
        try {
            ReportRepository::add($request->only($this->formNames));
            return [
                'code' => 0,
                'msg' => '新增成功',
                'redirect' => true
            ];
        } catch (QueryException $e) {
            return [
                'code' => 1,
                'msg' => '新增失败：' . (Str::contains($e->getMessage(), 'Duplicate entry') ? '当前二维码已存在' : '其它错误'),
                'redirect' => false
            ];
        }
    }

    /**
     * 二维码管理-编辑二维码
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $this->breadcrumb[] = ['title' => '编辑二维码', 'url' => ''];

        $model = ReportRepository::find($id);
        return view('admin.report.add', ['id' => $id, 'model' => $model, 'breadcrumb' => $this->breadcrumb]);
    }

    /**
     * 二维码管理-更新二维码
     *
     * @param ReportRequest $request
     * @param int $id
     * @return array
     */
    public function update(ReportRequest $request, $id)
    {
        $data = $request->only($this->formNames);
        try {
            ReportRepository::update($id, $data);
            return [
                'code' => 0,
                'msg' => '编辑成功',
                'redirect' => true
            ];
        } catch (QueryException $e) {
            return [
                'code' => 1,
                'msg' => '编辑失败：' . (Str::contains($e->getMessage(), 'Duplicate entry') ? '当前二维码已存在' : '其它错误'),
                'redirect' => false
            ];
        }
    }

    /**
     * 二维码管理-删除二维码
     *
     * @param int $id
     */
    public function delete($id)
    {
        try {
            ReportRepository::delete($id);
            return [
                'code' => 0,
                'msg' => '删除成功',
                'redirect' => route('admin::report.index')
            ];
        } catch (\RuntimeException $e) {
            return [
                'code' => 1,
                'msg' => '删除失败：' . $e->getMessage(),
                'redirect' => false
            ];
        }
    }

}
