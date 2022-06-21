@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    @include('layouts.success')
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Create Category') }}</div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="is_enabled" value="1">
                            <input type="hidden" name="category_code" value="{{ $categoryCode }}">
                            {{-- Short Description --}}
                            <div class="row mb-3">
                                <label for="short_desc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Short Description') }}</label>
                                <div class="col-md-8">
                                    <input type="text" name="short_desc"
                                        class="form-control @error('short_desc') is-invalid @enderror"
                                        value="{{ old('short_desc') }}">
                                    @error('short_desc')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Long Description --}}
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Long Description') }}</label>
                                <div class="col-md-8">
                                    <textarea name="long_desc" cols="10" rows="3" class="form-control @error('long_desc') is-invalid @enderror"
                                        required>{{ old('long_desc') }}</textarea>
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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Category') }}
                                    </button>
                                    <a type="button" class="btn btn-secondary" href="{{ route('categories.index') }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
