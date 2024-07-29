@include('includes.navbar')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://th.bing.com/th/id/R.c3631c652abe1185b1874da24af0b7c7?rik=XBP%2fc%2fsPy7r3HQ&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-circled-user-icon-2240.png&ehk=z4ciEVsNoCZtWiFvQQ0k4C3KTQ6wt%2biSysxPKZHGrCc%3d&risl=&pid=ImgRaw&r=0" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: white;">
                        <h4 class="text-black">{{ __('msg.edit') }}</h4>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                        <form action="{{ route('updatepassword') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="old_password">{{ __('msg.oldpassword') }}</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">{{ __('msg.newpassword') }}</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">{{ __('msg.confirmpassword') }}</label>
                                <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('msg.updatepassword') }}</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header text-light bg-dark">
                            <h4 class="text-white">{{ __('msg.edit') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                </div>
                            @endif
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{ __('msg.name') }}:</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">{{ __('msg.last') }}:</label>
                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="email">{{ __('msg.email') }}:</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="city">{{ __('msg.city') }}:</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city', $user->city) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{ __('msg.address') }}:</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{ __('msg.phone') }}:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('msg.update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
