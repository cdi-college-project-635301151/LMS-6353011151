@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Author Registration Form') }}</div>
                <div class="card-body">

                    <form action="{{ route('authors.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="author_code" value="{{ $author_code }}">
                        <input type="hidden" name="is_enabled" value="1">
                        {{-- full name --}}
                        <div class="row mb-3">
                            <label for="full_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="full_name"
                                    class="form-control @error('full_name') is-invalid @enderror"
                                    value="{{ old('full_name') }}" autofocus>
                                @error('full_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-sm btn-primary">Register Author</button>
                            <a href="{{ route('authors.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
