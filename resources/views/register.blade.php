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

    .register , .reg_btn{
        font-size: 20px;
    }
    .form-check-input {
            transform: scale(1.5);
            margin-top: 0.3rem;
        }

</style>
<body>
    <div class="register container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <button type="button" class="btn btn-secondary btn-lg">{{__('msg.register')}}</button>
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
                                <label for="name">{{__('msg.name')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname">{{__('msg.last')}}</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('name') }}">
                                @error('lastname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('msg.email')}}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{__('msg.password')}}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">{{__('msg.confirm')}}</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('msg.phone')}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">{{__('msg.city')}}</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city">
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">{{__('msg.address')}}</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check mb-4 ml-5">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example3c" />
                                <label class="form-check-label" for="form2Example3c">
                                    {{__('msg.agree')}} <a href="#!">{{__('msg.term')}}</a>
                                </label>
                            </div>
                            <div class="d-grid gap-2 col-3 mx-auto">
                                <button type="submit" class="btn btn-primary text-center btn-lg">{{__('msg.register')}}</button>
                            </div>
                            <div class="form-group text-center mt-4">
                                <p class="custom_font">{{__('msg.remember')}}? <a href="{{url('login')}}">{{__('msg.login')}}</a></p>
                            </div>

                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
