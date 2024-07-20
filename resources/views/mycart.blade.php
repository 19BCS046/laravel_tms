@include('includes.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>{{__('msg.mybook')}}</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($bookings->isEmpty())
            <p>{{__('msg.nobook')}}.</p>
        @else
            <div class="row">
                @foreach($bookings as $booking)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('assets/img/ooty.jpg') }}" class="card-img-top" alt="{{ $booking->cart->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $booking->cart->title }}</h5>
                                <p class="card-text"><i class="bi bi-geo-alt-fill"></i> {{ $booking->cart->location }}</p>
                                <p class="card-text">{{__('msg.from')}}: {{ $booking->cart->from }} {{__('msg.to')}}: {{ $booking->cart->to }}</p>
                                <p class="card-text">{{__('msg.vehicletype')}}: {{ $booking->cart->vehicle }}</p>
                                <p class="card-text">{{__('msg.rating')}}: {{ $booking->cart->rating }}/5</p>
                                <p class="card-text">{{__('msg.package')}}: &#8377; {{ $booking->cart->cost }}</p>
                                <p class="card-text">{{ $booking->cart->overview }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
