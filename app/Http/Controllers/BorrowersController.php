<?php

namespace App\Http\Controllers;

use App\Models\BorrowersModel;
use App\Models\BorrowersTypeModel;
use App\Models\MembersModel;
use App\Models\ViewDocumentsModel;
use App\Models\ViewMembersModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowersModel  $borrowersModel
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowersModel $borrowersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowersModel  $borrowersModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowersModel $borrowersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowersModel  $borrowersModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorrowersModel $borrowersModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowersModel  $borrowersModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowersModel $borrowersModel)
    {
        //
    }
}
