<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
              'title.required' => 'Это поле необходимо для заполнения',
              'title.string' => 'Данные должны соответствовать строчному типу',
              'content.string' => 'Данные должны соответствовать строчному типу',
              'content.required' => 'Это поле необходимо для заполнения',
              'preview_image.required' => 'Это поле необходимо для заполнения',
              'preview_image.file' => 'Необходимо выбрать файл',
              'main_image.required' => 'Это поле необходимо для заполнения',
              'main_image.file' => 'Необходимо выбрать файл',
              'category_id.required' => 'Это поле необходимо для заполнения',
              'category_id.integer' => 'id должно быть числом',
              'category_id.exists' => 'id должно быть в бозе данных',
              'tags_id.array' => 'Необходимо отправить массив данных',

        ];
    }
}
