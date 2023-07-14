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

    <title>QCM test</title>


    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ url('assets/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/dashboard.css') }}" type="text/css" rel="stylesheet">
	{{-- <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}" rel="stylesheet"> --}}
    <style>
        .form-section{
            display: none;
        }
        .form-section.current{
            display: inline;
        }
    </style>
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
                    Start The Test
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('/') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('tests.index') }}">
                        <i class="fa-solid fa-chart-simple"></i><span class="align-middle">Test Page</span>
                    </a>
                </li>

                <li class="sidebar-item mx-4 mt-3 text-light">
                    Show Results
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('candidate/results') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('results.index') }}">
                        <i class="fa-solid fa-file-circle-check"></i><span class="align-middle">Your Results</span>
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

            @yield('content')


        </div>
    </div>


	<script src="{{ url('assets/js/app.js') }}" ></script>
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function(){
            // -------------------
            let timer;
            var $sections = $('.form-section');
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                // $('.form-navigation .previous').toggle (index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation .submit').toggle(atTheEnd);
                $('#index').text(index + 1);

                displayTimer(index);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .next').click(function() {
                clearInterval(timer);
                navigateTo(curIndex() + 1);
            });

            // console.log($sections);
            navigateTo(0);

            function displayTimer(index) {
                if (index < $sections.length){
                    $('#timer').each(function(){
                        let timeLimit = $(this).data('time-limit');
                        let timerElement = $(this);
                        timer = setInterval(function() {
                            // Decrement the duration
                            timeLimit--;
                            if (timeLimit <= 5) {
                                $('.timer_span').addClass('text-danger');
                            }
                            // If the timer reaches 0, stop the timer and submit the form
                            if (timeLimit < 0) {
                                clearInterval(timer);
                                $('.timer_span').removeClass('text-danger');
                                setTimeout(function() {
                                    $('#next_question').trigger('click');
                                }, timer);

                            }else{
                                timerElement.text(timeLimit);
                            }
                        }, 1000);
                    });
                }else{
                    clearInterval(timer);
                    $('.timer_span').removeClass('text-danger');
                    setTimeout(function() {
                        $('#submit_btn').trigger('click');
                    }, timer);
                }
            }

            function showConfirmationExit(){
                let confirmed = confirm('Are you sure you want to exit the test ?');
                if(confirmed){
                    window.location.href = '/';
                }
            }

            $('#exit_test').click(function(e){
                e.preventDefault();
                showConfirmationExit();
            });

        });
        // function disableBackBtn() {
        //     window.history.forward();
        // }
        // disableBackBtn();
        // window.onload = disableBackBtn;
    </script>
</body>
</html>
