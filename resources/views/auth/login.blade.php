<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>HR Login</title>

    <style>
        body {
            background-color: white;
            font-family: "Lucida Console", sans-serif;
            overflow: hidden;
        }

        footer {
            background-color: white;
            height: 100%;
        }

        button.btn {
            background-color: rgb(175, 171, 171);
            border-color: rgb(47, 82, 143);
            color: white;
            font-weight: bold;
            padding: .5rem 3rem;
        }

        label {
            font-weight: bold;
        }

        main {
            height: 70vh;
            max-height: 70vh;
        }

        .btn-link {
            text-decoration: underline;
        }

        legend {
            font-size: 1rem;
            text-align: center;
        }

        form {
            background-color: rgb(231, 230, 230);
            border: 1px solid rgb(47, 82, 143);
            border-radius: 3rem;
        }

        h1 {
            color: rgb(0, 85, 165);
            font-weight: bold;
            font-size: 300%;
            word-spacing: .5rem;
        }

        h3 {
            color: rgb(0, 85, 165);
        }

        .blue {
            color: rgb(0, 85, 164);
        }

        .green {
            color: rgb(0, 176, 80);
        }

        .orange {
            color: rgb(247, 143, 30);
        }

        .orange-bc {
            background-color: rgb(247, 143, 30);
            height: 80%;
        }

        @media (max-width: 576px) {
            footer.px-4 {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {
            main {
                height: 75vh;
                max-height: 75vh;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            html {
                font-size: 1.2rem;
            }

            main {
                height: 77vh;
                max-height: 77vh;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            main {
                height: 82vh;
                max-height: 82vh;
            }

            .btn {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid mx-0 px-0">
    <main>
        <h1 class="text-center mt-4">
            <span class="blue">Online</span> <span class="green">CAREER</span> <span class="orange">MONITOR</span>
        </h1>
        <h3 class="text-center mt-4">
            HR Coach Network Member Login
        </h3>
        <div class="row orange-bc">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3 mt-4 form">
                <form method="POST" action="{{ route('login') }}" class="py-4">
                    <legend class="blue mb-3">Please enter your email address and password below to log in.</legend>
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label text-right blue">{{ __('Email') }}</label>
                        <div class="col-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-4 col-form-label text-right blue">{{ __('Password') }}</label>
                        <div class="col-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password"
                                   required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            I have forgotten my password
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="mt-4 px-4 text-center">
        © HR Coach Australasia 2019. This website and content is the intellectual property of HR Coach Australasia.
        Licensed to authorised members of the HR Coach Australasia Network. Any disclosure, copying, display,
        distribution or misuse of this information is prohibited without the written consent of HR Coach Australasia.
    </footer>
</div>
</body>
</html>