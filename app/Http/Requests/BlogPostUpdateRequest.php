<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'content_raw' => 'required|string|min:5|max:100000',
            'location_id' => 'required|integer|exists:blog_post_locations,id',
            'category_id' => 'required|integer|exists:blog_post_categories,id',
        ];
    }
}
