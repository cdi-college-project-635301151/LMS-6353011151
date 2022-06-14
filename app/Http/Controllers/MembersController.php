<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\MembersModel;
use App\Models\ViewMembersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = ViewMembersModel::paginate(15);
        return view('members.index', compact('members'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberCode = Str::random(10);
        return view('members.register', ['memberCode' => $memberCode]);
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
            'first_name' => ['required', 'min:3', 'max:30'],
            'last_name' => ['required', 'min:3', 'max:30'],
            'telephone' => ['required', 'min:10', 'max:13'],
            'email' => ['required', 'email', 'max:50', 'unique:tbl_members'],
            'street_name' => ['required', 'min:5', 'max:50'],
            'city' => ['required', 'min:3', 'max:30'],
            'province' => ['required', 'min:2', 'max:3'],
            'postal' => ['required', 'min:3', 'max:7']
        ]);

        MembersModel::create($request->all());
        AddressModel::create($request->all());

        return redirect()->route('members.index')->with('success', 'New member was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function show(MembersModel $membersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewMembersModel $member)
    {
        return view('members.update', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembersModel  $membersModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembersModel $membersModel)
    {
        $request->validate([
            'first_name' => ['required', 'min:3', 'max:30'],
            'last_name' => ['required', 'min:3', 'max:30'],
            'telephone' => ['required', 'min:10', 'max:13'],
            'email' => ['required', 'email', 'max:50'],
            'street_name' => ['required', 'min:5', 'max:50'],
            'city' => ['required', 'min:3', 'max:30'],
            'province' => ['required', 'min:2', 'max:3'],
            'postal' => ['required', 'min:3', 'max:7']
        ]);

        try {
            $membersModel->where('member_code', $request->member_code)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'telephone' => $request->telephone,
                    'email' => $request->email
                ]);

            AddressModel::where('member_code', $request->member_code)
                ->update([
                    'street_name' => $request->street_name,
                    'city' => $request->city,
                    'province' => $request->province,
                    'postal' => $request->postal
                ]);

            return redirect()->route('members.index')->with('success', 'Member information was updated successfully.');
        } catch (\Exception $err) {
            return redirect()->route('members.update', $request->member_code)->with('error', $err);
        }
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
