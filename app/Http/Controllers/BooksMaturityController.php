<?php

namespace App\Http\Controllers;

use App\Models\BooksMaturityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksMaturityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maturity = BooksMaturityModel::paginate(10);
        return view('book_maturity.index', compact('maturity'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maturityCode = Str::random(10);
        return view('book_maturity.create', ['maturityCode' => $maturityCode]);
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
            'short_desc' => ['required', 'min:3', 'max:150'],
            'long_desc' => ['required', 'min:3', 'max:150'],
        ]);

        BooksMaturityModel::create($request->all());

        return redirect()->route('book_maturity.index')->with('success', 'New Book maturity category has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function show($maturityCode)
    {
        $maturity = BooksMaturityModel::where('maturity_code', $maturityCode)->first();
        return view('book_maturity.update', ['maturity' => $maturity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BooksMaturityModel $bookMaturityModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'short_desc' => ['required', 'min:3', 'max:150'],
            'long_desc' => ['required', 'min:3', 'max:150'],
        ]);

        BooksMaturityModel::where('maturity_code', $request->maturity_code)->update([
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'is_enabled' => $request->is_enabled
        ]);

        return redirect()->route('maturity.index')->with('success', 'Maturity category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BooksMaturityModel $bookMaturityModel)
    {
        //
    }
}
