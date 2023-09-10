<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'content' => 'required|min:5|max:255',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Поле является обязательным',
            'content.min' => 'Поле имеет минимальную длину 5 символов',
            'content.max' => 'Поле имеет максимальную длину 255 символов',
        ];
    }
}
