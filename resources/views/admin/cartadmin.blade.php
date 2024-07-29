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
                    <form id="searchForm" action="{{ route('searchadmin') }}" method="GET" class="d-flex flex-grow-1">
                        <div class="input-group input-group-navbar me-3">
                            <input id="searchInput" type="text" class="form-control border-0 rounded-0 me-2 py-2 " name="search" placeholder="{{ __('msg.search') }}..." style="max-width: 200px;">
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
                        <form action="{{ route('addnewcart') }}" method="GET">
                            <button class="btn btn-primary border-0 rounded-0 py-2" type="submit">{{ __('msg.addnewcart') }}</button>
                        </form>
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
                                            <th scope="col">{{ __('msg.id') }}</th>
                                            <th scope="col">{{ __('msg.title') }}</th>
                                            <th scope="col">{{ __('msg.location') }}</th>
                                            <th scope="col">{{ __('msg.package') }}</th>
                                            <th scope="col">{{ __('msg.vehicle') }}</th>
                                            <th scope="col">{{ __('msg.from') }}</th>
                                            <th scope="col">{{ __('msg.to') }}</th>
                                            <th scope="col">{{ __('msg.action') }}</th>
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
                        {{-- Ajax --}}
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
<script>
    $(document).ready(function () {
        let currentPage = 1;
        let itemsPerPage = $('#userpage').val();

        function fetchCartData(url = "{{ route('cartadmin') }}") {
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    page: currentPage,
                    userpage: itemsPerPage,
                },
                success: function (response) {
                    if (response && response.data.length > 0) {
                        let carts = response.data;
                        let tableBody = $('#cartTableBody');
                        tableBody.empty();
                        let i = (currentPage - 1) * itemsPerPage + 1;
                        carts.forEach(function (cart) {
                            tableBody.append(`
                                <tr class="fs-5">
                                    <td>${i++}</td>
                                    <td>${cart.title}</td>
                                    <td>${cart.location}</td>
                                    <td>${cart.cost}</td>
                                    <td>${cart.vehicle}</td>
                                    <td>${cart.from}</td>
                                    <td>${cart.to}</td>
                                    <td>
                                        <ul class="d-flex flex-row list-unstyled mb-0">
                                            <li class="me-2">
                                                <form action="/viewcart/${cart.id}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-light">
                                                        <img class="img-fluid" src="https://icon-library.com/images/view-icon-png/view-icon-png-22.jpg" style="height: 25px; width: 25px;" alt="">
                                                    </button>
                                                </form>
                                            </li>
                                            <li class="me-2">
                                                <form action="/editdata/${cart.id}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-light">
                                                        <img class="img-fluid" src="https://th.bing.com/th/id/OIP.d1sTN41laBxAg-Uy_pXvmgHaHx?rs=1&pid=ImgDetMain" style="height: 25px; width: 25px;" alt="">
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="/deleteCart/${cart.id}" method="GET" id="deleteForm_${cart.id}">
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

        fetchCartData();

        $('#searchForm').submit(function (e) {
            e.preventDefault();
            let searchQuery = $('#searchInput').val().trim();
            let url = $(this).attr('action') + '?search=' + searchQuery;
            fetchCartData(url);
            $('#searchInput').val('');
        });

        $('#userpage').change(function () {
            itemsPerPage = $(this).val();
            fetchCartData();
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let page = new URL(url).searchParams.get('page');
            currentPage = page;
            fetchCartData(url);
        });

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
    });
</script>
</body>
</html>
