<?php

namespace App\Http\Controllers;

use App\Models\MembersModel;
use App\Models\SystemUsersViewModel;
use App\Models\User;
use App\Models\UserTypeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SystemUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usersViewModel = new SystemUsersViewModel;
        // $users = $usersViewModel->paginate(5);

        // return view('system-users.index', compact('users'))->with(request()->input('page'));

        $users = SystemUsersViewModel::get();
        return view('system-users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberList = MembersModel::whereNotIn('member_code', User::select('member_code')->get())->get();
        $tempPassword = Str::random(10);

        return view(
            'system-users.create',
            [
                'userTypes' => UserTypeModel::get(),
                'memberLists' => $memberList,
                'tempPassword' => $tempPassword
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_code' => 'required',
            'user_type' => 'required',
            'password' => 'required',
        ]);

        // $user = new User;
        $dateNow = Carbon::now();

        $member = MembersModel::where('member_code', $request->member_code)->first();

        $data = [
            'name' => $member->first_name . ' ' . $member->last_name,
            'email' => $member->email,
            'email_verified_at' => $dateNow,
            'member_code' => $request->member_code,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
            'remember_token' => $request->_token,
            'is_blocked' => '0'
        ];

        $request->merge($data);

        User::create($request->all());

        return redirect()->route('sys-users.index')->with('success', 'New system user has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(SystemUsersViewModel $user)
    {
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemUsersViewModel $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
