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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('includes.admin')
<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container" style="margin-top: 30px;">
                <div class="navbar px-4 py-3 mb-0">
                    <form action="{{ route('searchuser') }}" method="GET" id="searchForm" class="d-flex align-items-center">
                        <div class="input-group input-group-navbar me-3">
                            <input type="text" id="searchInput" class="form-control border-0 rounded-0 me-2 py-2" name="search" placeholder="{{ __('msg.search') }}...">
                            <button class="btn btn-primary border-0 rounded-0" type="submit">{{ __('msg.search') }}</button>
                        </div>
                    </form>
                    <div class="page">
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
                                <div id="alerts">
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
                                </div>

                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: auto;">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72;">
                                            <tr class="fs-5">
                                                <th scope="col">{{ __('msg.id') }}</th>
                                                <th scope="col">{{ __('msg.name') }}</th>
                                                <th scope="col">{{ __('msg.email') }}</th>
                                                <th scope="col">{{ __('msg.phone') }}</th>
                                                <th scope="col">{{ __('msg.city') }}</th>
                                                <th scope="col">{{ __('msg.address') }}</th>
                                                <th scope="col">{{ __('msg.user') }}</th>
                                                <th scope="col">{{ __('msg.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
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
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
    $(document).ready(function () {
        function fetchUsers(page = 1, query = '', perPage = 6) {
            $.ajax({
                type: "GET",
                url: "{{ route('searchuser') }}",
                data: {
                    page: page,
                    search: query,
                    userpage: perPage
                },
                success: function (response) {
                    if (response && response.data.length > 0) {
                        let users = response.data;
                        let tableBody = $('#userTableBody');
                        tableBody.empty();
                        users.forEach(function (user, index) {
                            let isAdmin = user.admin !== 0 ? 'Admin' : 'User';
                            tableBody.append(`
                                <tr class="fs-5">
                                    <td>${index + 1}</td>
                                    <td>${user.name}</td>
                                    <td>${user.email}</td>
                                    <td>${user.phone}</td>
                                    <td>${user.city}</td>
                                    <td>${user.address}</td>
                                    <td>
                                        <ul class="d-flex flex-row list-unstyled mb-0">
                                            <li>${isAdmin}</li>
                                            <li class="me-2">
                                                <form action="/makeadmin/${user.id}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-light">
                                                        <img class="img-fluid" src="https://th.bing.com/th/id/OIP.d1sTN41laBxAg-Uy_pXvmgHaHx?rs=1&pid=ImgDetMain" style="height: 20px; width: 20px;" alt="Delete">
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="d-flex flex-row list-unstyled mb-0">
                                            <li class="me-2">
                                                <form action="/deleteUser/${user.id}" method="GET" id="deleteForm_${user.id}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-light delete-user-btn" data-user-id="${user.id}">
                                                        <img class="img-fluid" src="https://th.bing.com/th/id/R.877e3e61916ea6657325deab2b04c926?rik=sA2hUAuRYAlGRw&pid=ImgRaw&r=0" style="height: 25px; width: 20px;" alt="Delete">
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
                        let tableBody = $('#userTableBody');
                        tableBody.html('<tr><td colspan="8" class="text-center">No users found.</td></tr>');
                        $('#paginationLinks').empty();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        fetchUsers();

        $('#searchForm').submit(function (e) {
            e.preventDefault();
            let searchQuery = $('#searchInput').val().trim();
            let perPage = $('#userpage').val() || 6;
            if (searchQuery !== '') {
                fetchUsers(1, searchQuery, perPage);
            } else {
                fetchUsers(1, '', perPage);
            }
        });

        $('#userpage').change(function () {
            let perPage = $(this).val();
            fetchUsers(1, '', perPage);
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let perPage = $('#userpage').val() || 4;
            if (url) {
                let page = url.split('page=')[1];
                fetchUsers(page, '', perPage);
            }
        });

        $(document).on('click', '.delete-user-btn', function () {
            let userId = $(this).data('user-id');
            let confirmation = confirm('Are you sure you want to delete this user?');

            if (confirmation) {
                const form = $('#deleteForm_' + userId);
                form.submit();
            } else {
                console.log('Deletion canceled.');
            }
        });

        function showAlert(message, type) {
            $('#alerts').html(
                `<div class="alert alert-${type}">${message}</div>`
            );
        }
    });
</script>
</body>
</html>
