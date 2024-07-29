<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeruZ</title>
  <link href="{{asset('assets/img/l2.jfif')}}" rel="icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
      body {
            height: 100vh;
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
                    <button type="button" class="log_btn btn btn-secondary btn-lg">{{__('msg.login')}}</button>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger text-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{__('msg.email')}}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{__('msg.password')}}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="new-password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-md-end">
                                <a href="{{route('forgot.password.get')}}">{{__('msg.forgot')}}?</a>
                              </div>
                            <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="log_btn btn btn-primary text-center btn-lg">{{__('msg.login')}}</button>
                        </div>
                        <div class="form-group text-center mt-4">
                            <p class="custom_font">{{__('msg.member')}}? <a href="{{url('register')}}">{{__('msg.register')}}</a></p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
