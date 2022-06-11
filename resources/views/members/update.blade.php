@extends('layouts.app')

@section('content')
    @if (empty(Auth::user()))
        <script>
            window.location.replace('/login')
        </script>
    @endif

    <div class="row justify-content-center">
        @if ($message = Session::get('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Failled!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Update Member Information') }}</div>
                <div class="card-body">
                    <form action="{{ route('members.update', $member->member_id) }}" method="post">
                        @csrf
                        @method('PUT');

                        <input type="hidden" name="member_code" value="{{ $member->member_code }}">
                        <input type="hidden" name="is_active" value="1">
                        {{-- first name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                            <div class="col-md-8">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ $member->first_name }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            {{-- last name --}}
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Last Name') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ $member->last_name }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- telephone --}}
                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">
                                {{ __('Phone#') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="telephone"
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    value="{{ $member->telephone }}" required autocomplete="telephone" autofocus>
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $member->email }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- street name --}}
                        <div class="row mb-3">
                            <label for="street_name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Street Address') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="street_name"
                                    class="form-control @error('street_name') is-invalid @enderror"
                                    value="{{ $member->street_name }}" required autocomplete="street_name" autofocus>
                                @error('street_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- city --}}
                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">
                                {{ __('City') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                    value="{{ $member->city }}" required autocomplete="city" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- province --}}
                        <div class="row mb-3">
                            <label for="province" class="col-md-4 col-form-label text-md-end">
                                {{ __('Province') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="province"
                                    class="form-control @error('province') is-invalid @enderror"
                                    value="{{ $member->province }}" required autocomplete="province" autofocus>
                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        {{-- postal --}}
                        <div class="row mb-3">
                            <label for="postal" class="col-md-4 col-form-label text-md-end">
                                {{ __('Postal') }}
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="postal" class="form-control @error('postal') is-invalid @enderror"
                                    value="{{ $member->postal }}" required autocomplete="postal" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
                                </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('members.index') }}">
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
