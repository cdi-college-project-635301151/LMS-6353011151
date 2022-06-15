@extends('layouts.app')

@section('content')
    @if (empty(Auth::user()))
        <script>
            window.location.replace('/login')
        </script>
    @endif

    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Book Authors') }}</div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('authors.create') }}" class="btn btn-sm btn-primary">Register Author</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($authors) == 0)
                                    <tr>
                                        <td colspan="6">No data found...</td>
                                    </tr>
                                @endif

                                @foreach ($authors as $author)
                                    <tr>
                                        <th scope="row" class="pt-3">{{ $author->id }}.</th>
                                        <td class="pt-3">{{ $author->first_name . ' ' . $author->last_name }}
                                        </td>
                                        <td class="pt-3">
                                            {{ $author->is_enabled == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td class="pt-3">{{ $author->created_at->format('D M d, Y h:m a') }}
                                        </td>
                                        <td class="pt-3">{{ $author->updated_at->format('D M d, Y h:m a') }}
                                        </td>
                                        <td class="pt-3">
                                            <button type="button" class="btn btn-sm btn-link p-0" data-bs-toggle="dropdown"
                                                aria-labelledby="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownmenu">
                                                <li>
                                                    <a href="{{ route('authors.show', $author->author_code) }}"
                                                        class="dropdown-item">
                                                        {{ __('Update') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    @if ($author->is_enabled == '1')
                                                        <a href="#" class="dropdown-item">
                                                            {{ __('Disable') }}
                                                        </a>
                                                    @else
                                                        <a href="#" class="dropdown-item">
                                                            {{ __('Enable') }}
                                                        </a>
                                                    @endif
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
