<!doctype html>
<html lang="en">
{{-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Time</title> --}}

@include('layout.partials.head')

<style>
    body {
        padding-top: 5rem;
    }

    .starter-template {
        padding: 3rem 1.5rem;
        text-align: center;
    }

    .blink {
        animation: blink 1s step-start infinite;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

</style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-door-open"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>

        </div>
    </nav>

    <main role="main" class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h1 class=" text-danger">{{ $text }}</h1>
            </div>
            {{-- <p class="lead">{{ $text }}</p> --}}
            @include('layout.partials.flash')
            <div class="col-12">
                @include('time_records.user_active_timesheets')
            </div>
        </div>
    </main>
    {{-- @stack('prelogin_scripts') --}}
    @include('layout.partials.footer-scripts')
</body>

</html>
