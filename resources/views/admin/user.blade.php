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
                <div class="navbar px-4 py-3 mb-0">
                    <form action="#" class="">
                        <div class="input-group input-group-navbar">
                            <input type="text" class="form-control border-0 rounded-0 me-2 py-2" placeholder="{{__('msg.search')}}...">
                            <button class="btn btn-primary border-0 rounded-0" type="button">{{__('msg.search')}}</button>
                        </div>
                    </form>
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
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72;">
                                            <tr class="fs-4">
                                                <th scope="col">{{__('msg.id')}}</th>
                                                <th scope="col">{{__('msg.name')}}</th>
                                                <th scope="col">{{__('msg.email')}}</th>
                                                <th scope="col">{{__('msg.phone')}}</th>
                                                <th scope="col">{{__('msg.city')}}</th>
                                                <th scope="col">{{__('msg.address')}}</th>
                                                <th scope="col">{{__('msg.user')}}</th>
                                                <th scope="col">{{__('msg.delete')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user )
                                            <tr class="fs-5">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->city}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>
                                                    @if($user->admin != 0)
                                                        Admin
                                                    @else
                                                        Attendee
                                                    @endif
                                                </td>
                                               <td class="text-center">
                                                    <form action="{{ route('deleteUser',$user->id) }}" method="POST">
                                                     @csrf
                                                     <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure you want to delete this user?')">
                                                     <img class="img-fluid" src="https://th.bing.com/th/id/R.877e3e61916ea6657325deab2b04c926?rik=sA2hUAuRYAlGRw&pid=ImgRaw&r=0" style="height: 25px; width: 25px;" alt="">
                                                     </button>
                                                     </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-3 p-2">
                        {!! $users->links() !!}
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
