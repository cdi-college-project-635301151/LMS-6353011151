@extends('layouts.app');

@section('content')
    @if ($message = Session::get('success'))
        {{ $message }}
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('System Users') }}</div>
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
                            @if (count($users) == 0)
                                <tr>
                                    <td colspan="8">No data found</td>
                                </tr>
                            @endif

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
                                            <button class="btn btn-link btn-sm p-0" type="button" id="dropdownMenu2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li>
                                                    <a href="#" class="dropdown-item"
                                                        type="button">{{ __('Reset Password') }}</a>
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
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
