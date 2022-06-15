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
                        <a type="button" class="btn btn-primary btn-sm" href="#">
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
                                <tr>
                                    <td colspan="7">{{ __('No Data found....') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
