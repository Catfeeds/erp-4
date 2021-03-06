<?php namespace App\Http\Requests\Backend\luster;

use App\Http\Requests\Request;

/**
 * Class StoreUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreLusterRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->can('create-lusters');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company'					=>  'required',
            'email'					=>	'required|email|unique:users',
            // 'password'				=>	'required|alpha_num|min:6|confirmed',
            // 'password_confirmation'	=>	'required|alpha_num|min:6',
        ];
    }
}