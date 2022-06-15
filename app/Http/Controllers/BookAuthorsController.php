<?php

namespace App\Http\Controllers;

use App\Models\BookAuthorsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = BookAuthorsModel::paginate(15);

        return view('authors.index', compact('authors'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorCode = Str::random(10);
        return view('authors.create', ['author_code' => $authorCode]);
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
            'author_code' => ['required'],
            'first_name' => ['required', 'min:3', 'max:20'],
            'last_name' => ['required', 'min:3', 'max:20'],
        ]);

        BookAuthorsModel::create($request->all());

        return redirect()->route('authors.index')->with('success', 'New Author successfully registerd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookAuthorsModel  $bookAuthorsModel
     * @return \Illuminate\Http\Response
     */
    public function show($authorCode)
    {
        $author = BookAuthorsModel::where('author_code', $authorCode)->first();
        return view('authors.update', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookAuthorsModel  $bookAuthorsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BookAuthorsModel $bookAuthorsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookAuthorsModel  $bookAuthorsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookAuthorsModel $bookAuthorsModel)
    {
        $request->validate([
            'author_code' => ['required'],
            'first_name' => ['required', 'min:3', 'max:20'],
            'last_name' => ['required', 'min:3', 'max:20'],
        ]);

        BookAuthorsModel::where('author_code', $request->author_code)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'is_enabled' => $request->is_enabled,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookAuthorsModel  $bookAuthorsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAuthorsModel $bookAuthorsModel)
    {
        //
    }
}
