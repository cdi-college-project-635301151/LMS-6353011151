<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriesModel::paginate(10);
        return view('categories.index', compact('categories'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryCode = Str::random(20);
        return view('categories.create', ['categoryCode' => $categoryCode]);
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
            'short_desc' => ['required', 'min:3', 'max:50'],
            'long_desc' => ['required', 'min:3', 'max:150'],
        ]);

        CategoriesModel::create($request->all());

        return $request->createAddNew == 'on' ?
            redirect()->route('categories.create')->with('success', 'New Category has been creadted.') :
            redirect()->route('categories.index')->with('success', 'New Category has been creadted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriesModel  $CategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function show($categoryCode)
    {
        $category = CategoriesModel::where('category_code', $categoryCode)->first();
        return view('categories.update', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriesModel  $CategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriesModel  $CategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'short_desc' => ['required', 'min:3', 'max:50'],
            'long_desc' => ['required', 'min:3', 'max:150'],
        ]);

        CategoriesModel::where('category_code', $request->category_code)->update([
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'is_enabled' => $request->is_enabled
        ]);

        return redirect()->route('categories.index')->with('success', 'Successfully update a category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriesModel  $CategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryCode)
    {
        # code...
    }
}
