@extends('layouts.app')

@section('content')
    @if ($message = Session::get('sucess'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Document Type Update') }}</div>
                <div class="card-body">
                    <form action="{{ route('documents-types.update', $documentType->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="doc_type_code" value="{{ $documentType->doc_type_code }}">
                        <input type="hidden" name="is_enabled" value="1">
                        <div class="row mb-3">
                            <label for="short_desc"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="short_desc"
                                    class="form-control @error('short_desc') is-invalid @enderror"
                                    value="{{ $documentType->short_desc }}" autofocus>
                                @error('short_desc')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a type="button" class="btn btn-secondary" href="{{ route('documents-types.index') }}">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
