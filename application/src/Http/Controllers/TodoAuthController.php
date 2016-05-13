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
                return redirec()->route('todo_login');
            }
        } catch (Exception $ex) {
            return redirect()->route('todo_login');
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('todo_login');
    }

    public function dashboard() {
        return view('todopackage::pages.dashboard');
    }

}
