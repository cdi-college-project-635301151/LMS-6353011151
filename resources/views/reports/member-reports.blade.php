@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('Members Report') }}</div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md p-2">

                        <table class="table table-hover nowrap w-100 table-report">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td scope="row">{{ sprintf('%03d', $member->member_id) }}</td>
                                        <td>{{ $member->full_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->telephone }}</td>
                                        <td>
                                            {{ $member->street_name . ' ' . $member->city . ', ' . $member->province . ', ' . $member->postal }}
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
@endsection
