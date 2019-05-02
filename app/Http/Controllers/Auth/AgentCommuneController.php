<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AgentCommuneController extends Controller
{
    use AuthenticatesUsers;
    
     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login_agent_commune');
    }

    public function login(Request $request){
    	dd($request);
    }
}
