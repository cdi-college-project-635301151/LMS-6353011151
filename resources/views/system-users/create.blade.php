@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('System User Registration') }}</div>
                <div class="card-body">
                    <form action="{{ route('sys-users.store') }}" method="POST">
                        @csrf

                        {{-- Members --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Member') }}</label>
                            <div class="col-md-8">
                                <select name="member_code" class="form-select @error('member_code') is-invalid @enderror"
                                    required autofocus>
                                    <option value="">{{ __('Choose member') }}</option>
                                    @foreach ($memberLists as $member)
                                        <option value="{{ $member->member_code }} ">
                                            {{ $member->first_name }} {{ $member->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('member_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- User Type --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                User Type
                            </label>
                            <div class="col-md-8">
                                <select name="user_type" class="form-select @error('user_type') is-invalid @enderror"
                                    required autofocus>
                                    <option value="" disabled selected>{{ __('Choose user type') }}</option>
                                    @foreach ($userTypes as $userType)
                                        <option value="{{ $userType->user_type_id }}">
                                            {{ $userType->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Temporary Password') }}</label>
                            <div class="col-md-8">
                                <span class="form-control">{{ $tempPassword }}</span>
                                <input id="password" type="hidden" class="form-control" name="password" required
                                    autocomplete="new-password" value="{{ $tempPassword }}">
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register System User') }}
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


    <script>
        $(document).ready(function() {

        })
    </script>
@endsection
