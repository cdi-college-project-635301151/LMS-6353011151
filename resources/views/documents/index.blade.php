@extends('layouts.app')


@section('content')
    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Documents') }}</div>
                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('documents.create') }}" class="btn btn-sm btn-primary">
                            {{ __('Create Document') }}
                        </a>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($documents) == 0)
                                    <tr>
                                        <td colspan="9">{{ __('No Data found...') }}</td>
                                    </tr>
                                @endif

                                @foreach ($documents as $document)
                                    <tr>
                                        <th scope="row" class="p-2">{{ $document->id }}.</th>
                                        <td class="p-2">{{ $document->doc_title }}</td>
                                        <td class="p-2">{{ $document->isbn_number }}</td>
                                        <td class="p-2">{{ $document->publication_year }}</td>
                                        <td class="p-2">{{ $document->quantity }}</td>
                                        <td class="p-2">{{ $document->is_enabled == '1' ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="p-2">{{ $document->created_at->format('D m-d-y') }}</td>
                                        <td class="p-2">{{ $document->updated_at->format('D m-d-y') }}</td>
                                        <td class="p-2" style="max-width: 0.05rem">
                                            <button type="button" class="btn btn-link btn-sm p-0"
                                                id="btn-{{ $document->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                <li>
                                                    <a href="#" class="dropdown-item">View</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item">Update</a>
                                                </li>
                                            </ul>
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
