@extends('layouts.app');
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if ($message = Session::get('error'))
                @include('layouts.error')
            @endif
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $type->description }} Form
                </div>
                <div class="card-body">
                    <form action="{{ route('member-lending.store') }}" method="post">
                        @csrf

                        {{-- Book Title --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="document_code" value="{{ $documentCode }}">
                            <input type="hidden" name="borrower_type" value="{{ $type->borrower_type_id }}">
                            <input type="text" class="form-control text-start" placeholder="document_name"
                                name="document_name" value="{{ $document->doc_title }}" readonly>
                            <label for="document_name">Document Name</label>
                        </div>

                        {{-- isbn number --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="isbn_number" value="">
                            <input type="text" class="form-control text-start" placeholder="isbn_number"
                                name="isbn_number" value="{{ $document->isbn_number }}" readonly>
                            <label for="isbn_number">ISBN Number</label>
                        </div>

                        {{-- author --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="author_name" value="">
                            <input type="text" class="form-control text-start" placeholder="author_name"
                                name="author_name" value="{{ $document->author_name }}" readonly>
                            <label for="book_name">Author/Creator Name</label>
                        </div>

                        {{-- publication year --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="publication_year" value="">
                            <input type="text" class="form-control text-start" placeholder="publication_year"
                                name="publication_year" value="{{ $document->publication_year }}" readonly>
                            <label for="publication_year">Year</label>
                        </div>

                        {{-- Borrower Name --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="member_code" value="{{ $member->member_code }}">
                            <input type="text" class="form-control @error('borrower_name') is-invalid @enderror"
                                name="borrower_name" placeholder="Member Name"
                                value="{{ $member->first_name . ' ' . $member->last_name }}"
                                onblur="this.value = this.value.trimAll();" readonly>
                            <label for="borrower_name">Borrower's Name</label>
                            @error('borrower_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Reservation Dates --}}
                        <div class="input-daterange">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control text-start @error('pick_up_date') is-invalid @enderror"
                                    placeholder="Date" name="pick_up_date" value="{{ old('pick_up_date') }}">
                                <label for="floatingInput">{{ $type->description }} Date</label>
                                @error('pick_up_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control text-start @error('return_date') is-invalid @enderror"
                                    placeholder="Date" name="return_date" value="{{ old('return_date') }}">
                                <label for="floatingInput">Return Date</label>
                                @error('return_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Request') }}
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

    <script>
        $('.input-daterange').datepicker({
            startDate: "today",
            maxViewMode: 2,
            todayBtn: "linked",
            orientation: "bottom auto",
            daysOfWeekDisabled: "0,6",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    </script>
@endsection
