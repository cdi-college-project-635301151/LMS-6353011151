<?php

namespace App\Http\Controllers;

use App\Models\BookIsbnModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class BookIsbnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isbnModel = new BookIsbnModel;
        $records = $isbnModel->paginate(15);

        return view('book_isbn.index', compact('records'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookCode = Str::random(20);
        return view('book_isbn.create', ['book_code' => $bookCode]);
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
            'isbn_desc' => ['required', 'min:9', 'max:12', 'unique:tbl_books_isbn'],
            'short_desc' => ['required', 'min:3', 'max:100']
        ]);

        BookIsbnModel::create($request->all());

        return $request->saveAddNew == 'on' ?
            redirect()->route('book-isbn.create')->with('success', 'New ISBN has been created') :
            redirect()->route('book-isbn.index')->with('success', 'New ISBN has been created');
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
