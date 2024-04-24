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
        'work_start_time' => 'required',// 他の打刻ボタンはwork_start_timeが必要
        'work_end_time' => 'required_if:work_start_time,!=,null',
        'break_start_time' => 'required_if:work_start_time,!=,null',
        'break_end_time' => 'required_if:break_start_time,!=,null',
        ];
    }

    public function withValidator($validator)
    {
    $validator->after(function ($validator) {
        if (!$this->input('work_start_time')) {
            $validator->errors()->add('work_start_time', '勤務開始ボタンを押してください。');
            }

        if ($this->input('work_end_time') && $this->input('work_start_time')) {
            $validator->errors()->add('work_end_time', '勤務終了後は再度勤務開始できません。');
            }

        if ($this->input('break_start_time') && !$this->input('work_start_time')) {
            $validator->errors()->add('break_start_time', '勤務開始後に休憩を開始してください。');
            }

        if ($this->input('break_end_time') && !$this->input('break_start_time')) {
            $validator->errors()->add('break_end_time', '休憩開始後に休憩を終了してください。');
            }

        if ($this->input('break_end_time') && !$this->input('work_end_time')) {
            $validator->errors()->add('break_end_time', '休憩終了後に勤務を終了してください。');
            }
        });
    }
}
