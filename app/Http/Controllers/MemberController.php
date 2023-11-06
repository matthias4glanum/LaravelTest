<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('member.index', [
            'members' => $members
        ]);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(CreateMemberRequest $request)
    {
        try {
            $member = Member::create($request->validated());
            $member->save();
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
        return redirect()->route('member.index', ['member' => $member->id])->with('success', "Un nouvel utilisateur a bien été ajouté");
    }

    public function update(Request $request)
    {
        $member = Member::find($request->id);

        $this->validate($request,([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|string',
            'charter' => 'boolean',
            'medical_certificate' => 'boolean',
            'payment' => 'boolean',
        ]));


        $member->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'charter' => $request->charter,
            'medical_certificate' => $request->medical_certificate,
            'payment' => $request->payment,
            'updated_at' => now()
        ]);

        return redirect()->route('member.index', ['member' => $member->id])->with('success', "Le membre a bien été modifié");
    }

    public function destroy(Request $request)
    {
        Member::find($request->id)->delete();

        return Redirect::route('member.index')->with('success', "Le membre a bien été supprimé");
    }

    public function countType()
    {
        Member::all()->groupBy('type')->map(function ($type) {
        return $type->count();
        });
    }
}
