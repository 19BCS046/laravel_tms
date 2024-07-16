@include('includes.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cd{
            font-size: 25px;
        }
        .card-img-top {

            border-radius: 5px;
        }
        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card-text {
            margin-bottom: 10px;
        }
        .card-title {
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 cd">
        <div class="card shadow-sm" style="width: 100%;">
            <img src="{{ asset('assets/img/ooty.jpg') }}" class="card-img-top" alt="{{ $cart->title }}">
            <div class="card-body">
                <h5 class="card-title fs-1  ">{{ $cart->title }}</h5>
                <p class="card-text"><span class="fw-bold"><i class="bi bi-geo-alt-fill fs-3"></i> Location:</span> {{ $cart->location }}</p>
                <p class="card-text"><span class="fw-bold">From:</span> {{ $cart->from }} <span class="fw-bold">To:</span> {{ $cart->to }}</p>
                <p class="card-text"><span class="fw-bold">Vehicle Type:</span> {{ $cart->vehicle }}</p>
                <p class="card-text"><span class="fw-bold">Ratings:</span>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    {{ $cart->rating }}/5
                </p>
                <p class="card-text"><span class="fw-bold">Package:</span> &#8377; {{ $cart->cost }}</p>
                <p class="card-text"><span class="fw-bold">Description:</span></p>
                <p class="card-text">{{ $cart->overview }}</p>

                <form action="{{ route('book', $cart->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary fs-4">Book Now</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
