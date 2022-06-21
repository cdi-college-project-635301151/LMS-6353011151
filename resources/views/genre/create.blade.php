@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                @include('layouts.success')
            @endif

            <div class="card">
                <div class="card-header">{{ __('Genre Category Form') }}</div>
                <div class="card-body">
                    <form action="{{ route('genre.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="is_enabled" value="1">
                        <input type="hidden" name="genre_code" value="{{ $genreCode }}">
                        {{-- Short Description --}}
                        <div class="row mb-3">
                            <label for="short_desc"
                                class="col-md-4 col-form-label text-md-end">{{ __('Short Description') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="short_desc"
                                    class="form-control @error('short_desc') is-invalid @enderror"
                                    value="{{ old('short_desc') }}" autofocus>
                                @error('short_desc')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Long Description --}}
                        <div class="row mb-3">
                            <label class="col-md-4 col-form label text-md-end">{{ __('Long Description') }}</label>
                            <div class="col-md-8">
                                <textarea name="long_desc" cols="10" rows="3" class="form-control @error('long_desc') is-invalid @enderror" autofocus>{{ old('long_desc') }}</textarea>
                                @error('long_desc')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- save add new --}}
                        <div class="row mb-3">
                            <label for="createAddNew" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <input type="checkbox" class="form-check-input" name="createAddNew">
                                <label class="form-check-label text-primary" for="createAddNew">
                                    <i>{{ __('Create & Add New') }} ?</i>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create Genre') }}
                                </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('genre.index') }}">
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
