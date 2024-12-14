<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    @if ($success_message = Session::get('registration-success'))
                        <div class="alert alert-success color-info shadow">
                            {{ $success_message }}
                        </div>
                    @endif
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <h1>Sign Up</h1>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name"> Name </label>
                                            @if ($errors->has('name'))
                                                <div class="text-danger my-1">{{ $errors->first('name') }}</div>
                                            @endif
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ @old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            @if ($errors->has('email'))
                                                <div class="text-danger my-1">{{ $errors->first('email') }}</div>
                                            @endif
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ @old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            @if ($errors->has('password'))
                                                <div class="text-danger my-1">{{ $errors->first('password') }}</div>
                                            @endif
                                            <input type="password" id="email" class="form-control" name="password"
                                                value="{{ @old('password') }}">
                                        </div>
                                    </div>

                                    <div class="row md-12">
                                        <div class="form-group">
                                            <label for="password-confirm">Confirm Password</label>
                                            @if ($errors->has('password-confirm'))
                                                <div class="text-danger my-1">{{ $errors->first('password-confirm') }}</div>
                                            @endif
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </diV>

                                <div class="clearfix">
                                    <button class="btn btn-primary" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a href="{{ route('login') }}">Have an account? Sign In</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
