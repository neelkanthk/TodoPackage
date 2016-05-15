<?php

/**
 * An Custom Request class for authentication.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Http\Requests;

use App\Http\Requests\Request;

class TodoRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required|max:255|min:4'
        ];
    }

}
