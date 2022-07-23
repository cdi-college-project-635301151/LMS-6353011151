@extends('layouts.app')


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
                            {{ __('Documents') }}
                        </div>
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                            @if (Auth::user()->user_type != 3)
                                <a href="{{ route('documents.create') }}" class="btn btn-sm btn-primary">
                                    {{ __('New Document') }}
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="col-md p-2">
                        <table class="table table-sm table-hover table-transactions nowrap w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Maturity</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($documents) == 0)
                                    <tr>
                                        <td colspan="11">{{ __('No Data found...') }}</td>
                                    </tr>
                                @endif

                                @foreach ($documents as $document)
                                    <tr>
                                        <th scope="row" class="p-2">{{ $document->id }}.</th>
                                        <td class="p-2">{{ $document->doc_title }}</td>
                                        <td class="p-2">{{ $document->isbn_number }}</td>
                                        <td class="p-2">{{ $document->author_name }}</td>
                                        <td class="p-2">{{ $document->publication_year }}</td>
                                        <td class="p-2">{{ $document->doc_type_name }}</td>
                                        <td class="p-2">{{ $document->maturity_name }}</td>
                                        <td class="p-2">{{ $document->genre_name }}</td>
                                        <td class="p-2">{{ $document->category_name }}</td>
                                        </td>
                                        <td class="p-2 text-center">

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @if (!Auth::user())
                                                    <script></script>
                                                @endif
                                                @if (Auth::user()->user_type != 3)
                                                    <a href="{{ route('documents.show', $document->document_code) }}"
                                                        class="btn btn-light btn-sm p-0 pe-2 ps-2">
                                                        <i class="fa-solid fa-file-pen text-success"></i>
                                                        <u>Edit</u></a>
                                                @endif

                                                <a href="@if (Auth::user()->user_type != 3) {{ route('admin-lending.create', [
                                                    'request_type' => 'reservation',
                                                    'doc_code' => $document->document_code,
                                                ]) }}
                                                    @else
                                                    {{ route('member-lending.create', [
                                                        'code' => $document->document_code,
                                                        'type' => '1',
                                                        'member_code' => Auth::user()->member_code,
                                                    ]) }} @endif"
                                                    class="btn btn-light btn-sm p-0 pe-2 ps-2">
                                                    <i class="fa-solid fa-calendar-day text-success"></i>
                                                    <u>Reserve</u></a>

                                                <a href="@if (Auth::user()->user_type != 3) {{ route('admin-lending.create', [
                                                    'request_type' => 'loan',
                                                    'doc_code' => $document->document_code,
                                                ]) }}
                                                    @else
                                                    {{ route('member-lending.create', [
                                                        'code' => $document->document_code,
                                                        'type' => '2',
                                                        'member_code' => Auth::user()->member_code,
                                                    ]) }} @endif"
                                                    class="btn btn-light btn-sm p-0 pe-2 ps-2">
                                                    <i class="fa-solid fa-calendar-day text-success"></i>
                                                    <u>Loan</u></a>

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
