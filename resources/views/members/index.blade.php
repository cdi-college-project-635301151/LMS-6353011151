@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
            @include('layouts.success')
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ __('Members') }}
                        </div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md p-1">
                        <table class="table table-striped nowrap w-100 table-transactions">
                            <thead>
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
                            </thead>
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
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('members.edit', $member->member_code) }}"
                                                    class="btn btn-light btn-sm p-0 pe-2 ps-2 text-success">
                                                    <i class="fa-solid fa-file-pen"></i> Edit
                                                </a>
                                                <a href="{{ route('members.show', $member->member_code) }}"
                                                    class="btn btn-light btn-sm p-0 pe-2 ps-2 text-danger">
                                                    <i class="fa-solid fa-file-circle-question"></i> History
                                                </a>
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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.table-transactions').DataTable({
                scrollX: true,
                paging: true,
                order: [
                    [0, 'asc']
                ],
                fixedColumns: {
                    right: 1
                },

            });
        })
    </script>
@endsection
