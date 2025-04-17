<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Mains Orbit" />
    <meta name="description" content="Mains Orbit" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title  -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('./assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('./assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('./assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('./assets/admin/img/logo.png')}}" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{asset('/assets/front/css/plugins.css')}}" />

    <!-- search css -->
    <link rel="stylesheet" href="{{asset('/assets/front/search/search.css')}}" />

    <!-- quform css -->
    <link rel="stylesheet" href="{{asset('/assets/front/quform/css/base.css')}}">

    <!-- core style css -->
    <link href="{{asset('/assets/front/css/styles.css')}}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>

    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js"></script>
    <link href="https://fonts.cdnfonts.com/css/gilroy" rel="stylesheet">


</head>



<style>
    .custom-background {
        background-size: contain !important;
        background-position: center center !important;
        background-repeat: no-repeat !important;
        min-height: 500px; 
    }

    .slider-fade1 {
        width: 100vw !important;
        max-width: 100%;
    }

    .slider-fade1 .item {
        width: 100vw !important;
        min-height: 600px;
        background-size: cover !important; 
        background-position: center center !important;
        background-repeat: no-repeat !important;
    }

    ul.list-unstyled {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.list-unstyled li a {
        font-size: 30px;
        color: #ffffff;
        transition: color 0.3s ease-in-out;
    }

    ul.list-unstyled li a:hover {
        color: #007bff;
    }

    .team-section {
        /* background: rgba(248, 249, 250); */
        background: #fefefe;

        color: white;
        padding: 0px -39px;
        min-height: 400px;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        flex-wrap: wrap;
        justify-content: flex-end;
        
    }
    /* .team-section {
        background: rgba(248, 249, 250);
        color: white;
        padding: 20px 20px;
        min-height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    } */

    .team-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        max-width: 1100px;
        /* margin: auto; */
    }

    .team-container:only-child, 
    .team-container .team-member:only-child {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* background: #fefefe; */
        background: rgba(248, 249, 250);

        border-radius: 10px;
        border: 2px solid #e0dedeb0;
        padding: 20px;
        width: 250px;
        height: 250px;
        box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
        position: relative;
        transition: border 0.3s ease; 
        border: 2px solid transparent;
    }

    .team-member:hover {
        border: 2px solid #ff7029;
    }


    /* ✅ Fixed Centering Issue for Single Member */
    .team-container.single-member {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .team-container.single-member .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .team-container.single-member .team-member img {
        left: 0;  /* Remove left offset */
        transform: translateX(0); /* Center align */
    }

    /* ✅ Updated Image Styling */
    .team-member img {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        border: 2px solid rgba(248, 249, 250);
        object-fit: cover;
        position: relative;
        left: 38px;  /* Remove left offset */
        transform: translateX(0); /* Center align */
    }

    .team-member h3, 
    .team-member p {
        margin-top: 10px;
        text-align: center;
        font-size: 15px;
        color: white;
    }

    .slick-prev, .slick-next {
        background: #2c316f;
        border: none;
        color: white;
        font-size: 18px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
    }
    .slick-prev:hover, .slick-next:hover{
        background: #2c316f;
    }

    .slick-prev {
        left: -15px;
    }

    .slick-next {
        right: -15px;
    }

    .slick-slide {
        margin: 0 15px;
    }


    .team-container.single-member {
        max-width: 400px; 
        margin: auto; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .team-container.single-member .team-member {
        width: 100%;
        max-width: 320px;
    }


    @media screen and (max-width: 768px) {
        .buy-theme {
            transition-timing-function: ease-in-out;
            transition-duration: .2s;
            position: fixed;
            top: 88%;
            right: -95px;
            z-index: 9999
        }
        .buy-theme a,
        .buy-whatsapp a,
        .buy-you a,
        .all-demo a {
            color: #232323;
            font-size: 10px;
            text-transform: uppercase;
            padding: 5px 10px;
            display: block;
            text-decoration: none;
            font-weight: 500
        }

        .buy-theme img {
            font-size: 36px;
            vertical-align: middle;
            position: relative;
            top: -1px;
            color: #fff
        }
        .team-section {
            background: #fefefe;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 43px 20px;
            min-height: 431px;
        }
        .team-container.single-member {
            max-width: 80%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-container.single-member .team-member {
            width: 100%; 
            max-width: 280px; 
            padding: 15px; 
            text-align: center;
        }

        .team-container.single-member .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .team-container.single-member .team-member img {
            left: 0;  /* Remove left offset */
            transform: translateX(0); /* Center align */
        }

        .guide{
            margin-bottom:-8px;
        }

        .evaluate{
            font-size: 7px !important;
        }
        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* background: #fefefe; */
            background: rgba(248, 249, 250);
            border: 2px solid #e0dedeb0;
            border-radius: 10px;
            padding: 20px;
            width: 220px;
            height: 298px;
            box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
            position: relative;
            transition: border 0.3s ease; 
            border: 2px solid transparent;
        }

        .team-member:hover {
            border: 2px solid #ff7029;
        }

        /* ✅ Updated Image Styling */
        .team-member img {
            width: 170px;
            height: 170px;
            border-radius: 10px;
            border: 2px solid rgba(248, 249, 250);
            object-fit: cover;
            position: relative;
            left: 65px;  
            transform: translateX(0); 
        }
    }
</style>
<style>

    .modal-header .btn-close {
        position: absolute;
        right: 1rem;
        top: 1rem;
        background: none;
        color: orange;
        opacity: 1;
        font-size: 1.2rem;
    }

    .modal-header .btn-close:hover {
        color: darkorange;
    }
    .modal-header {
        position: relative;
        justify-content: center;
        border-bottom: none;
    }

    .modal-header .btn-close {
        position: absolute;
        right: 1rem;
        top: 1rem;
    }
    .custom-modal-content {
        border: 2px solid #ff7029;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(255, 165, 0, 0.3);
        background-color: #fff;
        padding: 15px;
    }

    .modal-body {
        background-color: #fff7f0;
        border-radius: 10px;
        font-family: 'Segoe UI', sans-serif;
    }

    .loginb {
        background-color: white;
        border: 2px solid #ff7029;
        border-radius: 10px;
        transition: 0.3s;
        font-weight: bold;
    }

    .loginb:hover {
        background-color: #ff7029;
        color: white;
    }

    .or-divider {
        color: #ff7029;
        font-weight: bold;
    }

    hr {
        border-top: 1px solid #ff7029;
        margin: 10px 0;
    }

    select.form-control,
    textarea.form-control,
    input.form-control {
        border: 1px solid #ff7029;
        border-radius: 10px;
    }

     .btn-login {
        border-radius: 10px;
        background-color: #2c316f;
        color: #fff7f0;
        border: none;
        font-weight: bold;
    }

    .btn-login:hover:hover {
        background-color: #ff7029;
        color: #fff7f0;
    } 

    .navbar-nav li a:hover {
        color: #ff7029 !important;
    }
</style>

<body>

    <div class="main-wrapper">

        <header class="header-style1 menu_area-light">

            <div class="navbar-default">

                <!-- start top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">
                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="/" class="navbar-brand"><img id="logo" src="
                                            {{asset('./assets/admin/img/logo.png')}}
                                            " alt="logo"/></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li>
                                            @auth
                                                @if(Auth::user()->state == 'cg')
                                                    <a href="{{ url('cghome') }}">Home</a>
                                                @elseif(Auth::user()->state == 'mp')
                                                    <a href="{{ url('mphome') }}">Home</a>
                                                @else
                                                   <a href="">Home</a>
                                                @endif
                                            @else
                                                @if(Session::has('selected_state'))
                                                    @if(Session::get('selected_state') == 'cg')
                                                        <a href="{{ url('cghome') }}">Home</a>
                                                    @elseif(Session::get('selected_state') == 'mp')
                                                        <a href="{{ url('mphome') }}">Home</a>
                                                    @else
                                                        <a href="">Home</a>
                                                    @endif
                                                @endif
                                            @endauth
                                        </li>
                                        <li>
                                            @auth
                                                @if(Auth::user()->state == 'cg')
                                                    <a href="{{ url('cgplan') }}">Plans</a>
                                                @elseif(Auth::user()->state == 'mp')
                                                    <a href="{{ url('ourplan') }}">Plans</a>
                                                @else
                                                    <a href="">Plans</a>
                                                @endif
                                            @else
                                                @if(Session::has('selected_state'))
                                                    @if(Session::get('selected_state') == 'cg')
                                                    <a href="{{ url('cgplan') }}">Plans</a>
                                                    @elseif(Session::get('selected_state') == 'mp')
                                                    <a href="{{ url('ourplan') }}">Plans</a>
                                                    @else
                                                        <a href="">Plans</a>
                                                    @endif
                                                @endif
                                            @endauth
                                        </li>
                                        <li>
                                            @auth
                                                @if(Auth::user()->state == 'cg')
                                                    <a href="{{ url('cgpyq') }}">PYQ</a>
                                                @elseif(Auth::user()->state == 'mp')
                                                    <a href="{{ url('pyq') }}">PYQ</a>
                                                @else
                                                    <a href="">PYQ</a>
                                                @endif
                                            @else
                                                @if(Session::has('selected_state'))
                                                    @if(Session::get('selected_state') == 'cg')
                                                    <a href="{{ url('cgpyq') }}">PYQ</a>
                                                    @elseif(Session::get('selected_state') == 'mp')
                                                    <a href="{{ url('pyq') }}">PYQ</a>
                                                    @else
                                                        <a href="">PYQ</a>
                                                    @endif
                                                @endif
                                            @endauth
                                        </li>
                                        <li><a href="{{url('/MainsPractice')}}">Mains Practice Question</a></li>
                                        <li><a href="{{url('/aboutus')}}">About</a></li>
                                        <li><a href="{{url('/contact')}}">Contact</a></li>
                                        @if(Auth::check())
                                        @php
                                                $user = Auth::user();
                                                $districtName = 'Unknown';
                                            
                                                if ($user->state === 'cg') {
                                                    $districtName = DB::table('cg_district')->where('id', $user->district)->value('name');
                                                } elseif ($user->state === 'mp') {
                                                    $districtName = DB::table('mp_district')->where('id', $user->district)->value('name');
                                                }
                                            @endphp
                                            <li>
                                                <a href="{{route('user.count')}}"> <i class="fas fa-user me-1"></i></a>
                                                <ul>
                                                    <li><a href="#!"><i class="fas fa-user me-1"></i> {{ Auth::user()->name }}</a></li>
                                                    <li><a href=""><i class="fas fa-envelope me-1"></i> {{ Auth::user()->email }}</a></li>
                                                    <li><a href=""><i class="fas fa-map-marker-alt me-1"></i> {{ $districtName }}</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        
                                    </ul>
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                       
                                        <ul>
                                            @if(Auth::check())

                                        
                                                <li class="d-none d-xl-inline-block">
                                                    <a href="{{route('user.logout')}}" class="butn md text-white">
                                                        <i class="fas fa-sign-out-alt icon-arrow before"></i>
                                                        <span class="label">Logout</span>
                                                        <i class="fas fa-sign-out-alt icon-arrow after"></i>
                                                    </a>
                                                   
                                                </li>

                                                <li class="d-block d-xl-none">
                                                    <a href="{{route('user.logout')}}" class="butn md text-white">
                                                        <i class="fas fa-sign-out-alt icon-arrow before"></i>
                                                        <span class="label">Logout</span>
                                                        <i class="fas fa-sign-out-alt icon-arrow after"></i>
                                                    </a>
                                                   
                                                </li>

                                            @else
                                            <li class="d-block d-xl-none"> <!-- Mobile me dikhane ke liye -->
                                                <a href="{{ route('login') }}" class="butnlogin butn md text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <i class="fas fa-user icon-arrow before"></i>
                                                    <span class="label">Login</span>
                                                    <i class="fas fa-user icon-arrow after"></i>
                                                </a>
                                            </li>
                                            <li class="d-none d-xl-inline-block"> <!-- Sirf desktop par dikhane ke liye -->
                                                <a href="{{ route('login') }}" class="butnlogin butn md text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <i class="fas fa-plus-circle icon-arrow before"></i>
                                                    <span class="label">Login</span>
                                                    <i class="fas fa-plus-circle icon-arrow after"></i>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                        
                                    </div>
                                    <!-- end attribute navigation -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="marquee-section py-3" style="background: #2c316f1f; height: 50px; overflow: hidden;">
                    <div class="container">
                        <div class="marquee-wrapper" style="display: flex; align-items: center; height: 100%;">
                            <marquee behavior="scroll" direction="left" scrollamount="5" style="width: 100%; display: flex; align-items: center;">
                                <div style="display: flex; align-items: center;">
                                    <img src="{{ asset('/assets/front/img/logos/of.svg') }}" alt="offer" style="height: 30px; margin-right: 10px;">
                                    <h4 style="color: #2c316f; font-size: 16px; white-space: nowrap;">
                                        {{ $offers->description }}
                                    </h4>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </section>
            </div>
        </header>
        <div class="modal fade" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-content">

                    <div class="modal-header">
                        <img src="{{ asset('./assets/admin/img/logo.png') }}" alt="Logo" height="50" width="50">
                        <button type="button" class="btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark" style="color: #ff7029; font-size: 1.2rem;"></i>
                        </button>
                    </div>

                    <div class="modal-body">

                        <!-- Google Login Button -->
                        <button id="loginBtn" class="btn w-100 d-flex align-items-center justify-content-center py-2 loginb">
                            <img src="{{ asset('/assets/front/img/logos/google.png') }}" 
                                alt="Google Logo" width="20" class="me-2">
                            Login with Google
                        </button>

                        <p id="user"></p>

                        <!-- OR Divider -->
                        <div class="text-center my-2">
                            <span class="or-divider">OR</span>
                        </div>
                        <hr>

                        <!-- Email Form -->
                        @if(!session('otp_sent'))
                        <form action="{{ route('send.otp') }}" method="post" id="emailForm">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="emailInput" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <button type="submit" class="btn btn-login w-100">Send OTP</button>
                        </form>
                        @endif

                        <!-- OTP Verification Form -->
                        @if(session('otp_sent'))
                        <form action="{{ route('verify.otp') }}" method="post" id="otpForm">
                            @csrf
                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter OTP</label>
                                <input type="text" class="form-control" name="otp" required>
                                @error('otp') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <p style="font-size: 10px">
                                <i class="fa-solid fa-circle-exclamation"></i> In case if you haven't received OTP please check your spam folder.
                            </p>
                            <button type="submit" class="btn btn-login w-100">Verify OTP</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Check if session has OTP sent message
                    @if(session('otp_sent'))
                        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        loginModal.show();
                    @endif
                });
            </script>
      
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if(session('success'))
                    Swal.fire({
                        title: "Submitted!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                @endif

                @if(session('error'))
                    Swal.fire({
                        title: "Oops!",
                        text: "{{ session('error') }}",
                        icon: "error",
                        confirmButtonColor: "#d33",
                        confirmButtonText: "Try Again"
                    });
                @endif
            });
        </script>
        