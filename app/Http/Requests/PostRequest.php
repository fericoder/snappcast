<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:2',
            'description' => 'required|min:10',
//            'slug' => 'required',
            'image' => 'required|mimes:jpg,jpeg,bmp,JPG,png,PNG',
//            'attachment' => 'mimes:jpg,jpeg,bmp,JPG,png,PNG,audio/mpeg,zip,rar',
            'category' => 'required',
            'published_at' => 'required',
            'telegram' => '',
            'body' => 'required|min:2',
        ];
    }
}
