@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                @include('layouts.success')
            @endif

            <div class="card">
                <div class="card-header">{{ __('Create Book Form') }}</div>
                <div class="card-body">

                    <form action="{{ route('documents.store') }}" method="POST">
                        @csrf
                        {{-- Document Title --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('doc_title') is-invalid @enderror"
                                name="doc_title" placeholder="Book Title" value="{{ old('doc_title') }}"
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
                                placeholder="Summary" style="height: 100px" onblur="this.value = this.value.trimAll();">{{ old('summary') }}</textarea>
                            <label for="short_desc">Summary</label>
                            @error('summary')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Author Name --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('author_name') is-invalid @enderror"
                                name="author_name" placeholder="Author Name" value="{{ old('author_name') }}"
                                list="author_list" onblur="this.value = this.value.trimAll();">
                            <datalist id="author_list">
                                @foreach ($authorList as $author)
                                    <option value="{{ $author->author_name }}">
                                @endforeach
                            </datalist>
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
                                        name="isbn_number" placeholder="0-1234-5678-9" value="{{ old('isbn_number') }}"
                                        onblur="this.value = this.value.trimAll();">
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
                                        placeholder="Publication Year" value="{{ old('publication_year') }}"
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
                                        value="{{ old('quantity') }}" onblur="this.value = this.value.trimAll();">
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
                                <input type="text" class="form-control @error('doc_type_name') is-invalid @enderror"
                                    name="doc_type_name" placeholder="Document Type" value="{{ old('doc_type_name') }}"
                                    list="doc_type_list" onblur="this.value = this.value.trimAll();">
                                <datalist id="doc_type_list">
                                    @foreach ($documentTypeList as $documentType)
                                        <option value="{{ $documentType->short_desc }}">
                                    @endforeach
                                </datalist>
                                <label for="doc_type_name">Document Type</label>
                                @error('doc_type_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3 col-md">
                                <input type="text" class="form-control @error('maturity_name') is-invalid @enderror"
                                    name="maturity_name" placeholder="Document Type" value="{{ old('maturity_name') }}"
                                    list="maturity_list" onblur="this.value = this.value.trimAll();">
                                <datalist id="maturity_list">
                                    @foreach ($maturityList as $maturity)
                                        <option value="{{ $maturity->short_desc }}">
                                    @endforeach
                                </datalist>
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
                                <input type="text" class="form-control @error('genre_name') is-invalid @enderror"
                                    name="genre_name" placeholder="Genre" value="{{ old('genre_name') }}"
                                    list="genre_list" onblur="this.value = this.value.trimAll();">
                                <datalist id="genre_list">
                                    @foreach ($genreList as $genre)
                                        <option value="{{ $genre->short_desc }}">
                                    @endforeach
                                </datalist>
                                <label for="genre_name">Genre</label>
                                @error('genre_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="form-floating mb-3 col-md">
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                    name="category_name" placeholder="Category" value="{{ old('category_name') }}"
                                    list="category_list" onblur="this.value = this.value.trimAll();">
                                <datalist id="category_list">
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->short_desc }}">
                                    @endforeach
                                </datalist>
                                <label for="category_name">Category</label>
                                @error('category_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- save add new --}}
                        <div class="col-md gap-2 d-md-flex justify-content-md-end mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="saveAddNew" name="saveAddNew">
                                <label class="form-check-label text-primary" for="saveAddNew">Save and Add New ?</label>
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Book Record') }}
                                </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('book-isbn.index') }}">
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
