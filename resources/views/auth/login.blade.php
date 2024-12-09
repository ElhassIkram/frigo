<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Connexion</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            color: #edf3ff;
            background: #000000; /* Changer l'arrière-plan en noir */
            font: 600 16px/18px 'Open Sans', sans-serif;
        }

        .login-wrap {
            width: 100%;
            margin: auto;
            max-width: 510px;
            min-height: 510px;
            position: relative;
            background: url(https://maxcdn.icons8.com/app/uploads/2016/03/material-1-1000x563.jpg) no-repeat center;
            background-size: cover;
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
        }

        .login-html {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background: rgba(0, 0, 0, 0.5);
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            text-security: circle;
            -webkit-text-security: circle;
        }

        .login-form .group .button {
            background: #1161ee;
        }

        .hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, .2);
        }

        .foot-lnk {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <label for="tab-1" class="tab">Connexion</label>
          <label for="tab-2" class="tab">Mot de passe oublié</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="group">
                            <label for="email" class="label">{{ __('Adresse Email') }}</label>
                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <label for="password" class="label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Connexion">
                        </div>
                        <div class="hr"></div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
