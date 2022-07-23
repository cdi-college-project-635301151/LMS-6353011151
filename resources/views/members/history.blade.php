@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ __('Members History') }}
                        </div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('members.index') }}" class="btn btn-sm btn-primary">{{ __('Go Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover w-100 nowrap table-transactions">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Borrow Type</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Checked Out</th>
                                <th scope="col">Returned</th>
                                <th scope="col">From Date</th>
                                <th scope="col">To Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <th scope="row">{{ sprintf('%03d', $result->id) }}</th>
                                    <td>{{ $result->first_name . ' ' . $result->last_name }}</td>
                                    <td>{{ $result->description }}</td>
                                    <td>{{ $result->doc_title }}</td>
                                    <td>
                                        @switch($result->status)
                                            @case('A')
                                                {{ __('Accepted') }}
                                            @break

                                            @case('D')
                                                {{ __('Done') }}
                                            @break

                                            @case('C')
                                                {{ __('Cancelled') }}
                                            @break

                                            @case('P')
                                                {{ __('Pending') }}
                                            @break

                                            @default
                                                {{ __('Inactive') }}
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($result->is_checked_out)
                                            @case('P')
                                                {{ __('Pending') }}
                                            @break

                                            @case('D')
                                                {{ __('Done') }}
                                            @break

                                            @case('A')
                                                {{ __('Yes') }}
                                            @break

                                            @default
                                                {{ __('Inactive') }}
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($result->is_returned)
                                            @case('A')
                                                {{ __('Accepted') }}
                                            @break

                                            @case('D')
                                                {{ __('Yes') }}
                                            @break

                                            @case('C')
                                                {{ __('Cancelled') }}
                                            @break

                                            @case('P')
                                                {{ __('Pending') }}
                                            @break

                                            @default
                                                {{ __('Inactive') }}
                                        @endswitch
                                    </td>
                                    <td>{{ $result->from_date }}</td>
                                    <td>{{ $result->to_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.table-transactions').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],
                scrollX: true,
                paging: false,
                order: [
                    [2, 'asc'],
                    [4, 'asc'],
                    [7, 'desc']
                ],
            });
        })
    </script>
@endsection
