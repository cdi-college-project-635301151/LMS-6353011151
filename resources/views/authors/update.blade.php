@extends('layouts.app')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Author Registration Form') }}</div>
            <div class="card-body">

                <form action="{{ route('authors.update', $author->author_code) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="is_enabled" value="{{ $author->is_enabled }}">
                    <input type="hidden" name="author_code" value="{{ $author->author_code }}">

                    {{-- first name --}}
                    <div class="row mb-3">
                        <label for="short_desc"
                            class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ $author->first_name }}" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Last Name --}}
                    <div class="row mb-3">
                        <label for="short_desc"
                            class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ $author->last_name }}" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('Update Author') }}</button>
                        <a href="{{ route('authors.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
