@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password Form') }}</div>
                <div class="card-body">
                    <form action="{{ route('password-reset.update', $member->member_code) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="member_code" value="{{ $member->member_code }}">

                        {{-- member full name --}}
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Member Name') }}</label>
                            <div class="col-md-8">
                                <input id="full_name" type="text" class="form-control" name="full_name"
                                    value="{{ $member->first_name . ' ' . $member->last_name }}" readonly>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Member Email') }}</label>
                            <div class="col-md-8">
                                <input id="member_email" type="text" class="form-control" name="member_email"
                                    value="{{ $member->email }}" readonly>
                            </div>
                        </div>


                        {{-- temporary password --}}
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
                            <div class="col-md-8">
                                <input id="new_password" type="text"
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    value="{{ old('new_password') ? old('new_password') : $temp_password }}" required>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Repeat Password') }}</label>
                            <div class="col-md-8">
                                <input id="repeat_password" type="text"
                                    class="form-control @error('repeat_password') is-invalid @enderror"
                                    name="repeat_password"
                                    value="{{ old('repeat_password') ? old('repeat_password') : $temp_password }}"
                                    required>
                                @error('repeat_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- submit request --}}
                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('sys-users.index') }}">
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
