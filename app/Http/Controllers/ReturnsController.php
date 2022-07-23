<?php

namespace App\Http\Controllers;

use App\Models\ViewBorrowersRecordsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = [];
        if ($request->return_status == 'pending') {
            $requests = ViewBorrowersRecordsModel::where('status', 'A')->where('is_checked_out', 'A')->where('is_returned', 'P')->get();
        } else if ($request->return_status == 'completed') {
            $requests = ViewBorrowersRecordsModel::where('status', 'D')->where('is_checked_out', 'A')->where('is_returned', 'D')->get();
        } else if ($request->return_status == 'late') {
            //Late Documents
            $requests = ViewBorrowersRecordsModel::where('status', 'A')->where('is_returned', 'P')->whereDate('to_date', '<', Carbon::today()->toDateString())->get();
        }

        return view('returns.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $result = ViewBorrowersRecordsModel::where('member_code', $request->member_code)->where('document_code', $request->document_code)->where('id', $request->request_id)->first();
        $reserved = ViewBorrowersRecordsModel::where('document_code', $request->document_code)
            ->where('is_checked_out', 'P')
            ->where('description', 'reservation')
            ->orderBy('from_date', 'asc')->first();

        return view('returns.update', [
            'result' => $result,
            'reserved' => $reserved,
        ]);
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
            'remarks' => ['required', 'min:3', 'max:200']
        ]);

        ViewBorrowersRecordsModel::where('id', $request->request_id)
            ->where('member_code', $request->member_code)
            ->where('document_code', $request->document_code)
            ->update([
                'is_returned' => 'D',
                'status' => 'D',
                'remarks' => $request->remarls,
            ]);

        return redirect()->route('returns.index', ['return_status' => 'pending'])->with('success', 'Document successfully returned.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViewBorrowersRecordsModel  $viewBorrowersRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function show(ViewBorrowersRecordsModel $viewBorrowersRecordsModel)
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
    public function update(Request $request, ViewBorrowersRecordsModel $viewBorrowersRecordsModel)
    {
        //
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
