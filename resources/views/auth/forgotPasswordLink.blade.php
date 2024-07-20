<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        height: 100vh; /* Ensure full viewport height */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .custom_font, .log_btn {
        font-size: 20px;
    }
    .login {
        font-size: 20px;
        margin-top: 20px;
    }
    /* .bod,.form-group{
        border: 1px solid black;
    } */
</style>
<body>
    <div class="container mt-5 login">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bod">
                        <button type="button" class="log_btn btn btn-secondary btn-lg">Reset Password</button>
                        <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger text-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('reset.forgot.post') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                                @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                @if($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button  type="submit" class="log_btn btn btn-primary text-center btn-lg ">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
