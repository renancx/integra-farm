<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingData = $request->validate([
            'login_email' => 'required|email',
            'login_password' => 'required'
        ]);

        if(!auth()->attempt(['email' => $incomingData['login_email'], 'password' => $incomingData['login_password']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request){
        $incomingData = $request->validate([
            'name' => 'required',
            'cpf' => 'required|size:11|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'city' => 'required'
        ]);

        $incomingData['password'] = bcrypt($incomingData['password']);

        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/');
    }
}
