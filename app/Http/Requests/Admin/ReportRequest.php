<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\Report;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $status_in = [
            Report::STATUS_DISABLE,
            Report::STATUS_ENABLE,
        ];
        return [
            'report_id' => 'required|max:50',
            //'status' => [
            //    Rule::in($status_in),
            //],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'report_id.required' => '名称不能为空',
            'report_id.max' => '名称长度不能大于50',
        ];
    }
}
