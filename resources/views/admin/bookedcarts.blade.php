<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeruZ/A</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
@include('includes.admin')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container" style="margin-top: 30px;">
                <div class="navbar px-4 py-3 mb-0">
                    <form id="searchForm" action="{{ route('searchbookedcart') }}" method="GET">
                        <div class="input-group input-group-navbar">
                            <input id="searchInput" type="text" class="form-control border-0 rounded-0 me-2 py-2" name="search" placeholder="{{ __('msg.search') }}...">
                            <button class="btn btn-primary border-0 rounded-0" type="submit">{{ __('msg.search') }}</button>
                        </div>
                    </form>
                    <div class="d-flex align-items-center">
                        <select id="userpage" name="userpage" class="me-2 py-2">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>

                <div class="row justify-content-center mt-4 mb-6">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
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
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: auto;">
                                    <table class="table table-striped mb-0" id="cartadmin">
                                        <thead style="background-color: #002d72;">
                                        <tr class="fs-4">
                                            <th scope="col">{{__('msg.id')}}</th>
                                            <th scope="col">{{__('msg.username')}}</th>
                                            <th scope="col">{{__('msg.title')}}</th>
                                            <th scope="col">{{__('msg.location')}}</th>
                                            <th scope="col">{{__('msg.package')}}</th>
                                            <th scope="col">{{__('msg.bookeddate')}}</th>
                                            <th scope="col">{{__('msg.status')}}</th>
                                            <th scope="col">{{__('msg.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="cartTableBody">
                                        {{-- Ajax --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 p-2" id="paginationLinks">
                        {{-- Pagination links will be inserted here --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
    $(document).ready(function () {
        // Function to fetch cart data with pagination
        function fetchCartData(url) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response && response.data.length > 0) {
                        let carts = response.data;
                        let tableBody = $('#cartTableBody');
                        tableBody.empty();
                        let i=1;
                        carts.forEach(function (cart) {
                            tableBody.append(`
                                <tr class="fs-5">
                                    <td>${i++}</td>
                                    <td>${cart.username}</td>
                                    <td>${cart.title}</td>
                                    <td>${cart.location}</td>
                                    <td>${cart.cost}</td>
                                    <td>${cart.created_at}</td>
                                    <td>${cart.status}</td>
                                    <td>
                                        <ul class="d-flex flex-row list-unstyled mb-0">
                                            <li class="me-2">
                                                <form action="/bookedcartdetail/${cart.cart_id}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-light">
                                                        <img class="img-fluid" src="https://icon-library.com/images/view-icon-png/view-icon-png-22.jpg" style="height: 25px; width: 25px;" alt="">
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="/deletebookedcart/${cart.id}" method="GET" id="deleteForm_${cart.id}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-light delete-cart-btn" data-cart-id="${cart.id}">
                                                        <img class="img-fluid" src="https://th.bing.com/th/id/R.877e3e61916ea6657325deab2b04c926?rik=sA2hUAuRYAlGRw&pid=ImgRaw&r=0" style="height: 25px; width: 25px;" alt="Delete">
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            `);
                        });

                        // Update pagination links
                        $('#paginationLinks').html(response.links);
                    } else {
                        let tableBody = $('#cartTableBody');
                        tableBody.html('<tr><td colspan="8" class="text-center">No carts found.</td></tr>');
                        $('#paginationLinks').empty();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Initial data load
        fetchCartData("{{ route('bookedcarts') }}");

        // Search form submission
        $('#searchForm').submit(function (e) {
            e.preventDefault();
            let searchQuery = $('#searchInput').val().trim();
            let url = $(this).attr('action') + '?search=' + searchQuery;
            fetchCartData(url);
            $('#searchInput').val('');
        });

        // Pagination link click
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            if (url) {
                fetchCartData(url);
            }
        });

        // Delete button click
        $(document).on('click', '.delete-cart-btn', function () {
            const cartId = $(this).data('cart-id');
            const confirmation = confirm('Are you sure you want to delete this cart?');

            if (confirmation) {
                const form = $('#deleteForm_' + cartId);
                form.submit();
            } else {
                console.log('Deletion canceled.');
            }
        });

        // Page size change
        $('#userpage').change(function () {
            let perPage = $(this).val();
            let url = "{{ route('bookedcarts') }}" + '?perPage=' + perPage;
            fetchCartData(url);
        });
    });
</script>
</body>
</html>
