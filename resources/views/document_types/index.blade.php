@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                @include('layouts.success')
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ __('Document Types') }}
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a type="button" class="btn btn-primary" href="{{ route('documents-types.create') }}">
                                    {{ __('Create Document Types') }}
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
                                    <th scope="col">Short Desc</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($documentTypes) == 0)
                                    <tr>
                                        <td colspan="6">No data found</td>
                                    </tr>
                                @endif

                                @foreach ($documentTypes as $docType)
                                    <tr>
                                        <th scope="row">{{ $docType->id }}.</th>
                                        <td>{{ $docType->short_desc }}</td>
                                        <td>{{ $docType->is_enabled == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $docType->created_at->format('D M d, Y h:m a') }}</td>
                                        <td>{{ $docType->updated_at->format('D M d, Y h:m a') }}</td>
                                        <td>

                                            <div class="dropend">
                                                <button type="button" class="btn btn-link btn-sm p-0"
                                                    id="btn-{{ $docType->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                    <li>
                                                        <a href="{{ route('documents-types.show', $docType->doc_type_code) }}"
                                                            class="dropdown-item">
                                                            {{ __('Update') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        @if ($docType->is_enabled == '1')
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $docType->id }}").submit()'>
                                                                {{ __('Disable') }}
                                                            </button>

                                                            <form
                                                                action="{{ route('documents-types.update', $docType->id) }}"
                                                                method="post" class="d-non" id="frm{{ $docType->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="doc_type_code"
                                                                    value={{ $docType->doc_type_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $docType->short_desc }}">
                                                                <input type="hidden" name="is_enabled" value="0">

                                                            </form>
                                                        @else
                                                            <button type="button" class="dropdown-item"
                                                                onClick='document.getElementById("frm{{ $docType->id }}").submit()'>
                                                                {{ __('Enable') }}
                                                            </button>

                                                            <form
                                                                action="{{ route('documents-types.update', $docType->id) }}"
                                                                method="post" class="d-non" id="frm{{ $docType->id }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="doc_type_code"
                                                                    value={{ $docType->doc_type_code }}>
                                                                <input type="hidden" name="short_desc"
                                                                    value="{{ $docType->short_desc }}">
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

                </div>
            </div>

        </div>
    </div>
@endsection
