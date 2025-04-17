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

    <!-- title  -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('./public/assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('./public/assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('./public/assets/admin/img/logo.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('./public/assets/admin/img/logo.png')}}" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{asset('public/assets/front/css/plugins.css')}}" />

    <!-- search css -->
    <link rel="stylesheet" href="{{asset('public/assets/front/search/search.css')}}" />

    <!-- quform css -->
    <link rel="stylesheet" href="{{asset('public/assets/front/quform/css/base.css')}}">

    <!-- core style css -->
    <link href="{{asset('public/assets/front/css/styles.css')}}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
        section.top-position1 {
            height: 100vh;
            overflow: hidden;
            }

            .item.bg-img {
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            }
            @media (max-width: 768px) {
            .contact-number {
                color: blue !important;
            }

            .headcap{
                display: inline-block;
            }
            .headcap:first-letter {
                text-transform: uppercase;
            }
    }
</style>

<body>

    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        <header class="header-style1 menu_area-light">

            <div class="navbar-default border-bottom border-color-light-white">

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
                                        <a href="/" class="navbar-brand"><img id="logo" src="{{asset('./public/assets/admin/img/logo.png')}}" alt="logo" /></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        
                                        {{-- <li><a href="">Contact Us : <span style="color: white">{{$settingsData->mobile}}</span></a></li> --}}
                                        {{-- <li>
                                            <a href="tel:+91{{$settingsData->mobile}}">Contact Us : <span style="color: white" class="contact-number">{{$settingsData->mobile}}</span></a>
                                        </li> --}}
                                    </ul>
                                    <!-- end menu area -->

                                  
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

       

        <section class="top-position1 p-0" style="">
            <div class="container-fluid px-0">
                <div class="owl-theme w-100">
                    <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-24 left-overlay-dark" 
                        data-overlay-dark="8" 
                        data-background="{{url('public/'.$settingsData->banner)}}">
                        
                        <div class="container pt-6 pt-md-0 text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    
                                    {{-- <a href="{{route('cghome')}}" 
                                       class="butn my-3 mx-2 text-center d-block" 
                                       style="font-size: 1.5rem; padding: 15px 30px;">
                                        <i class="fas fa-plus-circle icon-arrow before"></i>
                                        <span class="label">CG PSC</span>
                                        <i class="fas fa-plus-circle icon-arrow after"></i>
                                    </a>
        
                                    <a href="{{route('mphome')}}" 
                                       class="butn white my-3 mx-2 text-center d-block" 
                                       style="font-size: 1.5rem; padding: 15px 30px;">
                                        <i class="fas fa-plus-circle icon-arrow before"></i>
                                        <span class="label">MP PSC</span>
                                        <i class="fas fa-plus-circle icon-arrow after"></i>
                                    </a> --}}

                                    <a href="javascript:void(0);" 
                                        onclick="setStateAndRedirect('cg')" 
                                        class="butn my-3 mx-2 text-center d-block" 
                                        style="font-size: 1.5rem; padding: 15px 30px;">
                                            <i class="fas fa-plus-circle icon-arrow before"></i>
                                            <span class="label">CG PSC</span>
                                            <i class="fas fa-plus-circle icon-arrow after"></i>
                                    </a>

                                    <a href="javascript:void(0);" 
                                        onclick="setStateAndRedirect('mp')" 
                                        class="butn white my-3 mx-2 text-center d-block" 
                                        style="font-size: 1.5rem; padding: 15px 30px;">
                                            <i class="fas fa-plus-circle icon-arrow before"></i>
                                            <span class="label">MP PSC</span>
                                            <i class="fas fa-plus-circle icon-arrow after"></i>
                                    </a>
        
                                    <h2 class="font-weight-600 title text-white mt-4">{{$settingsData->heading}}</h2>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </section>
       
    </div>



    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- jQuery -->
    <script src="{{asset('public/assets/front/js/jquery.min.js')}}"></script>

    <!-- popper js -->
    <script src="{{asset('public/assets/front/js/popper.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('public/assets/front/js/bootstrap.min.js')}}"></script>

    <!-- core.min.js -->
    <script src="{{asset('public/assets/front/js/core.min.js')}}"></script>

    <!-- search -->
    <script src="{{asset('public/assets/front/search/search.js')}}"></script>

    <!-- custom scripts -->
    <script src="{{asset('public/assets/front/js/main.js')}}"></script>

    <!-- form plugins js -->
    <script src="{{asset('public/assets/front/quform/js/plugins.js')}}"></script>

    <!-- form scripts js -->
    <script src="{{asset('public/assets/front/quform/js/scripts.js')}}"></script>

    <!-- all js include end -->

    <script>
        function setStateAndRedirect(state) {
            fetch("{{ route('set.state.session') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ state: state })
            }).then(response => {
                if (response.ok) {
                    if (state === "cg") {
                        window.location.href = "{{ route('cghome') }}"; // CG ke liye redirect
                    } else if (state === "mp") {
                        window.location.href = "{{ route('mphome') }}"; // MP ke liye redirect
                    }
                }
            });
        }
    </script>
    
</body>

</html>