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
                            {{ __('Book Gengre') }}
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Add Genre') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">


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
                                @if (count($genres) == 0)
                                    <tr>
                                        <td colspan="7">
                                            No data found.
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($genres as $genre)
                                    <tr>
                                        <th scope="row">{{ $genre->id }}</th>
                                        <td>{{ $genre->short_desc }}</td>
                                        <td>{{ $genre->long_desc }}</td>
                                        <td>{{ $genre->is_enabled == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $genre->created_at->format('D M d, Y h:m a') }}</td>
                                        <td>{{ $genre->updated_at->format('D M d, Y h:m a') }}</td>
                                        <td>
                                            <div class="dropend">
                                                <button type="button" class="btn btn-link btn-sm p-0"
                                                    id="btn-{{ $genre->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                    <li>
                                                        <a href="{{ route('genre.show', $genre->genre_code) }}"
                                                            class="dropdown-item">
                                                            {{ __('Update') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        @if ($genre->is_enabled == '1')
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $genre->id }}").submit()'>
                                                                {{ __('Disable') }}
                                                            </button>

                                                            <form action="{{ route('genre.update', $genre->id) }}"
                                                                method="post" class="d-non" id="frm{{ $genre->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="genre_code"
                                                                    value={{ $genre->genre_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $genre->short_desc }}">
                                                                <input type="hidden" name="long_desc"
                                                                    value="{{ $genre->long_desc }}">
                                                                <input type="hidden" name="is_enabled" value="0">

                                                            </form>
                                                        @else
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $genre->id }}").submit()'>
                                                                {{ __('Enable') }}
                                                            </button>

                                                            <form action="{{ route('genre.update', $genre->id) }}"
                                                                method="post" class="d-non" id="frm{{ $genre->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="genre_code"
                                                                    value={{ $genre->genre_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $genre->short_desc }}">
                                                                <input type="hidden" name="long_desc"
                                                                    value="{{ $genre->long_desc }}">
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
                    {{-- {{ $genres->links() }} --}}

                </div>
            </div>
        </div>
    </div>
@endsection
