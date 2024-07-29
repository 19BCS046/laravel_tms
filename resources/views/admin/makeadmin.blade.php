<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeruZ/A</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
@include('includes.admin')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container" style="margin-top: 30px;">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-header bg-dark text-white fs-4">
                                {{ __('msg.editadmin') }}
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form action="{{ route('updateadmin', $users->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold fs-5">{{__('msg.name')}}</label>
                                        <input type="text" class="form-control fs-6" id="name" name="name" value="{{ $users->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold fs-5">{{__('msg.email')}}</label>
                                        <input type="text" class="form-control fs-6" id="email" name="email" value="{{ $users->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_admin" class="form-label fw-bold fs-5">{{ __('msg.makeadmin') }}</label>
                                        <select class="form-control fs-6" id="is_admin" name="is_admin" required>
                                            <option value="1" {{ $users->is_admin ? 'selected' : '' }}>{{ __('msg.admin') }}</option>
                                            <option value="0" {{ !$users->is_admin ? 'selected' : '' }}>{{ __('msg.notadmin') }}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('msg.updateadmin') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
