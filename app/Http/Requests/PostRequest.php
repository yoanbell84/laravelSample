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
            //
            
            'title'=> 'required|string|min:6',
            'body'=> 'required|string|min:6'
        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'category_id.required' => 'A category is required',
        'body.required'  => 'A body is required',
        'title.required'  => 'A title is required',
    ];
}
}
