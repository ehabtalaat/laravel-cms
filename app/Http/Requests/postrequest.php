<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postrequest extends FormRequest
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
        'image' => 'required_without:id',
        'category_id' => 'required'
        ];
         }
    public function messages(){
        return [
   
        'title.required' => 'the title is required',
        'category_id.required' => 'the category is required',
        'image.required_without' => 'the image is required',
        'content.required' => 'the content is required'
        ];
    }
}
