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
        return inertia('Login/Index');
    }

    public function login(Request $request)  {

        try {
            //code...
            $cred = $request->only(['email', 'password']);
            // $cred['password'] = bcrypt( $cred['password'] );
            if(Auth::attempt($cred))
            {
                Session::regenerate();
                return redirect(to: route('vehiculos.index'));
            }
            // return back()->withError('Error en sus credenciales');
            return inertia('Login/Index', [
                'errors' => ['credentials' => true]
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return inertia('Login/Index', [
                'errors' => ['credentials' => true]
            ]);

        }
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return to_route('login');
    }
}
