<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
      
    .register , .reg_btn{
        font-size: 20px;
    }
    .form-check-input {
            transform: scale(1.5); /* Increase checkbox size */
            margin-top: 0.3rem; /* Adjust vertical alignment */
        }

</style>
<body>
    <div class="register container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <button type="button" class="btn btn-secondary btn-lg">Register</button>
                <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            {{-- <div class="alert alert-info">
                                Your access token: {{ session('token') }}
                            </div> --}}
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check mb-4 ml-5">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example3c" />
                                <label class="form-check-label" for="form2Example3c">
                                    I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div>
                            <div class="d-grid gap-2 col-3 mx-auto">
                                <button type="submit" class="btn btn-primary text-center btn-lg">Register</button>
                            </div>
                            <div class="form-group text-center mt-4">
                                <p class="custom_font">Do you remember? <a href="{{url('login')}}">Login</a></p>
                            </div>

                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
