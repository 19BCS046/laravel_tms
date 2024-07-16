@include('includes.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Tourist Places</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-8 mb-4">
            <form action="{{ url('/search') }}" method="GET" class="form-inline">
                <input type="text" name="search" class="form-control mr-sm-2 p-4" placeholder="Search for places...">
                <button type="submit" class="btn btn-outline-success fs-4 ">Search</button>
            </form>
        </div>
        <h2 class="mb-4">Top Tourist Places</h2>

        <div class="row">
            @forelse($places as $place)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('assets/img/ooty.jpg') }}" class="card-img-top" alt="{{ $place->title }}">
                    <div class="card-body">
                        <h5 class="card-title fs-3">{{ $place->title }}</h5>
                        <p class="card-text fs-5"><i class="bi bi-geo-alt-fill fs-5"></i> {{ $place->location }}</p>
                        <p class="card-text fs-5">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            {{ $place->rating }}/5
                        </p>
                        <a href="{{ url('cartdetails/' . $place->id) }}" class="btn btn-primary fs-5">View</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="card-text fs-3">No results found for "{{ $query }}".</p>
            </div>
            @endforelse
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
