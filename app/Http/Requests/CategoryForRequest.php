<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageInvokableExists;
class CategoryForRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'name'=>'required|max:100|string',
        'slug'=>'required|max:100|string',
        'description'=>'required|max:255|string',
        'image'=>'image',
        'meta_title'=>'required|max:100|string',
        'meta_keyword'=>'required|max:100|string',
        'meta_description'=>'required|max:255|string',
        'status'=>'max:1',
        ];
    }
}
