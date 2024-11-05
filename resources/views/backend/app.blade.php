<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/iconly.css') }}">

    {{-- Choices.js multiple select --}}
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/choices.js/public/assets/styles/choices.css') }}">

    {{-- Quill Editor --}}
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/extensions/quill/quill.bubble.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet"
        href="{{ asset('dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/table-datatable-jquery.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script src="{{ asset('dist/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            @include('backend.partials.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                @include('backend.partials.header')
            </header>

            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>

            <div class="page-content">
                @yield('content') <!-- Make sure this is above the scripts to access the content -->

                @if (session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                    </script>
                @endif

                @if ($errors->any())
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: '{{ $errors->first() }}',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    </script>
                @endif
            </div>


        </div>
    </div>

    <script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>

    {{-- Datatable --}}
    <script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/datatables.js') }}"></script>

    <!-- Include Select2 JS -->
    <script src="{{ asset('dist/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/form-element-select.js') }}"></script>

    <!-- Include Quill JS -->
    <script src="{{ asset('dist/assets/extensions/quill/quill.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/quill.js') }}"></script>

</body>

</html>
