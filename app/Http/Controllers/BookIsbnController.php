<?php

namespace App\Http\Controllers;

use App\Models\BookIsbnModel;
use Illuminate\Http\Request;

class BookIsbnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book_isbn.index');
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
     * @param  \App\Models\BookIsbnModel  $bookIsbnModel
     * @return \Illuminate\Http\Response
     */
    public function show(BookIsbnModel $bookIsbnModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookIsbnModel  $bookIsbnModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BookIsbnModel $bookIsbnModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookIsbnModel  $bookIsbnModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookIsbnModel $bookIsbnModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookIsbnModel  $bookIsbnModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookIsbnModel $bookIsbnModel)
    {
        //
    }
}
