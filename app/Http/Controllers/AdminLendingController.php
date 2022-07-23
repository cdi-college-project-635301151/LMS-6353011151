<?php

namespace App\Http\Controllers;

use App\Models\BorrowersModel;
use App\Models\BorrowersTypeModel;
use App\Models\MembersModel;
use App\Models\ViewBorrowersRecordsModel;
use App\Models\ViewDocumentsModel;
use App\Models\ViewMembersModel;
use App\Rules\OverlappingRequestRule;
use App\Rules\ValidMemberPhoneNumberRule;
use Illuminate\Http\Request;

class AdminLendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $requestType = BorrowersTypeModel::where('description', $request->request_type)->first();
        $members = ViewMembersModel::get();
        $document = ViewDocumentsModel::where('document_code', $request->doc_code)->first();

        return view(
            'lending.admin-request',
            [
                'requestType' => $requestType,
                'members' => $members,
                'document' => $document
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
        $member = ViewMembersModel::where('full_name', $request->borrower_name)->where('telephone', $request->phone_number)->first();
        $lendingRequest = null;

        if ($member != null) {
            $lendingRequest =  ViewBorrowersRecordsModel::where('member_code', $member->member_code)->where('document_code', $request->document_code)->whereIn('status', array('P', 'A'))->first();
        }

        $request->validate([
            'phone_number' => ['required', new ValidMemberPhoneNumberRule($member)],
            'borrower_name' => ['required', 'exists:vw_members,full_name', new OverlappingRequestRule($lendingRequest)],
            'pick_up_date' => ['required', 'before_or_equal:return_date'],
            'return_date' => ['required', 'after_or_equal:pick_up_date']
        ]);

        $request->merge([
            'member_code' => $member->member_code,
            'from_date' => $request->pick_up_date,
            'to_date' => $request->return_date,
            'is_checked_out' => 'P',
            'is_returned' => 'P',
            'status' => 'A',
            'remarks' => ''
        ]);

        BorrowersModel::create($request->all());

        return redirect()->route('admin-requests.index', ['request_statu' => 'approved'])->with('success', "Transaction has been successfully posted.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
