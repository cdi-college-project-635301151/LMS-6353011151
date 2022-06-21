@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Book ISBN') }}</div>
                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a type="button" class="btn btn-primary btn-sm" href="{{ route('book-isbn.create') }}">
                            {{ __('Create ISBN') }}
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($records) == 0)
                                    <tr>
                                        <td colspan="7">{{ __('No Data found....') }}</td>
                                    </tr>
                                @endif

                                @foreach ($records as $record)
                                    <tr>
                                        <th scope="row">{{ $record->id }}</th>
                                        <td>{{ $record->isbn_desc }}</td>
                                        <td>{{ $record->short_desc }}</td>
                                        <td>{{ $record->is_enabed ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $record->created_at->format('D M d, Y h:m a') }}</td>
                                        <td>{{ $record->updated_at->format('D M d, Y h:m a') }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
