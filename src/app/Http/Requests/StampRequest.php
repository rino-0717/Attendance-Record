<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StampRequest extends FormRequest
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
        return [
            'work_start_time' => 'required|date_format:H:i',// 日を跨いだ時点で翌日の出勤操作に切り替える
            'work_end_time' => 'required_if:work_start_time,!=,null|date_format:H:i',// 日を跨いだ時点で翌日の出勤操作に切り替える、出勤を押していないと退勤ボタン押せない
            'break_start_time' => 'required_if:work_start_time,!=,null|date_format:H:i',// 出勤を押していないと休憩ボタン押せない
            'break_end_time' => 'required_if:break_start_time,!=,null|date_format:H:i',// 休憩開始ボタンを押していないと休憩終了ボタンは押せない
        ];
    }
}