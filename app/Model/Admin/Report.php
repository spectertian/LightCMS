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
    protected $primaryKey = 'report_id';

    // 主键不是自增的
    public $incrementing = false;

    // 主键类型
    protected $keyType = 'string';

    // 可批量赋值的属性
    protected $fillable = [
        'report_id',
        'client_name',
        'client_address',
        'sample_name',
        'model_spec',
        'receive_date',
        'test_date',
        'report_date'
    ];

    // 日期字段
    protected $dates = [
        'receive_date',
        'test_date',
        'report_date',
        'created_at',
        'updated_at'
    ];

    // 属性类型转换
    protected $casts = [
        'receive_date' => 'date',
        'test_date' => 'date',
        'report_date' => 'date'
    ];

    public static $searchField = [
        'report_id' => '报告编号',
        'client_name' => '委托方',
    ];

    public static $listField = [
        'report_id' => '报告编号',
        'client_name' => '委托方',
        'sample_name' => '样品名称',
    ];

    // 创建时间和更新时间字段名
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
