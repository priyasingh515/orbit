
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js"></script>
    <link href="https://fonts.cdnfonts.com/css/gilroy" rel="stylesheet">


</head>

<style>
    .dropdown-menu li a {
        background-color: orange !important;
        color: white !important;
        padding: 10px 15px;
        display: block;
    }

    .dropdown-menu li a:hover {
        background-color: darkorange !important;
    }
</style>


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
    

    .headcap{
            display: inline-block;
            font-size: 40px;
            margin-top:-68px;
    }
    .headcap:first-letter {
        text-transform: uppercase;
    }


    .but {
        font-size: 30px;
        padding: 12px 36px; 
        border-radius: 8px;
        font-weight: bold;
        display: inline-flex; 
        align-items: center; 
        justify-content: center;
        gap: 10px; 
        /* text-transform: uppercase; */
    }

    @media (max-width: 768px) {

        .but {
            font-size: 16px; 
            padding: 8px 16px;
            width: auto; 
            text-align: center;
            display: inline-flex; 
            margin-bottom: 8px;
        }

        .but i {
            font-size: 18px; 
        }

        .headcap { 
            font-size: 28px; 
            margin-top: 20px !important; 
            text-align: center; 
        }

        .col-md-10.col-lg-8.col-xl-7 {
            text-align: center; 
            padding-top: 20px;
        }
        
    }

    .sample {
        background-color: #2c316f;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .sample a {
        color: #273044; 
        text-decoration: none;
    }

    .sample h3 {
        color: white;
    }

    .contact-card {
            border: none;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #313460;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 250px; /* Adjust width */
            margin: auto; /* Center align */
        }

        .contact-card:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 43px;
        }

        .contact-icon {
            height: 60px;
            width: 60px;
            display: block;
            margin: 0 auto;
        }

        .contact-card a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-info {
            color: #fff;
            font-size: 14px;
        }

        .contact-cards{
            border: none;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #313460;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            margin: auto; 
        }
        .contact-cards:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .contact-cards a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
</style>
<style>
    .icon-box {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #2c316f;
        border-radius: 50%;
        transition: transform 0.3s ease-in-out;
    }
    .icon-box:hover {
        transform: scale(1.2);
    }

    /* ✅ Mobile View */
    @media (max-width: 767px) {
        .headcap{
            font-size: 25px !important;
        }
        
        .row {
            /* margin-top: 20px; */
            /* flex-direction: column; */
            align-items: start;
            gap: 0px;
        }
        .col-auto {
            width: 100%;
            justify-content: start; 
            display: flex;
            align-items: center;
            gap: 10px; 
            margin: 5px 0; 
        }
        .icon-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2c316f;
        }
        .icon-box i {
            font-size: 1.5rem;
        }
        .col-auto a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px;
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

<body class="modal-open">

    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
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
                                            {{-- <a href="{{url('/ourplan')}}">Plan</a> --}}
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
                                            {{-- <a href="{{url('/pyq')}}">PYQ</a> --}}
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
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                        {{-- <ul>
                                            <li class="d-none d-xl-inline-block"><a href="{{route('login')}}" class="butn md text-white" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-plus-circle icon-arrow before"></i><span class="label">Login</span><i class="fas fa-plus-circle icon-arrow after"></i></a></li>
                                        </ul> --}}

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
        
       

    <!-- BANNER
            ================================================== -->

    <section class="top-position1 p-0 mt-0">
        <div class="container-fluid px-0">
            <div class="slider-fade1 owl-carousel owl-theme w-100">
                @foreach ($slider as $sliders)
                    <div class="item bg-img  pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-24 left-overlay-dark"
                        data-overlay-dark="8" style="background-image: url('{{ url('/admin/sliders/', $sliders->image) }}');">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    <h1 class="display-1 font-weight-800 mb-2-6 title text-white headcap" style="font-size: 40px;margin-top:-68px; text-transform:uppercase">
                                        {{ $sliders->heading }}
                                    </h1>
                                    <span class="h5 text-secondary">{{ $sliders->paragraph }}</span>
                                    <a href="{{route('user.questionadd')}}" class="butn my-1 mx-1 but"><span class="label">Take Demo</span></a>
                                    {{-- <a href="{{url('ourplan')}}" class="butn white my-1 but"><span class="label">Pick a Plan</span></a> --}}
                                    @php
                                        $planLink = '';
                                        if (auth()->check()) {
                                            if (Auth::user()->state == 'cg') {
                                                $planLink = url('cgplan');
                                            } elseif (Auth::user()->state == 'mp') {
                                                $planLink = url('ourplan');
                                            }
                                        } elseif (Session::has('selected_state')) {
                                            if (Session::get('selected_state') == 'cg') {
                                                $planLink = url('cgplan');
                                            } elseif (Session::get('selected_state') == 'mp') {
                                                $planLink = url('ourplan');
                                            }
                                        }
                                    @endphp

                                    <a href="{{ $planLink }}" class="butn white my-1 but">
                                        <span class="label">Pick a Plan</span>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="triangle-shape top-15 right-10 z-index-9 d-none d-md-block"></div>
        <div class="square-shape top-25 left-5 z-index-9 d-none d-xl-block"></div>
        <div class="shape-five z-index-9 right-10 bottom-15"></div>
    </section>
   
    <section class="bg-light">
        <div class="container">
            <div class="row mt-n1-9">
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-pencil"></i>
                                </div>
                                
                                    <h4 class="ms-4 mb-0">1.Write answers</h4>
                            </div>
                            <div>
                                <p class="mb-3">Choose questions from any source including our mains practice question.</p>
                                {{-- <a href="{{route('aboutus')}}" class="butn-style1 secondary">View More +</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-arrow-up"></i>
                                </div>
                                <h4 class="ms-4 mb-0">2. Scan & Upload</h4>
                            </div>
                            <div>
                                <p class="mb-3">Upload your answer on your dashboard for evaluation.</p>
                                {{-- <a href="{{route('aboutus')}}" class="butn-style1 secondary">View More +</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-user"></i>
                                </div>
                                <h4 class="ms-4 mb-0">3. Evaluation & Suggestion</h4>
                            </div>
                            <div>
                                <p class="mb-3">Get Your answer evaluated and get suggestion  for better score by selected or interview appeared faculty.</p>
                                {{-- <a href="{{route('aboutus')}}" class="butn-style1 secondary">View More +</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section style="background: #fefefe">
        <div class="section-heading guide">
            <h2 class="h1 mb-0">Under The Guidance Of</h2>
        </div>
        <div  class="team-section">
            <div class="team-container">
                @if(count($Guides) > 0)
                    @foreach ($Guides as $guide)
                        <div class="team-member">
                            <img src="{{ asset('/admin/guide/'.$guide->photos) }}" alt="{{ $guide->name }}">
                            <h3 style="color: rgba(9, 67, 109, 0.87)">{{ $guide->rank }}</h3>
                            <h6 style="color: black">{{ strtoupper($guide->name) }}</h6>
                            <p style="color: black; margin-top:-5px;font-size:10px">{{ $guide->post }}</p>
                            {{-- <p style="color: black">{{ strtoupper($guide->post) }}</p> --}}
                        </div>
                    @endforeach
                @else
                    <p style="color: white; text-align: center;">No team members found.</p>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-light" style="margin-top: -134px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center">
                        <h2 class="h1" style="color: #2c316f">Sample Evaluation</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-n1-9">
                @foreach ( $samples as $sample)
                    <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                        <div class="category-item-01 shadow" style="height:140px">
                            <a href="{{ url('/admin/sample/'.$sample->sample_file) }}" class="d-block text-decoration-none" target="_blank">
                                <div class="category-img text-center">
                                    <img src="{{asset('assets/front/img/logos/pd.png')}}" alt="PDF Icon" height="50" width="50">
                                </div>
                                <div class="ms-3 text-center">
                                    <h2 class="h6 mb-0 evaluate"style="font-size: 14px;">{{ $sample->name }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <input type="hidden" id="auth_user" value="{{ Auth::check() ? '1' : '0' }}">


    {{-- @if($plans->count() > 0) --}}
    <section >
        <div class="container">
            <div class="section-heading">
                <h2 class="h1 mb-0">Our Plans</h2>
            </div>
            <div class="row align-items-center g-xl-5 mt-n1-9">
                @foreach ($plans as $plan)
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style4 p-1-9 p-xl-5">
                            <div class="border-bottom pb-1-9 mb-1-9 section-heading">
                                <span class=" sub-title" style="width: 295px">{{$plan->plan_name}}</span>
                                <h4 class="text-dark display-5 display-xxl-4 mb-0 lh-1 fw-bold">{{$plan->price}}<span class="display-29">/₹</span></h4>
                            </div>
                            <ul class="list-unstyled mb-2-9">
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->plan_validity}}</li>
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_1}}</li>
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_2}}</li>
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_3}}</li>
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_4}}</li>
                                <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->medium}}</li>
                            </ul>
                            <div>
                                <a href="javascript:void(0);" onclick="checkLogin1({{ json_encode($plan->id) }})" class="butn">
                                    <i class="far fa-gem icon-arrow before"></i>
                                    <span class="label">Choose Plan</span>
                                    <i class="far fa-gem icon-arrow after"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{url('plan')}}" style="color:#2c316f">
                    <b>View More</b> <i class="fas fa-arrow-right"></i> 
                </a>
        </div>
        </div>
    </section>
    {{-- @endif --}}

    <div class="modal fade" id="purchasePlanModal" tabindex="-1" aria-labelledby="purchasePlanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchasePlanModalLabel">Enter Your Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="purchasePlanForm">
                        @csrf
                        <input type="hidden" name="plan_id" id="plan_id">
    
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="district" class="form-label">District</label>
                            <select class="form-control" id="district" name="district" required>
                                <option value="">Select District</option>
                                    @foreach ($cgDistricts as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                            </select>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    
    {{-- @if($questionpapers->count() > 0) --}}
    <section class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center">
                        <h2 class="h1 mb-0">Previous Year Question papers</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-n1-9">
                @foreach ( $questionpapers as $question)
                    <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                        <div class="category-item-01" style="height: 140px">
                            <a href="{{ url($question->pdf_path) }}" class="d-block text-decoration-none" target="_blank">
                                <div class="category-img text-center">
                                    <img src="{{asset('assets/front/img/logos/pd.png')}}" alt="PDF Icon" height="50" width="50">
                                </div>
                                <div class="ms-3 text-center">
                                    <h3 class="h5 mb-0 evaluate"style="font-size: 14px;">{{ $question->paper_name }}</h3>
                                    {{-- <p class="">{{ $question->subject_type }}</p> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end mt-4">
                    <a href="{{url('cgpyq')}}" style="color:#2c316f">
                        <b>View More</b> <i class="fas fa-arrow-right"></i> 
                    </a>
            </div>
        </div>
    </section>
    {{-- @endif --}}
    
    
    {{-- <section class="bg-light">
        <div class="container">
            <div class="section-heading">
                <h2 class="h1 mb-0">Connect to Us</h2>
            </div>
            <div class="row justify-content-center g-3"> 
               
    
                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="mailto:{{$settingsData->email}}" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box text-white">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <span class="ms-3 fw-bold">{{$settingsData->email}}</span>
                    </a>
                </div>

                
    
                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="tel:+{{$settingsData->mobile}}" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box  text-white">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <span class="ms-3 fw-bold">{{$settingsData->mobile}}</span>
                    </a>
                </div>

                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="https://t.me/mppscmainsorbit" target="_blank" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box  text-white">
                            <i class="fab fa-telegram fa-2x"></i>
                        </div>
                        <span class="ms-3 fw-bold">Telegram</span>
                    </a>
                </div>
    
                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="https://wa.me/{{$settingsData->whatsapp}}" target="_blank" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box  text-white">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </div>
                        <span class="ms-3 fw-bold">WhatsApp</span>
                    </a>
                </div>
    
                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q" target="_blank" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box  text-white">
                            <i class="fab fa-youtube fa-2x"></i>
                        </div>
                        <span class="ms-3 fw-bold">YouTube</span>
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="contact-form pb-0">
        <div class="container mb-2-9 mb-md-6 mb-lg-7">
            <div class="section-heading">
                {{-- <span class="sub-title">OUR CONTACTS</span> --}}
                <h2 class="mb-9 display-16 display-sm-14 display-lg-10 font-weight-800 h1 mb-5">Connect to Us</h2>
                <div class="heading-seperator"><span></span></div>
            </div>
            <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                <div class="col-lg-6 mt-2-9">
                    <div class="contact-wrapper bg-white shadow rounded position-relative h-100 px-4">
                        <div class="mb-4">
                            <i class="contact-icon ti-email"></i>
                        </div>
                        <div>
                            <h4>Email Here</h4>
                            <ul class="list-unstyled p-0 m-0">
                                <li>
                                    <a href="mailto:{{$settingsData->email}}" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                        {{$settingsData->email}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6 mt-2-9">
                    <div class="contact-wrapper bg-white shadow rounded position-relative h-100 px-4">
                        <div class="mb-4">
                            <i class="contact-icon ti-mobile"></i>
                        </div>
                        <div>
                            <h4>Call Here</h4>
                            <ul class="list-unstyled p-0 m-0">
                                <li>
                                    <a href="tel:+91{{$settingsData->mobile}}" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                        +91{{$settingsData->mobile}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <div class="d-flex flex-column align-items-center">
                    <a href="https://wa.me/{{$settingsData->whatsapp}}" target="_blank"> <!-- WhatsApp link -->
                        <img src="{{ asset('/assets/front/img/logos/whatsapp.png') }}" alt="WhatsApp" height="70" width="70">
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q" target="_blank"> <!-- YouTube link -->
                        <img src="{{ asset('/assets/front/img/logos/youtybe.png') }}" alt="YouTube" height="80" width="80">
                    </a>
                </div>
            </div>
        </div>
        
    </section>
    
    <footer style="background: #313460">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                    <a href="/" class="footer-logo">
                        <img src="{{asset('/assets/admin/img/logo.png')}}" height="50" width="50" class="mb-4" alt="Footer Logo">
                    </a>
                    <p class="mb-1-6 text-white">
                        It's an ideal opportunity to begin investing your energy such that illuminates you.
                    </p>
                    <form class="quform newsletter" action="quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">
    
                        <div class="quform-elements">
    
                            <div class="row">
    
    
                            </div>
    
                        </div>
    
                    </form>
                </div>
                @php
                $user = Auth::user();
                @endphp
                <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                    <div class="ps-md-1-6 ps-lg-1-9">
                        <h5 class="" style="color: #ffff">Quick Links</h5>
                        <ul class="footer-list">
                            <li>
                               
                                @auth
                                    @if(Auth::user()->state == 'cg')
                                        <a href="{{ url('/cghome') }}">Home</a>
                                    @elseif(Auth::user()->state == 'mp')
                                        <a href="{{ url('/mphome') }}">Home</a>
                                    @else
                                        <a href="">Home</a>
                                    @endif
                                @else
                                    @if(Session::has('selected_state'))
                                        @if(Session::get('selected_state') == 'cg')
                                            <a href="{{ url('/cghome') }}">Home</a>
                                        @elseif(Session::get('selected_state') == 'mp')
                                            <a href="{{ url('/mphome') }}">Home</a>
                                        @else
                                          <a href="">Home</a>
                                        @endif
                                    @endif
                                @endauth
                            </li>
                            <li><a href="{{url('/aboutus')}}">About Us</a></li>
                            <li>
                                @auth
                                    @if(Auth::user()->state == 'cg')
                                        <a href="{{ url('/cgpyq') }}">PYQ</a>
                                    @elseif(Auth::user()->state == 'mp')
                                        <a href="{{ url('/pyq') }}">PYQ</a>
                                    @else
                                        <a href="">PYQ</a>
                                    @endif
                                @else
                                    @if(Session::has('selected_state'))
                                        @if(Session::get('selected_state') == 'cg')
                                            <a href="{{ url('/cgpyq') }}">PYQ</a>
                                        @elseif(Session::get('selected_state') == 'mp')
                                            <a href="{{ url('/pyq') }}">PYQ</a>
                                        @else
                                            <a href="">PYQ</a>
                                        @endif
                                    @endif
                                @endauth
                            </li>
                            {{-- <li><a href="">Instructor</a></li> --}}
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-2-5 mb-md-0">
                    <div class="ps-lg-1-9 ps-xl-2-5">
                        <h5 class=""style="color: #ffff">Quick Links</h5>
                        <ul class="footer-list">
                            <li>
                                @auth
                                    @if(Auth::user()->state == 'cg')
                                        <a href="{{ url('/cgplan') }}">Plans</a>
                                    @elseif(Auth::user()->state == 'mp')
                                        <a href="{{ url('/ourplan') }}">Plans</a>
                                    @else
                                        <a href="">Plans</a>
                                    @endif
                                @else
                                    @if(Session::has('selected_state'))
                                        @if(Session::get('selected_state') == 'cg')
                                            <a href="{{ url('/cgplan') }}">Plans</a>
                                        @elseif(Session::get('selected_state') == 'mp')
                                            <a href="{{ url('/ourplan') }}">Plans</a>
                                        @else
                                            <a href="">Plans</a>
                                        @endif
                                    @endif
                                @endauth
                                {{-- @if(Auth::check() && $user->state == 'cg')
                                    <a href="{{ url('/cgplan') }}">Plans</a>
                                @elseif(Auth::check() && $user->state == 'mp')
                                    <a href="{{ url('/ourplan') }}">Plans</a>
                                @else
                                    <a href="#">Plans</a>
                                @endif --}}
                            </li> 
                            <li><a href="{{url('/MainsPractice')}}">Mains Practice Question</a></li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ps-md-1-9">
                        <h5 class="" style="color: #ffff">Social Media Links</h5>
                        <ul class="list-unstyled d-flex gap-3">
                            <li>
                                <a href="mailto:your-{{$settingsData->email}}" target="_blank">
                                    <i class="fas fa-envelope"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/gmail.png') }}" height="40" width="40" alt="Email"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/mppscmainsorbit"  target="_blank">
                                    <i class="fab fa-telegram"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" height="40" width="40" alt="Telegram"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/{{$settingsData->whatsapp}}"  target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/whatsapp.png') }}" alt="WhatsApp" height="40" width="40"> --}}
    
                                </a>
    
                            </li>
                            <li>
                                <a href="tel:+{{$settingsData->mobile}}">
                                    <i class="fas fa-phone"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/telephone.png') }}" height="40" width="40" alt="Phone"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q"  target="_blank">
                                    <i class="fab fa-youtube"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/youtybe.png') }}" height="40" width="40" alt="YouTube"> --}}
    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="footer-bar text-center">
                <p class="mb-0 text-white font-weight-500">&copy; <span class="current-year"></span>  Powered by Rays IT & Design World <a href="#!" class="text-secondary"></a></p>
            </div>
        </div>
    </footer>

</div>

<div class="buy-theme alt-font d-block">
    <a href="https://t.me/mppscmainsorbit" target="_blank">
        <img src="{{ asset('assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
        <span>Join Telegram</span>
    </a>
</div>


<!-- start scroll to top -->
<a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<!-- jQuery -->
<script src="{{asset('/assets/front/js/jquery.min.js')}}"></script>

<!-- popper js -->
<script src="{{asset('/assets/front/js/popper.min.js')}}"></script>

<!-- bootstrap -->
<script src="{{asset('/assets/front/js/bootstrap.min.js')}}"></script>

<!-- core.min.js -->
<script src="{{asset('/assets/front/js/core.min.js')}}"></script>

<!-- search -->
<script src="{{asset('/assets/front/search/search.js')}}"></script>

<!-- custom scripts -->
<script src="{{asset('/assets/front/js/main.js')}}"></script>

<!-- form plugins js -->
<script src="{{asset('/assets/front/quform/js/plugins.js')}}"></script>

<!-- form scripts js -->
<script src="{{asset('/assets/front/quform/js/scripts.js')}}"></script>

<!-- all js include end -->


<!-- jQuery (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    // $(document).ready(function(){
    //     let teamMembers = $('.team-member').length;
        
    //     if (teamMembers > 1) {
    //         $('.team-container').slick({
    //             slidesToShow: Math.min(teamMembers, 4), // Agar members kam ho toh utne hi show kare
    //             slidesToScroll: 1,    
    //             arrows: true,         
    //             prevArrow: '<button class="slick-prev">‹</button>',
    //             nextArrow: '<button class="slick-next">›</button>',
    //             responsive: [
    //                 {
    //                     breakpoint: 1024,
    //                     settings: {
    //                         slidesToShow: Math.min(teamMembers, 3)
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 768,
    //                     settings: {
    //                         slidesToShow: Math.min(teamMembers, 2)
    //                     }
    //                 },
    //                 {
    //                     breakpoint: 480,
    //                     settings: {
    //                         slidesToShow: 1
    //                     }
    //                 }
    //             ]
    //         });
    //     } else {
    //         $('.team-container').css({
    //             "display": "flex",
    //             "justify-content": "center",
    //             "align-items": "center"
    //         });
    //     }
    // });

    $(document).ready(function(){
        let teamMembers = $('.team-member').length;

        if (teamMembers === 1) {
            $('.team-container').addClass('single-member');
        }

        if (teamMembers > 1) {
            $('.team-container').slick({
                slidesToShow: Math.min(teamMembers, 4),
                slidesToScroll: 1,    
                arrows: true,         
                prevArrow: '<button class="slick-prev"></button>',
                nextArrow: '<button class="slick-next"></button>',
                autoplay: true,       
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: Math.min(teamMembers, 3) }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: Math.min(teamMembers, 2) }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        } else {
            $('.team-container').css({
                "display": "flex",
                "justify-content": "center",
                "align-items": "center"
            });
        }
    });

</script>

<script>
    function checkLogin1(planId) {
        let isLoggedIn = $("#auth_user").val();

        if (isLoggedIn == "1") {
            $("#plan_id").val(planId);
            $("#purchasePlanModal").modal("show");
        } else {
            alert("Please log in to purchase a plan.");
            $("#loginModal").modal("show");
        }
    }

    $(document).ready(function () {
        $("#purchasePlanForm").submit(function (e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('purchase.plan') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $("#purchasePlanModal").modal("hide");
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    }
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 3000,
         
    });
</script>


<script type="module">
    // ✅ Firebase SDK Import Karein
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getAuth, signInWithPopup, GoogleAuthProvider, signOut } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

    // ✅ Firebase Config
    const firebaseConfig = {
        apiKey: "AIzaSyCJ1CID-liGuE6yBk6NgJ8wl1OF9FCsMpk",
        authDomain: "orbitmains.firebaseapp.com",
        projectId: "orbitmains",
        storageBucket: "orbitmains.firebasestorage.app",
        messagingSenderId: "992288671744",
        appId: "1:992288671744:web:99f119e45c41bdfabab0e5",
        measurementId: "G-0225JCFNEK"
    };

    //Firebase Initialize Karein
    const app = initializeApp(firebaseConfig);
    const auth = getAuth();
    const provider = new GoogleAuthProvider();

        //  Google Login Function
        document.getElementById("loginBtn").addEventListener("click", () => {
            signInWithPopup(auth, provider)
                .then((result) => {
                    const user = result.user;
                    console.log("User Logged In:", user);

                    // ✅ Session se selected_state lein (agar localStorage ya sessionStorage me store kiya hai)
                    let selectedState = localStorage.getItem("selected_state"); 

                    fetch("https://phpstack-1394637-5280790.cloudwaysapps.com/save-user", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") || ""
                        },
                        body: JSON.stringify({
                            name: user.displayName,
                            email: user.email,
                            state: selectedState  // ✅ State bhi send karna hai
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("User Saved:", data);
                        window.location.href = 'https://phpstack-1394637-5280790.cloudwaysapps.com/userCount';
                    })
                    .catch(error => console.error("Fetch Error:", error));
                })
                .catch((error) => {
                    console.error("Login Error:", error);
                });
        });



    // Logout Function
    document.getElementById("logoutBtn").addEventListener("click", () => {
        signOut(auth)
            .then(() => {
                document.getElementById("user").innerHTML = "You are logged out";
            })
            .catch((error) => {
                console.error("Logout Error:", error);
            });
    });
</script>


</body>

</html>

