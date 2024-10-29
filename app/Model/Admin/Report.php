<?php
/**
 * @author  Eddy <cumtsjh@163.com>
 */

namespace App\Model\Admin;

class Report extends Model
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    protected $guarded = [];

    // 指定表名
    protected $table = 'report';

    // 指定主键
    protected $primaryKey = 'id';



    public static $searchField = [
        'report_id' => '报告编号',
        'client_name' => '委托方',
    ];

    public static $listField = [
        'report_id' => '报告编号',
        'client_name' => '委托方',
        'sample_name' => '样品名称',
//        'url' => "二维码地址",
//        'create_time' => '添加时间',
//        'update_time' => '更新时间',
    ];

    // 创建时间和更新时间字段名
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
