<?php

namespace App\Http\Controllers;

use App\Models\BorrowersModel;
use App\Models\BorrowersTypeModel;
use App\Models\MembersModel;
use App\Models\ViewBorrowersRecordsModel;
use App\Models\ViewDocumentsModel;
use App\Rules\OverlappingRequestRule;
use Illuminate\Http\Request;

class MemberLendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $member = MembersModel::where('member_code', $request->member_code)->first();
        $document = ViewDocumentsModel::where('document_code', $request->code)->first();
        $documentCode = $request->code;

        $type = BorrowersTypeModel::where('borrower_type_id', $request->type)->first();
        return view('lending.index', ['member' => $member, 'document' => $document, 'documentCode' => $documentCode, 'type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lendingRequest =  ViewBorrowersRecordsModel::where('member_code', $request->member_code)->where('document_code', $request->document_code)->whereIn('status', array('P', 'A'))->first();

        $request->validate([
            'borrower_name' => [
                'required', 'min:3', 'max:30', 'exists:vw_members,full_name',
                new OverlappingRequestRule($lendingRequest)
            ],
            'pick_up_date' => ['required', 'date', 'before_or_equal:return_date'],
            'return_date' => ['required', 'date', 'after_or_equal:pick_up_date']
        ]);


        $request->merge([
            'from_date' => $request->pick_up_date,
            'to_date' => $request->return_date,
            'member_code' => $request->member_code,
            'status' => 'P',
            'is_returned' => 'P',
            'is_checked_out' => 'P'
        ]);

        BorrowersModel::create($request->all());

        return redirect()->route('documents.index')->with('success', 'Your request has been submitted and will be processed by an employee.');
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
