<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
      body {
            height: 100vh; /* Ensure full viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
        }
    .custom_font,.log_btn{
        font-size: 20px;
    }
    .login{
        font-size: 20px;
        margin-top: 20px;
    }

</style>
<body>
    <div class="container mt-5 login">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <button type="button" class="log_btn btn btn-secondary btn-lg">Reset Password</button>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message') }}
                            </div>
                        @endif
                        {{-- @if(session('error'))
                            <div class="alert alert-danger text-danger">
                                {{ session('error') }}
                            </div>
                        @endif --}}
                        <form method="POST" action="{{ route('forgot.password.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                            <button  type="submit" class="log_btn btn btn-primary text-center btn-lg ">Sent Password  Reset Link</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
