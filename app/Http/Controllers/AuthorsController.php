<?php

namespace App\Http\Controllers;

use App\Models\AuthorsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = AuthorsModel::get();

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorCode = Str::random(20);
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
            'author_name' => ['required', 'min:3', 'max:20'],
        ]);

        AuthorsModel::create($request->all());

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
        $author = AuthorsModel::where('author_code', $authorCode)->first();
        return view('authors.update', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookAuthorsModel  $bookAuthorsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorsModel $bookAuthorsModel)
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
    public function update(Request $request, AuthorsModel $bookAuthorsModel)
    {
        $request->validate([
            'author_code' => ['required'],
            'author_name' => ['required', 'min:3', 'max:20'],
        ]);

        AuthorsModel::where('author_code', $request->author_code)->update([
            'full_name' => $request->author_name,
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
    public function destroy(AuthorsModel $bookAuthorsModel)
    {
        //
    }
}
