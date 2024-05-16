<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\YourModelNamespace\Record;

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
            'work_start_time' => 'required_without_all:work_end_time,break_start_time,break_end_time',
            'work_end_time' =>  ['required', 'after_or_equal_next_day:work_start_time'],
            'break_start_time' => 'nullable',
            'break_end_time' => 'nullable',
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