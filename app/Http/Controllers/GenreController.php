<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = GenreModel::paginate(10);
        return view('genre.index', compact('genres'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genreCode = Str::random(20);
        return view('genre.create', ['genreCode' => $genreCode]);
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
            'long_desc' => ['required', 'min:3', 'max:150']
        ]);

        GenreModel::create($request->all());

        return $request->createAddNew == 'on' ?
            redirect()->route('genre.create')->with('success', 'New book genre has been created') :
            redirect()->route('genre.index')->with('success', 'New book genre has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BooksGenreModel  $booksGenreModel
     * @return \Illuminate\Http\Response
     */
    public function show($genre_code)
    {
        $genre = GenreModel::where('genre_code', $genre_code)->first();
        return view('genre.update', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BooksGenreModel  $booksGenreModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GenreModel $booksGenreModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BooksGenreModel  $booksGenreModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenreModel $booksGenreModel)
    {
        $request->validate([
            'short_desc' => ['required', 'min:3', 'max:50'],
            'long_desc' => ['required', 'min:3', 'max:150']
        ]);

        $booksGenreModel->where('genre_code', $request->genre_code)->update([
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'is_enabled' => $request->is_enabled,
        ]);

        return redirect()->route('genre.index')->with('success', 'Books genre has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BooksGenreModel  $booksGenreModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenreModel $booksGenreModel)
    {
        //
    }
}
