<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeruZ</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">{{__('msg.logo')}}</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ url('dashboard') }}" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>{{__('msg.dashboard')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{url('users')}}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>{{__('msg.users')}}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('cartadmin')}}" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>{{__('msg.touristcarts')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{url('bookedcarts')}}" class="sidebar-link" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>{{__('msg.bookedcarts')}}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="lni lni-exit"></i>
                        <span>{{__('msg.logout')}}</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="lni lni-exit"></i>
                    <span>{{__('msg.logout')}}</span>
                </a>
            </div>
        </aside>
{{-- navbar --}}
        <div class="main">
            <nav class="navbar navbar-expand-lg bg-body-tertiary px-4 py-3" data-bs-theme="medium dark">
                <form action="#" class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                    </div>
                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item dropdown me-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle fs-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span id="selectedLanguage"></span>
                                    <img id="selectedIcon" src="" alt="" style="width: 30px; height: auto;">
                                </button>
                                <ul class="dropdown-menu py-3" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item fs-5 d-flex justify-content-between align-items-center" href="{{ route('lang.switch', 'en') }}" data-icon="https://static.vecteezy.com/system/resources/previews/000/532/212/original/vector-united-states-of-america-flag-usa-flag-america-flag-background.jpg" data-lang="English">
                                            English
                                            <img src="https://static.vecteezy.com/system/resources/previews/000/532/212/original/vector-united-states-of-america-flag-usa-flag-america-flag-background.jpg" alt="English" style="width: 30px; height: auto;">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item fs-5 d-flex justify-content-between align-items-center" href="{{ route('lang.switch', 'es') }}" data-icon="https://static.vecteezy.com/system/resources/previews/000/401/734/original/illustration-of-spain-flag-vector.jpg" data-lang="Spanish">
                                            Spanish
                                            <img src="https://static.vecteezy.com/system/resources/previews/000/401/734/original/illustration-of-spain-flag-vector.jpg" alt="Spanish" style="width: 30px; height: auto;">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item fs-5 d-flex justify-content-between align-items-center" href="{{ route('lang.switch', 'ar') }}" data-icon="https://wallpapercave.com/wp/wp4215855.jpg" data-lang="Arabic">
                                            Arabic
                                            <img src="https://wallpapercave.com/wp/wp4215855.jpg" alt="Arabic" style="width: 30px; height: auto;">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item fs-5 d-flex justify-content-between align-items-center" href="{{ route('lang.switch', 'tamil') }}" data-icon="https://i.redd.it/flag-of-tamil-nadu-india-v0-un0lcwzewpr91.png?auto=webp&s=81a2afaaa1376c0a13d5564dc1f4036eeeb8c99f" data-lang="தமிழ்">
                                            தமிழ்
                                            <img src="https://i.redd.it/flag-of-tamil-nadu-india-v0-un0lcwzewpr91.png?auto=webp&s=81a2afaaa1376c0a13d5564dc1f4036eeeb8c99f" alt="Tamil" style="width: 30px; height: auto;">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{asset('assets/img/account.png')}}" class="avatar img-fluid"  style="height: 70px; width:70px;" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const currentLocale = '{{ app()->getLocale() }}';
            const iconMap = {
                'en': 'https://static.vecteezy.com/system/resources/previews/000/532/212/original/vector-united-states-of-america-flag-usa-flag-america-flag-background.jpg',
                'es': 'https://static.vecteezy.com/system/resources/previews/000/401/734/original/illustration-of-spain-flag-vector.jpg',
                'ar': 'https://wallpapercave.com/wp/wp4215855.jpg',
                'tamil': 'https://i.redd.it/flag-of-tamil-nadu-india-v0-un0lcwzewpr91.png?auto=webp&s=81a2afaaa1376c0a13d5564dc1f4036eeeb8c99f'
            };
            const languageMap = {
                'en': '',
                'es': '',
                'ar': '',
                'tamil': ''
            };

            const selectedIcon = document.getElementById('selectedIcon');
            const selectedLanguage = document.getElementById('selectedLanguage');
            selectedIcon.src = iconMap[currentLocale];
          //  selectedLanguage.textContent = languageMap[currentLocale];

            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    selectedIcon.src = this.getAttribute('data-icon');
                  //  selectedLanguage.textContent = this.getAttribute('data-lang');
                    window.location.href = this.href;
                });
            });
        });
    </script>
</body>
</html>
