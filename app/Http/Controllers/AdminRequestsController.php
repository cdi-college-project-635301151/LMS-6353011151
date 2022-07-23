<?php

namespace App\Http\Controllers;

use App\Models\BorrowersModel;
use App\Models\BorrowersTypeModel;
use App\Models\ViewBorrowersRecordsModel;
use App\Models\ViewMembersModel;
use App\Rules\OverlappingRequestRule;
use App\Rules\ValidMemberPhoneNumberRule;
use Illuminate\Http\Request;

class AdminRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requestStatus = '';
        if ($request->request_status == 'pending') {
            $requestStatus = 'P';
        } else if ($request->request_status == 'cancelled') {
            $requestStatus = 'C';
        } else {
            $requestStatus = 'A';
        }

        $requests = ViewBorrowersRecordsModel::where('status', $requestStatus)->get();
        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $requestInfo = ViewBorrowersRecordsModel::where('member_code', $request->member_code)->where('id', $request->request_id)->first();
        $borrowType = BorrowersTypeModel::where('borrower_type_id', $requestInfo->transaction_type)->first();
        return view(
            'requests.update',
            [
                'requestInfo' => $requestInfo,
                'borrowType' => $borrowType
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViewBorrowersRecordsModel  $viewBorrowersRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViewBorrowersRecordsModel  $viewBorrowersRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewBorrowersRecordsModel $viewBorrowersRecordsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViewBorrowersRecordsModel  $viewBorrowersRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'pick_up_date' => ['required', 'before_or_equal:return_date'],
            'return_date' => ['required', 'after_or_equal:pick_up_date'],
            'status' => ['required'],
            'remarks' => ['required', 'min:3', 'max:100']
        ]);


        $request->merge([
            'from_date' => $request->pick_up_date,
            'to_date' => $request->return_date,
        ]);

        BorrowersModel::where('id', $request->request_id)->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
            'is_checked_out' => $request->status == 'C' ? 'C' : 'P',
            'is_returned' => $request->status == 'C' ? 'C' : 'P'
        ]);

        $newStatus = $request->status == 'C' ? 'cancelled' : 'apptoved';

        $status = '';
        switch ($request->request_type) {
            case 'C':
                $status = 'cancelled';
                break;
            case 'A':
                $status = 'active';
                break;
            default:
                $status = 'pending';
                break;
        }

        return redirect()->route('admin-requests.index', ['request_status' => $status])->with('success', 'Successfully ' . $newStatus . ' request.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViewBorrowersRecordsModel  $viewBorrowersRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewBorrowersRecordsModel $viewBorrowersRecordsModel)
    {
        //
    }
}
