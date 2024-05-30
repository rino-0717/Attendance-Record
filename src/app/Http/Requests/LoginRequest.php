<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|max:191|exists:users,email',
            'password' => 'required|string|min:8|unique:users|max:191',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスのアカウントが見つかりません',
            'email.exists' => 'メールアドレスが正しくありません',
            'password.required'=> 'パスワードを入力してください',
            'password.unique'=> 'パスワードが正しくありません。',
        ];
    }
}
