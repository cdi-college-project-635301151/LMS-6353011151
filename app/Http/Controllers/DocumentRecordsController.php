<?php

namespace App\Http\Controllers;

use App\Models\AuthorsModel;
use App\Models\BookIsbnModel;
use App\Models\CategoriesModel;
use App\Models\DocumentRecordsModel;
use App\Models\DocumentsModel;
use App\Models\DocumentTypeModel;
use App\Models\GenreModel;
use App\Models\MaturityModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = DocumentRecordsModel::paginate(10);
        return view('documents.index', compact('documents'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorList = AuthorsModel::where('is_enabled', '1')->get();
        $documentTypeList = DocumentTypeModel::where('is_enabled', '1')->get();
        $maturityList = MaturityModel::where('is_enabled', '1')->get();
        $genreList = GenreModel::where('is_enabled', '1')->get();
        $categoryList = CategoriesModel::where('is_enabled', '1')->get();

        return view('documents.create', [
            'authorList' => $authorList,
            'documentTypeList' => $documentTypeList,
            'maturityList' => $maturityList,
            'genreList' => $genreList,
            'categoryList' => $categoryList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = Carbon::now()->format('Y');
        $categories = new CategoriesModel;
        $authors = new AuthorsModel;
        $genres = new GenreModel;
        $maturities = new MaturityModel;
        $documentRecords = new DocumentRecordsModel;
        $documentTypes = new DocumentTypeModel;
        $documents = new DocumentsModel;

        $document_code = Str::random(10);

        $request->validate([
            'doc_title' => ['required', 'min:3', 'max:75', 'unique:tbl_document_records'],
            'summary' => ['required', 'min:3', 'max:100'],
            'author_name' => ['required', 'min:3', 'max:80'],
            'isbn_number' => ['nullable', 'min:10', 'max:15', 'unique:tbl_document_records'],
            'publication_year' => ['required', 'integer', 'min:1900', 'max:' . $year],
            'quantity' => ['required', 'integer', 'min:0'],
            'doc_type_name' => ['required', 'min:3', 'max:50',],
            'maturity_name' => ['required', 'min:3', 'max:50',],
            'genre_name' => ['required', 'min:3', 'max:50',],
            'category_name' => ['required', 'min:3', 'max:50',],
        ]);

        $author = $authors->where('author_name', $request->author_name)->first();
        $author_code = !empty($author) ? $author->author_code : Str::random(10);

        $category = $categories->where('short_desc', $request->category_name)->first();
        $categor_code = !empty($category) ? $category->category_code : Str::random(10);

        $genre = $genres->where('short_desc', $request->genre_name)->first();
        $genre_code = !empty($genre) ? $genre->genre_code : Str::random(10);

        $maturity = $maturities->where('short_desc', $request->maturity_name)->first();
        $maturity_code = !empty($maturity) ? $maturity->maturity_code : Str::random(10);

        $documentType = $documentTypes->where('short_desc', $request->doc_type_name)->first();
        $doc_type_code = !empty($documentType) ? $documentType->doc_type_code : Str::random(10);

        $request->merge([
            'document_code' => $document_code,
            'author_code' => $author_code,
            'category_code' => $categor_code,
            'genre_code' => $genre_code,
            'maturity_code' => $maturity_code,
            'doc_type_code' => $doc_type_code,
            'short_desc' => $request->summary,
            'is_enabled' => '1',
            'author' => [
                'author_code' => $author_code,
                'author_name' => $request->author_name,
                'is_enabled' => '1'
            ],
            'category' => [
                'category_code' => $categor_code,
                'short_desc' => $request->category_name,
                'long_desc' => $request->category_name,
                'is_enabled' => '1'
            ],
            'genre' => [
                'genre_code' => $genre_code,
                'short_desc' => $request->genre_name,
                'long_desc' => $request->genre_name,
                'is_enabled' => '1',
            ],
            'maturity' => [
                'maturity_code' => $maturity_code,
                'short_desc' => $request->maturity_name,
                'long_desc' => $request->maturity_name,
                'is_enabled' => '1'
            ],
            'document_type' => [
                'doc_type_code' => $doc_type_code,
                'short_desc' => $request->doc_type_name,
                'is_enabled' => '1'
            ],
            'documents' => [
                'document_code' => $document_code,
                'doc_type_code' => $doc_type_code,
                'maturity_code' => $maturity_code,
                'genre_code' => $genre_code,
                'category_code' => $categor_code,
                'is_enabled' => '1'
            ]
        ]);

        if (empty($author)) {
            $authors->create($request->author);
        }

        if (empty($documentType)) {
            $documentTypes->create($request->document_type);
        }

        if (empty($maturity)) {
            $maturities->create($request->maturity);
        }

        if (empty($genre)) {
            $genres->create($request->genre);
        }

        if (empty($category)) {
            $categories->create($request->category);
        }

        $documents->create($request->documents);
        $documentRecords->create($request->all());

        return redirect()->route(
            $request->saveAddNew == 'on' ? 'documents.create' : 'documents.index'
        )->with('success', 'New document has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentRecordsModel  $documentRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentRecordsModel $documentRecordsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentRecordsModel  $documentRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentRecordsModel $documentRecordsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentRecordsModel  $documentRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentRecordsModel $documentRecordsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentRecordsModel  $documentRecordsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentRecordsModel $documentRecordsModel)
    {
        //
    }
}
