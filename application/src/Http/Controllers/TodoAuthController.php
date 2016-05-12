<?php

namespace TodoPackage\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use TodoPackage\Application\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoAuthController extends Controller {

    public function getLogin() {
        return view('todopackage::pages.login');
    }

    public function postLogin(TodoRequest $request) {
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        try {
            if (Auth::attempt($credentials)) {
                dd('hello');
            }
        } catch (Exception $ex) {
            
        }
    }

}
