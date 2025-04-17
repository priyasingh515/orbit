@extends('front.layouts.master')
@section('title','Contact')
@section('content')
<style>
    .page-title-section{
            padding: 9px 0 90px
        }

        .contact-wrapper a {
            display: block; /* Ensure link takes full width */
            word-break: break-word; /* Breaks long email if needed */
            overflow-wrap: break-word; /* Ensures wrapping */
            font-size: 10px; /* Adjust font size for mobile */
        }

        @media (max-width: 768px) {
            .contact-wrapper a {
                font-size: 14px; /* Reduce font size for small screens */
                white-space: normal; /* Ensures text wraps properly */
            }
    }
</style>


        <!-- QUICK CONTACT
        ================================================== -->
        <section class="contact-form pb-0">
            <div class="container mb-2-9 mb-md-6 mb-lg-7">
                <div class="section-heading">
                    <span class="sub-title">OUR CONTACTS</span>
                    <h2 class="mb-9 display-16 display-sm-14 display-lg-10 font-weight-800">We`re here to Help You</h2>
                    <div class="heading-seperator"><span></span></div>
                </div>
                <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                    <div class="col-lg-6 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4 shadow">
                            <div class="mb-4">
                                <i class="contact-icon ti-email"></i>
                            </div>
                            <div>
                                <h4>Email Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    {{-- <li><a href="#!" style="color: rgb(9 67 109 / 87%)">{{$settingsData->email}}</a></li> --}}
                                    <li>
                                        <a href="mailto:{{$settingsData->email}}" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                            {{$settingsData->email}}
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon ti-map-alt"></i>
                            </div>
                            <div>
                                <h4>Location Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li>New York —<br> 18 N 3rd E Street Downey, Lechase Park, United States.</li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4 shadow">
                            <div class="mb-4">
                                <i class="contact-icon ti-mobile"></i>
                            </div>
                            <div>
                                <h4>Call Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    {{-- <li><a href="#!" style="color: rgb(9 67 109 / 87%)">+{{$settingsData->mobile}}</a></li> --}}
                                    <li>
                                        <a href="tel:+91{{$settingsData->mobile}}" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                            +91{{$settingsData->mobile}}
                                        </a>
                                    </li>
                                    {{-- <li><a href="#!">(+44) 123 456 789</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT FORM
        ================================================== -->
        <section class="bg-very-light-gray py-md-8 pb-lg-0">
            <div class="container">
                <div class="row align-items-end">
                    {{-- <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{asset('/public/assets/front/img/content/contact-img-01.jpg')}}" alt="...">
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="faq-form">
                            <h2 class="mb-4 text-primary">Get In Touch</h2>
                            <form  action="{{route('enquery.store')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="quform-elements">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="name" placeholder="Your name here" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text" name="email" placeholder="Your email here" />
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="subject" type="text" name="subject" placeholder="Your subject here" />
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="mobile" placeholder="Your phone here" />
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="state">State<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <select name="state" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="cg">CG</option>
                                                        <option value="mp">MP</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn secondary" type="submit"><i class="far fa-paper-plane icon-arrow before"></i><span class="label">Send Message</span><i class="far fa-paper-plane icon-arrow after"></i></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="p-0 overflow-visible service-block mt-5">
            <div class="container mb-5">
                <div class="section-heading">
                    {{-- <span class="sub-title">Plans</span> --}}
                    <h2 class="h1 mb-0">How its Work</h2>
                </div>
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

    
    
@endsection