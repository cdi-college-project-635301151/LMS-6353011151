@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        @include('layouts.success')
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Book Gengre') }}</div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Add Genre') }}
                        </a>
                    </div>
                    <span>
                        {{ $booksGenres }}
                    </span>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($booksGenres) == 0)
                                    <tr>
                                        <td colspan="7">
                                            No data found.
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($booksGenres as $bookGenre)
                                    <tr>
                                        <th scope="row">{{ $bookGenre->id }}</th>
                                        <td>{{ $bookGenre->short_desc }}</td>
                                        <td>{{ $bookGenre->long_desc }}</td>
                                        <td>{{ $bookGenre->is_enabled == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $bookGenre->created_at->format('D M d, Y h:m') }}</td>
                                        <td>{{ $bookGenre->updated_at->format('D M d, Y h:m') }}</td>
                                        <td>
                                            <div class="dropend">
                                                <button type="button" class="btn btn-link btn-sm p-0"
                                                    id="btn-{{ $bookGenre->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                    <li>
                                                        <a href="{{ route('genre.show', $bookGenre->genre_code) }}"
                                                            class="dropdown-item">
                                                            {{ __('Update') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        @if ($bookGenre->is_enabled == '1')
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $bookGenre->id }}").submit()'>
                                                                {{ __('Disable') }}
                                                            </button>

                                                            <form action="{{ route('genre.update', $bookGenre->id) }}"
                                                                method="post" class="d-non"
                                                                id="frm{{ $bookGenre->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="genre_code"
                                                                    value={{ $bookGenre->genre_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $bookGenre->short_desc }}">
                                                                <input type="hidden" name="long_desc"
                                                                    value="{{ $bookGenre->long_desc }}">
                                                                <input type="hidden" name="is_enabled" value="0">

                                                            </form>
                                                        @else
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $bookGenre->id }}").submit()'>
                                                                {{ __('Enable') }}
                                                            </button>

                                                            <form action="{{ route('genre.update', $bookGenre->id) }}"
                                                                method="post" class="d-non"
                                                                id="frm{{ $bookGenre->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="genre_code"
                                                                    value={{ $bookGenre->genre_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $bookGenre->short_desc }}">
                                                                <input type="hidden" name="long_desc"
                                                                    value="{{ $bookGenre->long_desc }}">
                                                                <input type="hidden" name="is_enabled" value="1">

                                                            </form>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    {{ $booksGenres->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
