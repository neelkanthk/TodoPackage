<?php

/**
 * An example Custom Request class for the package.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request {

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
            'name' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Er, you forgot your task name !',
        ];
    }

}
