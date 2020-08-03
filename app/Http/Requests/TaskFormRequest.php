<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'taskName' => 'required|max:50',
            'taskContents' => 'max:500',
        ];
    }

    public function messages()
    {
        return [
            'taskName.required' => 'タスク名を入力して下さい.',
            'taskName.max' => 'タスク名は最大50文字まで入力できます.',
            'taskContents.max' => 'タスク内容は最大500文字まで入力できます.',
        ];
    }
}
