<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ url('img/fav.png') }}" />

    <!-- Title -->
    <title>Doodleblue Innovation - Login</title>

    <!-- *************
			************ Common Css Files *************
			************ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />

    <!-- Master CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />

</head>

<body class="authentication">

    <!-- Container start -->
    <div class="container">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <center>
                                <img src="{{ url('assets/logo.svg') }}" style="width: 200px;" alt="Doodleblue Innovation Systems" class="login-logo">
                            </center>
                            {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label> --}}

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="actions">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Recover password
                                </a>
                                @endif
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                            <div class="m-0">
                                <span class="additional-link">
                                    Username: admin@admin.com
                                    <br>
                                    Password: 123456
                                </span>
                            </div>
                            <div class="m-0">
                                <span class="additional-link">
                                    No account?
                                    <a href="{{ url('register') }}">
                                        Signup Now
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Container end -->

</body>

</html>