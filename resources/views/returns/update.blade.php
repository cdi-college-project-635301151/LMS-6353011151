@extends('layouts.app')

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
                    Borrowers Return Form
                </div>
                <div class="card-body">
                    @if ($reserved)
                        <div class="row">
                            <div class="col-md">
                                <div class="alert alert-primary" role="alert">
                                    This document is being reserved by
                                    <i>{{ $reserved->first_name . ' ' . $reserved->last_name }} between</i>
                                    <strong>
                                        <u>{{ date('m-d-y', strToTime($reserved->from_date)) }}</u>
                                    </strong>
                                    to <strong>
                                        <u>{{ date('m-d-y', strToTime($reserved->to_date)) }}</u></strong>.
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('returns.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="request_id" value="{{ $result->id }}">
                        {{-- Book Title --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="document_code" value="{{ $result->document_code }}">
                            <input type="text" class="form-control text-start" placeholder="document_name"
                                name="document_name" value="{{ $result->doc_title }}" readonly>
                            <label for="document_name">Document Name</label>
                        </div>

                        {{-- isbn number --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="isbn_number"
                                name="isbn_number" value="{{ $result->isbn_number }}" readonly>
                            <label for="isbn_number">ISBN Number</label>
                        </div>

                        {{-- author --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="author_name"
                                name="author_name" value="{{ $result->author_name }}" readonly>
                            <label for="book_name">Author/Creator Name</label>
                        </div>

                        {{-- publication year --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="publication_year"
                                name="publication_year" value="{{ $result->publication_year }}" readonly>
                            <label for="publication_year">Year</label>
                        </div>

                        {{-- Borrower Name --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="member_code" value="{{ $result->member_code }}">
                            <input type="text" class="form-control @error('borrower_name') is-invalid @enderror"
                                name="borrower_name" placeholder="Member Name"
                                value="{{ $result->first_name . ' ' . $result->last_name }}"
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
                                <input type="text" class="form-control text-start" placeholder="Date" name="from_date"
                                    value="{{ old('pick_up_date') != '' ? old('pick_up_date') : $result->from_date }}"
                                    readonly>
                                <label for="floatingInput">From Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-start" placeholder="Date" name="to_date"
                                    value="{{ old('return_date') != '' ? old('return_date') : $result->to_date }}"
                                    readonly>
                                <label for="floatingInput">To Date</label>
                            </div>
                        </div>

                        {{-- Remarks --}}
                        <div class="form-floating mb-3">
                            <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror"
                                placeholder="Remarks" onblur="this.value = this.value.trimAll();" style="height: 100px">{{ old('remarks') != '' ? old('remarks') : $result->remarks }}</textarea>
                            <label for="remarks">Remarks</label>
                            @error('remarks')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Return Document') }}
                                </button>
                                <a type="button" class="btn btn-secondary"
                                    href="{{ route('returns.index', ['return_status' => 'pending']) }}">
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
