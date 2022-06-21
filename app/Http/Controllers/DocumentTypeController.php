<?php

namespace App\Http\Controllers;

use App\Models\DocumentTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentTypeModel::get();
        return view('document_types.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doc_type_code = Str::random(20);
        return view('document_types.create', ['doc_type_code' => $doc_type_code]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['short_desc' => ['required', 'min:3', 'max:50']]);
        DocumentTypeModel::create($request->all());

        return redirect()->route($request->createAddNew == 'on' ? 'documents-types.create' : 'documents-types.index')->with('success', 'New Document type has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentTypeModel  $documentTypeModel
     * @return \Illuminate\Http\Response
     */
    public function show($docTypeCode)
    {
        $documentType = DocumentTypeModel::where('doc_type_code', $docTypeCode)->first();
        return view('document_types.update', ['documentType' => $documentType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentTypeModel  $documentTypeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentTypeModel $documentTypeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentTypeModel  $documentTypeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentTypeModel $documentTypeModel)
    {
        $request->validate(['short_desc' => ['required', 'min:3', 'max:50']]);
        $documentTypeModel->where('doc_type_code', $request->doc_type_code)->update([
            'short_desc' => $request->short_desc,
            'is_enabled' => $request->is_enabled
        ]);

        return redirect()->route('documents-types.index')->with('success', 'Document Type has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentTypeModel  $documentTypeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentTypeModel $documentTypeModel)
    {
        //
    }
}
