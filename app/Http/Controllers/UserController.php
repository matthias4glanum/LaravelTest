<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(CreateUserRequest $request)
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
        return redirect()->route('user.index', ['user' => $user->id])->with('success', "Un nouvel utilisateur a bien été ajouté");
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $this->validate($request,([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|string',
            'type' => 'required|string'
        ]));


        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'type' => $request->type,
            'updated_at' => now()
        ]);

        return redirect()->route('user.index', ['user' => $user->id])->with('success', "L'utilisateur a bien été modifié");
    }

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        return Redirect::route('user.index')->with('success', "L'utilisateur a bien été supprimé");
    }

    public function countType()
    {
        User::all()->groupBy('type')->map(function ($type) {
        return $type->count();
        });
    }
}
