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
                <div class="card-header">{{ __('Maturity Categories') }}</div>
                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('maturity.create') }}"
                            class="btn btn-sm btn-float-end btn-success">{{ __('Create Maturity Category') }}</a>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @if (count($maturity) == 0)
                                    <tr>
                                        <td colspan="7">No data found...</td>
                                    </tr>
                                @endif

                                @foreach ($maturity as $category)
                                    <tr>
                                        <th scope="row" class="pt-3">{{ $category->id }}</th>
                                        <td class="pt-3">{{ $category->short_desc }}</td>
                                        <td class="pt-3">{{ $category->long_desc }}</td>
                                        <td class="pt-3">
                                            {{ $category->is_enabled == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td class="pt-3">{{ $category->created_at }}</td>
                                        <td class="pt-3">{{ $category->updated_at }}</td>
                                        <td class="pt-3">
                                            <a href="#" class="btn btn-sm btn-link p-0" data-bs-toggle="dropdown"
                                                aria-labelledby="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownmenu">
                                                <li>
                                                    <a href="{{ route('maturity.show', $category->maturity_code) }}"
                                                        class="dropdown-item">
                                                        {{ __('Update') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    @if ($category->is_enabled == '1')
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
                    {{ $maturity->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
