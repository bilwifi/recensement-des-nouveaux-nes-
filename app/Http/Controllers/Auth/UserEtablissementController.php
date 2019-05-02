<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Etablissement;
use Auth;

class UserEtablissementController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/testAuth';

    // public function __construct()
    // {
    //     $this->middleware('auth:users_etablissement')->except(['showLoginForm','login']);
    // }

    protected function guard()
    {
        return Auth::guard('users_etablissement');
    }

    public function username(){
        return 'pseudo';
    }

    protected function redirectTo()
    {
      return route('etablissement.index');
    }
     
    /**
    * Show the application's login form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm(Etablissement $etablissement)
    {
        return view('auth.login_user_etablissement',compact('etablissement'));
    }

    // public function login(Request $request)
    // {
    //     // Validate the form data
    //     $this->validate($request, ['pseudo'=> 'required','password' => 'required|min:6']);
    //     // Attempt to log the user in
    //     if (Auth::guard('users_etablissement')->attempt(['pseudo' => $request->pseudo, 'password' => $request->password ]))
    //     {
    //     //if successful, then redirect to their intended location
    //         // return redirect()->intended(route('home'));
    //         // Auth::login();  
    //         return redirect('testAuth');
    //     }
    //     // if unsuccessful, then redirect back to the login with the for

    //     // -------------------------------------------------------
    //     // RETOURNER LES ERREURS
    //     return redirect()->back()->withInput($request->only('email','password'));
    // }




}
