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

        try {
            if (Auth::attempt($credentials)) {
                return redirect()->route('todo_dashboard');
            } else {
                
            }
        } catch (Exception $ex) {
            
        }
    }

    public function dashboard() {
        
    }

}
