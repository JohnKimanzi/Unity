<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords"
        content="admin,  business, corporate,  management, debt, modern, accounts, invoice, collection, Unity, CRM, Projects">
    <meta name="author" content="chrism">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ config('app.name') }} - Reset Password </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/unity_logo_transparent.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index"><img src="{{ asset('img/unity_logo_transparent.png') }}"
                            alt="{{ config('app.name') }}"></a>
                </div>
                <!-- /Account Logo -->


                <div class="account-box">
                    <div class="account-wrapper">
                        @guest <h3 class="account-title">Forgot Password?</h3> @endguest
                        <p class="account-subtitle">Enter your email to get a password reset link</p>
                        @include('layout.partials.flash')

                        <!-- Account Form -->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" type="text">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                            </div>
                            <div class="account-footer">
                                @guest
                                    <p>Remember your password? <a href="login">Login</a></p>
                                @endguest
                            </div>
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
