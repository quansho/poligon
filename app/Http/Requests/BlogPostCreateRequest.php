<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required|min:5|max:200|unique:blog_posts',
            'slug' => 'max:200',
            'content_raw' => 'required|string|min:5|max:100000',
            'location_id' => 'required|integer|exists:blog_post_locations,id',
            'category_id' => 'required|integer|exists:blog_post_categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите :attribute статии',
            'content_raw.min' => 'Минимальная длина для Контент-а [:min] символов',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Загаловок'
        ];
    }
}
