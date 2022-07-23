@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($message = Session::get('success'))
                @include('layouts.success')
            @endif

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <a href="{{ route('categories.create') }}"
                                class="btn btn-sm btn-float-end btn-primary">{{ __('Create Category') }}</a>
                        </div>

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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($categories) == 0)
                                        <tr>
                                            <td colspan="7">
                                                No data found...
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}.</th>
                                            <td class="p-2">{{ $category->short_desc }}</td>
                                            <td class="p-2" style="max-width: 500px">{{ $category->long_desc }}</td>
                                            <td class="p-2">{{ $category->is_enabled == '1' ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="p-2">{{ $category->created_at->format('D M d, Y h:m a') }}</td>
                                            <td class="p-2">{{ $category->updated_at->format('D M d, Y h:m a') }}</td>
                                            <td class="p-2">

                                                <button type="button" class="btn btn-link btn-sm p-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                    <li>
                                                        <a href="{{ route('categories.show', $category->category_code) }}"
                                                            class="dropdown-item">Update</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item">Disable</a>
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
    </div>
@endsection
