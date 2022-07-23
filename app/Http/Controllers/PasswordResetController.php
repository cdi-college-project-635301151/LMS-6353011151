<?php

namespace App\Http\Controllers;

use App\Models\MembersModel;
use App\Models\User;
use App\Models\ViewMembersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $temp_password = Str::random(10);
        $member = MembersModel::where('member_code', $request->member_code)->first();
        return view(
            'password-reset.index',
            [
                'temp_password' => $temp_password,
                'member' => $member
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function show(MembersModel $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MembersModel $membersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembersModel $member)
    {
        $request->validate([
            'new_password' => ['required', 'min:6', 'max:12'],
            'repeat_password' => ['required', 'min:6', 'max:12', 'same:new_password']
        ]);

        User::where('member_code', $request->member_code)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('sys-users.index')->with('success', 'Password reset successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembersModel $membersModel)
    {
        //
    }
}
