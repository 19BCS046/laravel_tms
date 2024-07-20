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
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3"></h3>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card border-0 navbar navbar-expand-lg bg-body-tertiary px-4 py-3" data-bs-theme="medium dark">
                                    <div class="card-body py-2 ">
                                        <a href="{{url('users')}}">
                                        <h2 class="mb-2 fw-bold">
                                            {{__('msg.users')}}
                                        </h2>
                                        </a>
                                        <h5 class="mb-2 fw-bold fs-4">{{$totalUsers}}</h5>
                                        <div class="mb-0 me-3">
                                            <img src="https://th.bing.com/th/id/R.94e01fa32ac34033b6604c24421d61ff?rik=eKSFsSo%2bqzWjog&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-multy-user-icons-512.png&ehk=vJ%2bNNqCcl%2fClw368HosBj5qwEwnIlkLO1SNOJaKwIJY%3d&risl=&pid=ImgRaw&r=0"  class="img-fluid" style="height: 50px; width: auto;"  alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card border-0 navbar navbar-expand-lg bg-body-tertiary px-4 py-3" data-bs-theme="medium dark">
                                    <div class="card-body py-2 ">
                                        <a href="{{url('cartadmin')}}">
                                        <h2 class="mb-2 fw-bold">
                                            {{__('msg.analytics')}}
                                        </h2>
                                        </a>
                                        <h5 class="mb-2 fw-bold">{{__('msg.ana')}}</h5>
                                        <div class="mb-0">
                                            <img src="https://cdn5.vectorstock.com/i/1000x1000/35/84/analytics-flat-icon-vector-7323584.jpg"  class="img-fluid" style="height: 50px; width: auto; margin-left:0px;"  alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card border-0 navbar navbar-expand-lg bg-body-tertiary px-4 py-3" data-bs-theme="medium dark">
                                    <div class="card-body py-1 ">
                                        <a href="{{url('bookedcarts')}}">
                                        <h2 class="mb-2 fw-bold">
                                            {{__('msg.sales')}}
                                        </h2>
                                        </a>
                                        <h5 class="mb-2 fw-bold fs-4">{{$bookedCarts}}</h5>
                                        <div class="mb-0">
                                            <img src="https://th.bing.com/th/id/R.94e01fa32ac34033b6604c24421d61ff?rik=eKSFsSo%2bqzWjog&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-multy-user-icons-512.png&ehk=vJ%2bNNqCcl%2fClw368HosBj5qwEwnIlkLO1SNOJaKwIJY%3d&risl=&pid=ImgRaw&r=0"  class="img-fluid" style="height: 50px; width: auto;"  alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card border-0 navbar navbar-expand-lg bg-body-tertiary px-4 py-3" data-bs-theme="medium dark">
                                    <div class="card-body py-2 ">
                                        <a href="">
                                        <h2 class="mb-2 fw-bold">
                                            {{__('msg.stocks')}}
                                        </h2>
                                    </a>
                                        <h5 class="mb-2 fw-bold">$72,540</h5>
                                        <div class="mb-2 fw-bold fs-3">
                                            <span class="badge text-success me-2">+9.0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center center-container">
                                <img src="https://imgscf.slidemembers.com/docs/1/1/736/admin_dashboard_735221.jpg" alt="" class="img-fluid">
                            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
