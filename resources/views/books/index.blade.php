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
                <div class="card-header">{{ __('Books') }}</div>
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped">

                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
