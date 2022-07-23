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
                    {{ $borrowType->description }} Request Form
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-requests.update', $requestInfo->member_code) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="request_id" value="{{ $requestInfo->id }}">
                        <input type="hidden" name="request_type" value="{{ $requestInfo->status }}">
                        {{-- Book Title --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="document_name"
                                name="document_name" value="{{ $requestInfo->doc_title }}" readonly>
                            <label for="document_name">Document Name</label>
                        </div>

                        {{-- isbn number --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="isbn_number"
                                name="isbn_number" value="{{ $requestInfo->isbn_number }}" readonly>
                            <label for="isbn_number">ISBN Number</label>
                        </div>

                        {{-- author --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="author_name"
                                name="author_name" value="{{ $requestInfo->author_name }}" readonly>
                            <label for="book_name">Author/Creator Name</label>
                        </div>

                        {{-- publication year --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-start" placeholder="publication_year"
                                name="publication_year" value="{{ $requestInfo->publication_year }}" readonly>
                            <label for="publication_year">Year</label>
                        </div>

                        {{-- Borrower Name --}}
                        <div class="form-floating mb-3">
                            <input type="hidden" name="member_code" value="{{ $requestInfo->member_code }}">
                            <input type="text" class="form-control @error('borrower_name') is-invalid @enderror"
                                name="borrower_name" placeholder="Member Name"
                                value="{{ $requestInfo->first_name . ' ' . $requestInfo->last_name }}"
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
                                    placeholder="Date" name="pick_up_date"
                                    value="{{ old('pick_up_date') != '' ? old('pick_up_date') : $requestInfo->from_date }}">
                                <label for="floatingInput">Pickup Date</label>
                                @error('pick_up_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control text-start @error('return_date') is-invalid @enderror"
                                    placeholder="Date" name="return_date"
                                    value="{{ old('return_date') != '' ? old('return_date') : $requestInfo->to_date }}"
                                    required>
                                <label for="floatingInput">Return Date</label>
                                @error('return_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="form-floating mb-3">
                            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                <option @if ($requestInfo->status == 'P') selected @endif disabled value="">Pending
                                </option>
                                <option @if ($requestInfo->status == 'A') selected @endif value="A">Approve</option>
                                <option @if ($requestInfo->status == 'C') selected @endif value="C">Cancel</option>
                            </select>
                            <label for="status">Status</label>
                            @error('status')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Remarks --}}
                        <div class="form-floating mb-3">
                            <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror"
                                placeholder="Remarks" onblur="this.value = this.value.trimAll();" style="height: 100px">{{ old('remarks') != '' ? old('remarks') : $requestInfo->remarks }}</textarea>
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
                                    {{ __('Update Request') }}
                                </button>
                                <a type="button" class="btn btn-secondary"
                                    href="@if ($requestInfo->status == 'P') {{ route('admin-requests.index', ['request_status' => 'pending']) }}
                                        @elseif ($requestInfo->status == 'A')
                                        {{ route('admin-requests.index', ['request_status' => 'active']) }}
                                        @elseif ($requestInfo->status == 'C')
                                        {{ route('admin-requests.index', ['request_status' => 'cancelled']) }} @endif">
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
