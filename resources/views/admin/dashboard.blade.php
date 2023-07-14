<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	{{-- thumbnail --}}
    <link rel="shortcut icon" href="{{ url('assets/img/icons/sews.png') }}" />

	{{-- <link rel="canonical" href="https://demo-basic.adminkit.io/" /> --}}

    <title>Admin Dashboard</title>


    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ url('assets/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/dashboard.css') }}" type="text/css" rel="stylesheet">
	{{-- <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}" rel="stylesheet"> --}}
</head>
<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('tests.index') }}">
                    <span class="align-middle"><img src={{ url('assets/img/photos/sews.png') }} width="25px" height="25px" alt="sews">&nbsp; Dashboard</span>
                <hr>

                </a>
            <ul class="sidebar-nav">

                <li class="sidebar-item mx-4 mt-3 text-light">
                    Dashboard
                    <hr class="m-0">
                </li>

                <li class="sidebar-item mb-2 {{ Request::is('admin/analytics') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('dashboard.analytics') }}">
                        <i class="fa-solid fa-chart-simple"></i><span class="align-middle">Analytics</span>
                    </a>
                </li>

                <li class="sidebar-item mx-4 mt-3 text-light">
                    Users Management
                    <hr class="m-0">
                </li>

                <li class="sidebar-item mb-2 {{ Request::is('admin/users') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('users.index') }}">
                        <i class="fa-solid fa-users"></i><span class="align-middle">Users</span>
                    </a>
                </li>

                <li class="sidebar-item mx-4 mt-3 text-light">
                    Test Management
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('admin/categories') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('categories.index') }}">
                        <i class="fa-solid fa-list"></i><span class="align-middle">Categories</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/questions') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('questions.index') }}">
                        <i class="fa-solid fa-question-circle"></i><span class="align-middle">Questions</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/options') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('options.index') }}">
                        <i class="fa-solid fa-list-check"></i><span class="align-middle">Options</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/import') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('import.index') }}">
                        <i class="fa-solid fa-upload"></i><span class="align-middle">Import Data</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/results') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('adminResults.index') }}">
                        <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                    </a>
                </li>

                @if (Auth::check())
                    <li class="sidebar-item" id="logout">
                        <a class="sidebar-link fs-5" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket text-secondary"></i>&nbsp;
                            {{ __('Logout') }}
                        </a>
                    </li>
                @endif
            </ul>


        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">

                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                @if (Auth::check())
                    <div class="sidebar-brand mt-0 text-dark">
                        Welcome <span class="text-primary">{{ Auth::user()->name }}</span>
                    </div>
                @endif

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    <span class="text-dark"><i class="fa-solid fa-user text-primary"></i>&nbsp; {{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item text-secondary" href="pages-profile.html"><i class="fa-solid fa-user text-secondary"></i>&nbsp; Profile</a>

                                    <div class="dropdown-divider"></div>
                                    <div>
                                        <a class="dropdown-item text-secondary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-from-bracket text-secondary"></i>&nbsp;
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            @yield('dashboard')

            {{-- <div class="mt-5 pt-5">
                <footer class="bg-white p-0">
                    <p class="text-secondary text-center p-2">Copyrights &copy; 2022-2023 | by <span class="username">zakaria boughaba</span></p>
                </footer>
            </div> --}}

        </div>
    </div>


	<script src="{{ url('assets/js/app.js') }}" ></script>
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            // random border-left-color for categories card
            // let $box = $('#box');
            // console.log($box);
            // $($box).each(function () {
            //     let colors = ['#00c271','#27316e','#ad0034','#006bcf'];
            //     let randColor = Math.floor(Math.random() * colors.length);
            //     $(this).css('background-color', colors[randColor]);
            // });
            // -------------------------------------------------------------
            $('#select_all_id').click(function (event) {
                if (this.checked) {
                    $(':checkbox').each(function () {
                        this.checked = true;
                    });
                }else {
                    $(':checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
        // $(function(e){
        //     $("#select_all_id").click(function(){
        //         $('.checkbox_ids').prop('checked', $(this).prop('checked'));
        //     });
        // });
    </script>
</body>
</html>
