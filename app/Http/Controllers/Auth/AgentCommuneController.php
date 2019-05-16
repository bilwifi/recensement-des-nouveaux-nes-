<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Etablissement;
use Auth;

class AgentCommuneController extends Controller
{
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('agents_commune');
    }

    public function username(){
        return 'pseudo';
    }

    protected function redirectTo()
    {
      return route('commune.accueil');
    }
    
     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login_agent_commune');
    }

    // public function login(Request $request){
    // 	dd($request);
    // }
    public function logout(){
        \Auth::logout();
    }
}
