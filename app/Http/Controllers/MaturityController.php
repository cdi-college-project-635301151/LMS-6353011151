<?php

namespace App\Http\Controllers;

use App\Models\MaturityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaturityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maturity = MaturityModel::paginate(10);
        return view('maturity.index', compact('maturity'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maturityCode = Str::random(20);
        return view('maturity.create', ['maturityCode' => $maturityCode]);
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

        MaturityModel::create($request->all());

        return $request->createAddNew == 'on' ?
            redirect()->route('maturity.create')->with('success', 'New Book maturity category has been created') :
            redirect()->route('maturity.index')->with('success', 'New Book maturity category has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function show($maturityCode)
    {
        $maturity = MaturityModel::where('maturity_code', $maturityCode)->first();
        return view('maturity.update', ['maturity' => $maturity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookMaturityModel  $bookMaturityModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MaturityModel $bookMaturityModel)
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

        MaturityModel::where('maturity_code', $request->maturity_code)->update([
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
    public function destroy(MaturityModel $bookMaturityModel)
    {
        //
    }
}
