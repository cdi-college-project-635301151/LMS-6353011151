@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('Overdue Report') }}</div>
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
                                    <th>Published Year</th>
                                    <th>Checked Out</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Returned Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    @if ($document->to_date < date_format($document->updated_at, 'Y-m-d'))
                                        <tr>
                                            <th scope="row">{{ sprintf('%03d', $document->id) }}</th>
                                            <td>{{ $document->doc_title }}</td>
                                            <td>{{ $document->isbn_number }}</td>
                                            <td>{{ $document->author_name }}</td>
                                            <td>{{ $document->publication_year }}</td>
                                            <td>{{ $document->is_checked_out == 'A' ? 'Yes' : 'Pending' }}</td>
                                            <td>{{ $document->from_date }}</td>
                                            <td>{{ $document->to_date }}</td>
                                            <td>{{ date_format($document->updated_at, 'Y-m-d') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
