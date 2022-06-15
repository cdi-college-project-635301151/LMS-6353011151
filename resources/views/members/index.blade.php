@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
            @include('layouts.success')
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Members') }}</div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <th scope="row" class="pt-2">{{ $member->member_id }}.</th>
                                    <td class="pt-2">{{ $member->first_name }} {{ $member->last_name }}</td>
                                    <td class="pt-2">{{ $member->telephone }}</td>
                                    <td class="pt-2">{{ $member->email }}</td>
                                    <td class="pt-2">{{ $member->street_name }}
                                        {{ $member->city }}
                                        {{ $member->province }},
                                        {{ $member->postal }}</td>
                                    <td>{{ $member->created_at->format('D M d, Y') }}</td>
                                    <td class="pt-2">{{ $member->updated_at->format('D M d, Y') }}</td>
                                    <td>
                                        <div class="dropend">
                                            <button class="btn btn-link btn-sm p-0" type="button" id="dropdownMenu2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li><a href="{{ route('members.edit', $member->member_code) }}"
                                                        class="dropdown-item" type="button">Update</a></li>
                                                <li><button class="dropdown-item" type="button">View</button>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
