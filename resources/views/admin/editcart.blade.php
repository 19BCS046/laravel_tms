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
                                {{__('msg.editcart')}}
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

                                <form action="{{ route('updatecart',$cart->id)}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold fs-5">{{__('msg.title')}}</label>
                                        <input type="text" class="form-control fs-6" id="title" name="title" value="{{ $cart->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label fw-bold fs-5">{{__('msg.location')}}</label>
                                        <input type="text" class="form-control fs-6" id="location" name="location" value="{{ $cart->location }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label fw-bold fs-5">{{__('msg.imageurl')}}</label>
                                        <input type="text" class="form-control fs-6" id="image" name="image" value="{{ $cart->image }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cost" class="form-label fw-bold fs-5">{{__('msg.package')}}</label>
                                        <input type="text" class="form-control fs-6" id="cost" name="cost" value="{{ $cart->cost }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="vehicle" class="form-label fw-bold fs-5">{{__('msg.vehicle')}}</label>
                                        <input type="text" class="form-control fs-6" id="vehicle" name="vehicle" value="{{ $cart->vehicle }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="from" class="form-label fw-bold fs-5">{{__('msg.from')}}</label>
                                        <input type="date" class="form-control fs-6" id="from" name="from" value="{{ $cart->from }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="to" class="form-label fw-bold fs-5">{{__('msg.to')}}</label>
                                        <input type="date" class="form-control fs-6" id="to" name="to" value="{{ $cart->to }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="overview" class="form-label fw-bold fs-5">{{__('msg.desc')}}</label>
                                        <textarea type="text" class="form-control fs-6" id="overview" name="overview" rows="5" required>{{ $cart->overview }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('msg.updatecart')}}</button>
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
