@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('Loaned Report') }}</div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md p-2">

                        <table class="table table-hover nowrap w-100 table-report">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Author/Creator</th>
                                    <th>Published</th>
                                    <th>Borrower</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>
                                    <th>Checked Out</th>
                                    <th>Returned</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    <tr>
                                        <th scope="row">{{ sprintf('%03d', $document->id) }}</th>
                                        <td>{{ $document->doc_title }}</td>
                                        <td>{{ $document->isbn_number }}</td>
                                        <td>{{ $document->author_name }}</td>
                                        <td>{{ $document->publication_year }}</td>
                                        <td>{{ $document->first_name . ' ' . $document->last_name }}</td>
                                        <td>{{ $document->from_date }}</td>
                                        <td>{{ $document->to_date }}</td>
                                        <td>
                                            @switch($document->status)
                                                @case('A')
                                                @case('D')
                                                    <span class="text-success">
                                                        Approved
                                                    </span>
                                                @break

                                                @case('C')
                                                    <span class="text-danger">
                                                        Cancelled
                                                    </span>
                                                @break

                                                @default
                                                    <span class="text-warning">
                                                        Inactive
                                                    </span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($document->is_checked_out)
                                                @case('A')
                                                    <span class="text-success">
                                                        Yes
                                                    </span>
                                                @break

                                                @case('C')
                                                @case('I')

                                                @case('P')
                                                    <span class="text-danger">
                                                        Cancelled
                                                    </span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($document->is_returned)
                                                @case('D')
                                                    <span class="text-success">
                                                        Yes
                                                    </span>
                                                @break

                                                @case('C')
                                                @case('I')
                                                    <span class="text-danger">
                                                        Cancelled
                                                    </span>
                                                @break

                                                @default
                                                    <span class="text-warning">
                                                        Pending
                                                    </span>
                                            @endswitch
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
