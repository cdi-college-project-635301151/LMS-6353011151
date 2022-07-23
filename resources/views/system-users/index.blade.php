@extends('layouts.app');

@section('content')
    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ __('System Users') }}
                        </div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('sys-users.create') }}" class="btn btn-sm btn-primary">
                                {{ __('Grant Access') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}.</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->description }}</td>
                                    <td>{{ $user->is_blocked == '1' ? 'Blocked' : 'Active' }}</td>
                                    <td>{{ $user->created_at->format('D M d, Y') }}</td>
                                    <td>{{ $user->updated_at->format('D M d, Y') }}</td>
                                    <td>
                                        <div class="dropend">
                                            <a href="{{ route('password-reset.index', ['member_code' => $user->member_code]) }}"
                                                class="btn btn-sm btn-warning p-0 ps-2 pe-2">
                                                <i class="fa-solid fa-fingerprint"></i>
                                                Reset Password</a>
                                            {{-- <button class="btn btn-link btn-sm p-0" type="button" id="dropdownMenu2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li>
                                                    <a href="{{ route('password-reset.index', ['member_code' => $user->member_code]) }}"
                                                        class="dropdown-item">
                                                        <i class="fa-solid fa-fingerprint"></i> Reset
                                                        Password</a>
                                                </li>
                                                <li>
                                                    @if ($user->is_blocked == '1')
                                                        <button class="dropdown-item"
                                                            type="button">{{ __('Grant Access') }}</button>
                                                    @else
                                                        <button class="dropdown-item"
                                                            type="button">{{ __('Revoke Access') }}</button>
                                                    @endif
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
