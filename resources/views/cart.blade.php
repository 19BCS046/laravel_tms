@include('includes.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Places</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8 mb-4">
                <form action="{{ url('/search') }}" method="GET" class="form-inline">
                    <input type="text" name="search" class="form-control mr-sm-2 p-4" placeholder="{{__('msg.searchplace')}}...">
                    <button type="submit" class="btn btn-outline-success fs-4 ">{{__('msg.search')}}</button>
                </form>
            </div>
            <div class="col-md-4 text-right mb-4">
                <a href="{{ url('/topplace') }}" class="btn btn-primary fs-4">{{__('msg.top')}}</a>
            </div>
            @foreach($touristCart as $cart)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('assets/img/ooty.jpg') }}" class="card-img-top" alt="{{ $cart->title }}">
                        <div class="card-body">
                            <h5 class="card-title fs-3">{{ $cart->title }}</h5>
                            <p class="card-text fs-5"><i class="bi bi-geo-alt-fill fs-5"></i> {{ $cart->location }}</p>
                            <p class="card-text fs-5">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                {{ $cart->rating }}/5
                            </p>
                            <a href="{{ url('cartdetails/' . $cart->id) }}" class="btn btn-primary fs-5">View</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-md-4">
            {!! $touristCart->links() !!}
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
