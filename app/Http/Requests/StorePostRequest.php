<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;
use App\Models\User;

class StorePostRequest extends FormRequest
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
            'title'=>['required','min:3','unique:posts,title'],
            'description'=>['required','min:10'],
            'user_id'=>['required']
            //
        ];
    }
    public function messages()
    {
        return [
          'title.required'=>'Please Enter a Title.' ,
          'title.min'=>'Title must be at least 3 characters.' ,
          'title.unique'=>'Title already exists, Enter another title.',
          'description.required'=>'Please Enter a description.',
          'description.min'=>'Description must be at least 10 characters.',
            'user.required'=>'You must choose a user from the dropdown.'
        ];
    }
}
