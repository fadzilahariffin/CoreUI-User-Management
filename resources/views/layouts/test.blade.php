<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <!-- Icons -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Main styles for this application -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{-- <style>
            body {
                padding-top: 40px;
            }
        </style> --}}
    </head>
    <body>

       @include('includes.navbar')

          <div class="app-body">
            @include('includes.sidebar')
            <!-- Main content -->
            <main class="main">

              <!-- Breadcrumb -->
              {{-- @include('includes.breadcrumb') --}}
              {!! Breadcrumbs::render() !!}

                <div class="container-fluid">

                <div class="row">
                   <div class="col-md-12">
                    @include('includes.partials.messages')
                   </div>
                </div>

            @yield('content')

                </div>

            </main>

            @include('includes.asidemenu')

            </div>

            @include('includes.footer')


        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
        <!-- App scripts -->

        <!-- Bootstrap and necessary plugins -->
        <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/pace.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('js/vendor/jquery.min.js') }}"></script> --}}

        <!-- Plugins and scripts required by all views -->
        <script src="{{ asset('js/vendor/Chart.min.js') }}"></script>
        <!-- CoreUI main scripts -->
        <script src="{{ asset('js/app.js')}}"></script>

        @stack('scripts')
        {{-- @yield('myscript') --}}
    </body>
</html>
