<?php

namespace App\Http\Controllers;

use App\Models\BooksCategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BooksCategoriesModel::paginate(10);
        return view('book_categories.index', compact('categories'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryCode = Str::random(20);
        return view('book_categories.create', ['categoryCode' => $categoryCode]);
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

        BooksCategoriesModel::create($request->all());

        return redirect()->route('categories.index')->with('success', 'New Category has been creadted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BooksCategoriesModel  $booksCategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function show($categoryCode)
    {
        $category = BooksCategoriesModel::where('category_code', $categoryCode)->first();
        return view('book_categories.update', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BooksCategoriesModel  $booksCategoriesModel
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
     * @param  \App\Models\BooksCategoriesModel  $booksCategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'short_desc' => ['required', 'min:3', 'max:50'],
            'long_desc' => ['required', 'min:3', 'max:150'],
        ]);

        BooksCategoriesModel::where('category_code', $request->category_code)->update([
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc
        ]);

        return redirect()->route('categories.index')->with('success', 'Successfully update a category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BooksCategoriesModel  $booksCategoriesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryCode)
    {
        # code...
    }
}
