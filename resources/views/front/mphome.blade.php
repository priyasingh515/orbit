@extends('front.layouts.master')
@section('title', 'Home')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


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
        min-height: 600px; /* Adjust as needed */
        background-size: cover !important; 
        background-position: center center !important;
        background-repeat: no-repeat !important;
    }
    .headcap{
            display: inline-block;
    }
    .headcap:first-letter {
        /* text-transform: uppercase; */
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

    <!-- BANNER
            ================================================== -->
    {{-- <section class="marquee-section py-3" style="background: #2c316f; height: 50px; display: flex; align-items: center; justify-content: center;">
        <div class="container text-center">
            <span style="color: #ffffff;">
                {{ $offers->description }}
            </span>
        </div>
    </section> --}}
    <section class="top-position1 p-0 mt-0">
        <div class="container-fluid px-0">
            <div class="slider-fade1 owl-carousel owl-theme w-100">
                @foreach ($slider as $sliders)
                    <div class="item bg-img  pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-24 left-overlay-dark"
                        data-overlay-dark="8" style="background-image: url('{{ url('/public/admin/sliders/', $sliders->image) }}');">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    <h1 class="display-1 font-weight-800 mb-2-6 title text-white headcap" style="font-size: 40px;margin-top:-68px; text-transform:uppercase">
                                        {{ $sliders->heading }}
                                    </h1>
                                    <span class="h5 text-secondary">{{ $sliders->paragraph }}</span>
                                    <a href="{{route('user.questionadd')}}" class="butn my-1 mx-1 but"><span class="label">Take Demo</span></a>
                                    <a href="{{url('ourplan')}}" class="butn white my-1 but"><span class="label">Pick a Plan</span></a>

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

    {{-- <section class="marquee-section py-3" style="background: #2c316f; height: 100px; display: flex; align-items: center;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Marquee -->
                    <div class="marquee">
                        <marquee behavior="scroll" direction="left" scrollamount="10" style="color:#ffff;font-size: 1.5rem;" class="fs-5">
                            <h2 style="display: inline-flex; align-items: center; gap: 10px;color:#ffff">
                                <img src="{{ asset('public/assets/front/img/logos/offer.png') }}" height="80" width="80" alt="Offer" style="vertical-align: middle;">
                                {{ $offers->description }}
                            </h2>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- INFORMATION
            ================================================== -->
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
                            <img src="{{ asset('public/admin/guide/'.$guide->photos) }}" alt="{{ $guide->name }}">
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
                        {{-- <span class="sub-title">Sample Evaluation</span> --}}
                        <h2 class="h1 mb-0" style="color: #2c316f">Sample Evaluation</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-n1-9">
                @foreach ( $samples as $sample)
                    <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                        <div class="category-item-01 shadow" style="height: 140px">
                            <a href="{{ url('public/admin/sample/'.$sample->sample_file)}}" class="d-block text-decoration-none" target="_blank">
                                <div class="category-img text-center">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="PDF Icon" height="50" width="50">
                                </div>
                                <div class="ms-3 text-center">
                                    <h2 class="h6 mb-0 evaluate" style="font-size: 14px;">{{ $sample->name }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($plans->count() > 0)
    <section>
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
                <a href="{{url('ourplan')}}" style="color:#2c316f">
                    <b>View More</b> <i class="fas fa-arrow-right"></i> 
                </a>
        </div>
        </div>
    </section>
    @endif

    <input type="hidden" id="auth_user" value="{{ Auth::check() ? '1' : '0' }}">

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
                                    @foreach ($mpDistricts as $item)
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
                        {{-- <span class="sub-title">Questions</span> --}}
                        <h2 class="h1 mb-0">Previous Year Question paper</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-n1-9">
                @foreach ( $questionpapers as $question)
                    <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                        <div class="category-item-01 shadow" style="height: 140px">
                            <a href="{{ url('public/'.$question->pdf_path) }}" class="d-block text-decoration-none" target="_blank">
                                <div class="category-img text-center">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="PDF Icon" height="50" width="50">
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
                    <a href="{{url('pyq')}}" style="color:#2c316f">
                        <b>View More</b> <i class="fas fa-arrow-right"></i> 
                    </a>
            </div>
        </div>
    </section>
    {{-- @endif --}}

     
    {{-- <section>
        <div class="container">
            <div class="section-heading">
                <h2 class="h1 mb-0">Connect to Us</h2>
            </div>
            <div class="row justify-content-center g-3"> 
                
    
                <div class="col-auto d-flex align-items-center mx-4">
                    <a href="mailto:{{$settingsData->email}}" class="text-decoration-none text-dark d-flex align-items-center">
                        <div class="icon-box  text-white">
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
                    <img src="{{ asset('/public/assets/front/img/logos/whatsapp.png') }}" alt="WhatsApp" height="70" width="70">
                    {{-- <span class="mt-2 fw-semibold">WhatsApp</span> --}}
                </div>
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('/public/assets/front/img/logos/youtybe.png') }}" alt="YouTube" height="80" width="80">
                    {{-- <span class="mt-2 fw-semibold">YouTube</span> --}}
                </div>
            </div>
        </div>
    </section>

    
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
         
             $("#purchasePlanForm").submit(function(e) {
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
                     error: function(xhr) {
                         alert(xhr.responseJSON.message);
                     }
                 });
             });
        </script>

    <script>
        AOS.init({
            duration: 3000,
             
        });
    </script>

@endsection
