<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PolloLoginController extends Controller
{
    //
    public function index() {
        // return view('Loggin.index');

        // $user = User::find(1);
        return inertia('Home');
    }

    public function login(Request $request)  {
        $cred = $request->only(['email', 'password']);
        // $cred['password'] = bcrypt( $cred['password'] );
        if(Auth::attempt($cred))
        {
            Session::regenerate();
            return redirect(route('vehiculos.index'));
        }
        return back()->withError('Error en sus credenciales');
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return Redirect::route('login');
    }
}
