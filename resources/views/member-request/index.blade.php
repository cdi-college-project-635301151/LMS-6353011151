@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">

        @if ($message = Session::get('success'))
            @include('layouts.success')
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Requests List') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive p-2">
                            <table class="table table-transactions table-hover nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">Author/Creator</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Request Status</th>
                                        <th scope="col">Checked Out</th>
                                        <th scope="col">Return Status</th>
                                        <th scope="col">Request Type</th>
                                        <th scope="col">Pickup Date</th>
                                        <th scope="col">Return Date</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td scope="row">{{ $transaction->id }}</td>
                                            <td>{{ $transaction->doc_title }}</td>
                                            <td>{{ $transaction->isbn_number }}</td>
                                            <td>{{ $transaction->author_name }}</td>
                                            <td>{{ $transaction->publication_year }}</td>
                                            <td>
                                                @switch($transaction->status)
                                                    @case('P')
                                                        <span class="text-warning">Pending</span>
                                                    @break

                                                    @case('C')
                                                        <span class="text-danger">Cancelled</span>
                                                    @break

                                                    @case('A')
                                                        <span class="text-success">Approved</span>
                                                    @break

                                                    @default
                                                        <span class="text-success">Done</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                @switch($transaction->is_checked_out)
                                                    @case('P')
                                                        <span class="text-warning">Pending</span>
                                                    @break

                                                    @case('A')
                                                    @case('D')
                                                        <span class="text-success">Done</span>
                                                    @break

                                                    @default
                                                        <span class="text-warning">Inactive</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                @switch($transaction->is_returned)
                                                    @case('A')
                                                    @case('D')
                                                        <span class="text-success">Done</span>
                                                    @break

                                                    @case('C')
                                                        <span class="text-danger">Cancelled</span>
                                                    @break

                                                    @case('I')
                                                        <span class="text-warning">Inactive</span>
                                                    @break

                                                    @default
                                                        <span class="text-warning">Pending</span>
                                                @endswitch

                                            </td>
                                            <td>{{ $transaction->description }}</td>
                                            <td>{{ $transaction->from_date }}</td>
                                            <td>{{ $transaction->to_date }}</td>
                                            <td>{{ $transaction->remarks }}</td>
                                            <td>
                                                @if ($transaction->status == 'A' && $transaction->is_checked_out == 'P' && $transaction->is_returned == 'P')
                                                    <button class="btn btn-success p-0 pe-1 ps-1"
                                                        onclick="event.preventDefault(); document.getElementById('check-out-form-{{ $transaction->id }}').submit();">
                                                        <span>Checkout</span>
                                                    </button>
                                                    <form id="check-out-form-{{ $transaction->id }}"
                                                        action="{{ route('member-requests.update', $transaction->id) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="text" name="member_code"
                                                            value="{{ $transaction->member_code }}">
                                                        <input type="text" name="id"
                                                            value="{{ $transaction->id }}">
                                                        <input type="request_type" value="{{ $request_type }}">
                                                    </form>
                                                @else
                                                    <button class="btn disabled btn-secondary p-0 pe-1 ps-1">
                                                        <span>Checkout</span>
                                                    </button>
                                                @endif


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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.table-transactions').DataTable({
                scrollX: true,
                paging: true,
                order: [
                    [8, 'desc'],
                    [7, 'desc'],
                    [9, 'desc']
                ],
                fixedColumns: {
                    right: 1
                },

            });
        })
    </script>
@endsection
