<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserRequest;

class AuthController extends Controller
{
    /**
     *
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     *
     *
     * @return response()
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     *
     *
     * @return response()
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('Vous vous êtes connecté avec succès');
        }

        return redirect("login")->with('Oups! Vous avez entré des informations d\'identification invalides');
    }

    /**
     *
     *
     * @return response()
     */
    public function postRegistration(CreateUserRequest $request)
    {
        try {
            $user = User::create($request->validated());
            $user->save();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            report($e);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'exception',
                    $e->getMessage()
                );
        }

        return redirect("dashboard")->with('success', "Un nouvel utilisateur a bien été ajouté");
    }

    /**
     *
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            $users = User::all();

        return view('user.index', [
            'users' => $users
        ]);
            return view('user.index');
        }

        return redirect("login")->with('Oups ! Vous n\'avez pas accès');
    }

    /**
     *
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
