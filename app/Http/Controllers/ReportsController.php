<?php

namespace App\Http\Controllers;

use App\Models\ViewBorrowersRecordsModel;
use App\Models\ViewMembersModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->report_name) {
            case 'members':
                $members = ViewMembersModel::get();
                return view('reports.member-reports', compact('members'));
                break;
            case 'overdue':
                $documents = ViewBorrowersRecordsModel::where('status', '!=', 'C')->get();
                return view('reports.document-delay-reports', compact('documents'));
                break;
            case 'reserved':
                $documents = ViewBorrowersRecordsModel::where('transaction_type', '1')
                    ->orderBy('from_date', 'desc')
                    ->get();
                return view('reports.reserved', compact('documents'));
                break;
            case 'loaned':
                $documents = ViewBorrowersRecordsModel::where('transaction_type', '2')
                    ->orderBy('from_date', 'desc')
                    ->get();
                return view('reports.loaned', compact('documents'));
                break;
        }
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
