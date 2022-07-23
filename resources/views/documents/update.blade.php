@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Update Document') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.update', $document->document_code) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="document_code" value="{{ $document->document_code }}">
                        {{-- Document Title --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('doc_title') is-invalid @enderror"
                                name="doc_title" placeholder="Book Title" value="{{ $document->doc_title }}"
                                onblur="this.value = this.value.trimAll();">
                            <label for="doc_title">Title</label>
                            @error('doc_title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Short Description --}}
                        <div class="form-floating mb-3">
                            <textarea name="summary" rows="50" class="form-control @error('summary') is-invalid @enderror"
                                placeholder="Summary" style="height: 100px" onblur="this.value = this.value.trimAll();">{{ $document->doc_short_desc }}</textarea>
                            <label for="summary">Summary</label>
                            @error('summary')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Author Name --}}
                        <div class="form-floating mb-3">
                            <select class="form-select @error('author_name') is-invalid @enderror" name="author_name"
                                aria-label="author_name">
                                @foreach ($authorList as $author)
                                    <option @if ($author->author_code == $document->author_code) selected @endif
                                        value="{{ $author->author_code }}">{{ $author->author_name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="author_name">Author</label>
                            @error('author_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row g-2 mb-3">
                            {{-- ISBN Number --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('isbn_number') is-invalid @enderror"
                                        name="isbn_number" placeholder="0-1234-5678-9"
                                        value="{{ $document->isbn_number }}" onblur="this.value = this.value.trimAll();">
                                    <label for="isbn_number">ISBN Number</label>
                                    @error('isbn_number')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Publication Year --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" name="publication_year"
                                        class="form-control @error('publication_year') is-invalid @enderror"
                                        placeholder="Publication Year" value="{{ $document->publication_year }}"
                                        onblur="this.value = this.value.trimAll();">
                                    <label for="publication_year">Publication Year</label>
                                    @error('publication_year')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Quantity --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity"
                                        value="{{ $document->quantity }}" onblur="this.value = this.value.trimAll();">
                                    <label for="quantity">Quantity</label>
                                    @error('quantity')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row g-2 mb-3">
                            {{-- Document Type --}}
                            <div class="form-floating mb-3 col-md">
                                <select class="form-select @error('doc_type_name') is-invalid @enderror"
                                    name="doc_type_name" aria-label="doc_type_name">
                                    @foreach ($documentTypeList as $documentType)
                                        <option @if ($documentType->doc_type_code == $document->doc_type_code) selected @endif
                                            value="{{ $documentType->doc_type_code }}">{{ $documentType->short_desc }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="doc_type_name">Document Type</label>
                                @error('doc_type_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Maturity --}}
                            <div class="form-floating mb-3 col-md">
                                <select class="form-select @error('maturity_name') is-invalid @enderror"
                                    name="maturity_name" aria-label="maturity_name">
                                    @foreach ($maturityList as $maturity)
                                        <option @if ($maturity->maturity_code == $document->maturity_code) selected @endif
                                            value="{{ $maturity->maturity_code }}">{{ $maturity->short_desc }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="maturity_name">Maturity</label>
                                @error('maturity_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-2 mb-3">

                            {{-- Genre --}}
                            <div class="form-floating mb-3 col-md">
                                <select class="form-select @error('genre_name') is-invalid @enderror" name="genre_name"
                                    aria-label="genre">
                                    @foreach ($genreList as $genre)
                                        <option @if ($genre->genre_code == $document->genre_code) selected @endif
                                            value="{{ $genre->genre_code }}">{{ $genre->short_desc }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Genre</label>
                                @error('genre_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="form-floating mb-3 col-md">
                                <select class="form-select @error('category_name') is-invalid @enderror"
                                    name="category_name" aria-label="category_name">
                                    @foreach ($categoryList as $category)
                                        <option @if ($category->category_code == $document->category_code) selected @endif
                                            value="{{ $category->category_code }}">{{ $category->short_desc }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="category_name">Category</label>
                                @error('category_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Record') }}
                                </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('documents.index') }}">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
