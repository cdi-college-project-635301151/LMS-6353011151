<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    {{-- Boostrap Datatable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    {{-- Bootstrap Datatables JS --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    {{-- datepicker --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <style>
        div.dataTables_scrollBody>table {
            margin-bottom: 5px !important;
        }

        div.dataTables_length {
            margin-bottom: 5px !important;
        }

        div.DataTables_Table_0_filter {
            margin-bottom: 5px !important;
        }
    </style>
</head>

<body>

    <div id="app">
        @if (Auth::user())
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            {{-- @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            @endguest --}}

                            {{-- Documents --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documents.index') }}">
                                    <i class="fa-solid fa-rectangle-list"></i>
                                    {{ __('Documents') }}</a>
                            </li>

                            @if (Auth::user()->user_type == 3)
                                {{-- Transactions --}}
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-bell"></i>
                                        {{ __('Requests') }}</a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                        <a href="{{ route('member-requests.index', ['member_code' => Auth::user()->member_code]) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-rectangle-list"></i>
                                            {{ __('All Transactions') }}</a>
                                        <a href="{{ route('member-requests.index', ['member_code' => Auth::user()->member_code, 'transaction_type' => 1]) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-asterisk"></i>
                                            {{ __('Reservations') }}</a>
                                        <a href="{{ route('member-requests.index', ['member_code' => Auth::user()->member_code, 'transaction_type' => 2]) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-bookmark"></i>
                                            {{ __('Loans') }}</a>
                                    </div>
                                </li>
                            @endif

                            {{-- ADMIN AND EMPLOYEE ONLY --}}
                            @if (Auth::user()->user_type == 1)
                                {{-- Requests --}}
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-bell"></i>
                                        {{ __('Requests') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                        <a href="{{ route('admin-requests.index', ['request_status' => 'pending']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-exclamation"></i>
                                            {{ __('Pending') }}</a>
                                        <a href="{{ route('admin-requests.index', ['request_status' => 'approved']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-check-to-slot"></i>
                                            {{ __('Approved') }}</a>
                                        <a href="{{ route('admin-requests.index', ['request_status' => 'cancelled']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-ban"></i>
                                            {{ __('Cancelled') }}</a>
                                    </div>
                                </li>

                                {{-- Return --}}
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-file-signature"></i>
                                        {{ __('Returns') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                        <a href="{{ route('returns.index', ['return_status' => 'pending']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-file-circle-exclamation"></i>
                                            {{ __('Pending') }}</a>
                                        <a href="{{ route('returns.index', ['return_status' => 'completed']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-file-circle-check"></i>
                                            {{ __('Completed') }}</a>
                                    </div>
                                </li>

                                {{-- Reports --}}
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-file-lines"></i>
                                        {{ __('Reports') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropdown">
                                        <a href="{{ route('report.index', ['report_name' => 'members']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-users-viewfinder"></i>
                                            {{ __('Members') }}
                                        </a>
                                        <a href="{{ route('report.index', ['report_name' => 'overdue']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-calendar-xmark"></i>
                                            {{ __('Overdue') }}
                                        </a><a href="{{ route('report.index', ['report_name' => 'reserved']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            {{ __('Reserved') }}
                                        </a>
                                        </a><a href="{{ route('report.index', ['report_name' => 'loaned']) }}"
                                            class="dropdown-item">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            {{ __('Loaned') }}
                                        </a>
                                    </div>
                                </li>

                                {{-- Settings --}}
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa-solid fa-gear"></i>
                                        {{ _('Settings') }}</a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                        <a href="{{ route('authors.index') }}" class="dropdown-item">
                                            <i class="fa-solid fa-at"></i>
                                            {{ __('Authors') }}</a>
                                        <a href="{{ route('categories.index') }}" class="dropdown-item">
                                            <i class="fa-solid fa-icons"></i>
                                            {{ __('Categories') }}</a>
                                        <a href="{{ route('genre.index') }}" class="dropdown-item">
                                            <i class="fa-solid fa-box"></i>
                                            {{ __('Genre') }}</a>
                                        <a href="{{ route('maturity.index') }}" class="dropdown-item">
                                            <i class="fa-solid fa-person-circle-question"></i>
                                            {{ __('Maturity') }}</a>
                                        <a href="{{ route('documents-types.index') }}" class="dropdown-item">
                                            <i class="fa-solid fa-file-circle-question"></i>
                                            {{ __('Document Types') }}</a>
                                    </div>
                                </li>

                                {{-- Members --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('members.index') }}">
                                        <i class="fa-solid fa-users-rectangle"></i>
                                        {{ __('Members') }}</a>
                                </li>

                                {{-- Users --}}

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sys-users.index') }}">
                                        <i class="fa-solid fa-users-gear"></i>
                                        {{ __('System Users') }}</a>
                                </li>
                            @endif


                            {{-- Logout --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-circle-user"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>
        @else
            @if (Route::currentRouteName() != '')
                <script>
                    window.location.replace('/')
                </script>
            @endif
        @endif


        <main class="py-4">
            <div class="container-md">
                @yield('content')
            </div>
        </main>
    </div>


    @yield('script')
    <script>
        String.prototype.trimAll = function() {
            return this.replace(/\s\s+/g, ' ').replace(/^\s+|\s+$/g, '');
        };



        $(document).ready(function() {
            $('.table-normal').DataTable({
                //
            });

            $('.table-scroll').DataTable({
                scrollX: true,
                paging: true,
            })
        });

        $('.table-report').DataTable({
            scrollX: true,
            paging: false,
            order: [
                [0, 'asc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel'
            ],
        });
    </script>

</body>

</html>
