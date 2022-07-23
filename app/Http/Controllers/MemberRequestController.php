<?php

namespace App\Http\Controllers;

use App\Models\BorrowersMOdel;
use App\Models\ViewBorrowersRecordsModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MemberRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactionType = $request->transaction_type ? $request->transaction_type : '';
        $transactions = ViewBorrowersRecordsModel::where('transaction_type', 'like', '%' . $transactionType)
            ->Where('member_code', $request->member_code)
            ->orderBy('status', 'asc')
            ->orderBy('transaction_type', 'desc')
            ->get();

        return view('member-request.index', ['transactions' => $transactions, 'request_type' => $request->transaction_type]);
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
     * @param  \App\Models\BorrowersMOdel  $borrowersMOdel
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowersMOdel $borrowersMOdel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowersMOdel  $borrowersMOdel
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowersMOdel $borrowersMOdel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowersMOdel  $borrowersMOdel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        BorrowersMOdel::where('id', $request->id)->where('member_code', $request->member_code)->update([
            'is_checked_out' => 'A'
        ]);

        if ($request->request_type != '')
            return  redirect()->route('member-requests.index', ['member_code' => $request->member_code, 'request_type' => $request->request_type])->with('success', 'Transaction complete.');
        else
            return redirect()->route('member-requests.index', ['member_code' => $request->member_code])->with('success', 'Transaction complete.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowersMOdel  $borrowersMOdel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowersMOdel $borrowersMOdel)
    {
        //
    }
}
