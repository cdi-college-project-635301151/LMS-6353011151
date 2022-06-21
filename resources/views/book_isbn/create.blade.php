@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">


        <div class="col-md-8">
            @if ($message = Session::get('success'))
                @include('layouts.success')
            @endif


            <div class="card">
                <div class="card-header">{{ __('Create ISBN Form') }}</div>
                <div class="card-body">

                    <form action="{{ route('book-isbn.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="isbn_code" value="{{ $book_code }}">
                        <input type="hidden" name="is_enabled" value="1">
                        {{-- ISBN --}}
                        <div class="row mb-3">
                            <label for="isbn_desc" class="col-md-4 col-form-label text-md-end">{{ __('ISBN') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="isbn_desc"
                                    class="form-control @error('isbn_desc') is-invalid @enderror"
                                    value="{{ old('isbn_desc') }}" autofocus>
                                @error('isbn_desc')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Short Description --}}
                        <div class="row mb-3">
                            <label for="short_desc"
                                class="col-md-4 col-form-label text-md-end">{{ __('Short Description') }}</label>
                            <div class="col-md-8">
                                <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" rows="3">{{ old('short_desc') }}</textarea>
                                @error('short_desc')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="saveAddNew"></label>
                            <div class="col-md-8">
                                <input type="checkbox" class="form-check-input" name="saveAddNew">
                                <label class="form-check-label" for="saveAddNew">Create & Add New</label>
                            </div>

                        </div>

                        {{-- Submit --}}
                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create ISBN') }}
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
