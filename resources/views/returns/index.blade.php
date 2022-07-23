@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Return Lists') }}</div>
                <div class="card-body">
                    <table class="table table-transactions table-hover w-100 nowrap mb-5">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Borrower</th>
                                <th scope="col">Title</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Author/Creator</th>
                                <th scope="col">Year</th>
                                <th scope="col">Return Status</th>
                                <th scope="col">Pickup Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row" class="p-2">{{ $loop->index + 1 }}.</th>
                                    <td class="p-2">{{ $request->first_name . ' ' . $request->last_name }}</td>
                                    <td class="p-2">{{ $request->doc_title }}</td>
                                    <td class="p-2">{{ $request->isbn_number }}</td>
                                    <td class="p-2">{{ $request->author_name }}</td>
                                    <td class="p-2">{{ $request->publication_year }}</td>
                                    <td class="p-2">
                                        {{ $request->is_returned == 'P' ? 'Pending' : 'Done' }}
                                    </td>
                                    <td class="p-2">{{ $request->from_date }}</td>
                                    <td class="p-2">{{ $request->to_date }}</td>
                                    <td class="p-2">
                                        @if ($request->status == 'A')
                                            <a href="{{ route('returns.create', [
                                                'member_code' => $request->member_code,
                                                'document_code' => $request->document_code,
                                                'request_id' => $request->id,
                                            ]) }}"
                                                class="btn btn-sm btn-light p-0 ps-1 pe-1 me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Manage Request">
                                                <i class="fa-solid fa-calendar-check text-success"></i> Manage
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary p-0 ps-1 pe-1 me-1"
                                                disabled>
                                                <i class="fa-solid fa-calendar-check"></i> Manage
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.table-transactions').DataTable({
                scrollX: true,
                paging: true,
                order: [
                    [8, 'asc']
                ],
                fixedColumns: {
                    right: 1
                },

            });
        })
    </script>
@endsection
