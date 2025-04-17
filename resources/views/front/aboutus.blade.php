@extends('front.layouts.master')
@section('title','About')
@section('content')

<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>
<!-- PAGE TITLE
        ================================================== -->
        {{-- <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="">
            
        </section> --}}
        @foreach ($about as $index => $abouts)
            
      
        @if ($index == 0)
            
       
        <!-- ABOUTUS
        ================================================== -->
        <section class="aboutus-style-02">
            <div class="container">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-lg-6 col-xl-7 mt-1-9">
                        <div class="text-lg-center position-relative">
                            <div>
                                <img src="{{asset('/public/assets/front/img/content/about-01.jpg')}}" alt="..." class="position-relative z-index-1">
                            </div>
                            <img src="{{asset('/public/assets/front/img/bg/bg-07.png')}}" class="bg-shape1 d-none d-lg-inline-block" alt="...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 mt-1-9">
                       
                        <h2 class="h1 mb-1-6 text-primary">{{$abouts->title}}</h2>
                        <p>
                            {{$abouts->content}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div class="inner-box">
                                        {{-- <span class="box-info-text">Best off canvas program</span> --}}
                                        <div class="info-box  bg-white">
                                            <div>
                                                <div class="mb-3">
                                                    <img src="{{asset('/public/assets/front/img/bg/bg-07.png')}}" alt="..." class="border-radius-50 overflow-hidden">
                                                </div>
                                                {{-- <h5 class="mb-0">Hudson Barlow</h5> --}}
                                                {{-- <span class="text-uppercase display-31">Student</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-2-9">
                                    <div class="inner-box inner-box2">
                                        {{-- <span class="box-info-text">Best degree program</span> --}}
                                        <div class="info-box bg-white">
                                            <div>
                                                <div class="mb-3 bg-white">
                                                    <img src="{{asset('/public/assets/front/img/bg/bg-07.png')}}" alt="..." class="border-radius-50 overflow-hidden">
                                                </div>
                                                {{-- <h5 class="mb-0">Mariam Waring</h5> --}}
                                                {{-- <span class="text-uppercase display-31">Teacher</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape20">
                    <img src="{{asset('/public/assets/front/img/bg/bg-02.jpg')}}" alt="...">
                </div>
                <div class="shape18">
                    <img src="{{asset('/public/assets/front/img/bg/bg-01.jpg')}}" alt="...">
                </div>
                <div class="shape21">
                    <img src="{{asset('/public/assets/front/img/bg/bg-03.jpg')}}" alt="...">
                </div>
            </div>
        </section>
        
       
        <!-- EXTRA
        ================================================== -->
        <section class="py-0">
            @elseif ($index == 1)
            <div class="row g-0">
                <div class="col-lg-12 order-2 order-lg-1">
                    <div class="instructor-content">
                        <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                        <p class="">{{$abouts->content}}</p>
                    </div>
                </div>
               
            </div>
            <div class="row g-0">
                
                @elseif ($index == 2)
                <div class="col-lg-12">
                    <div class="instructor-content">
                        <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                        <p>{{$abouts->content}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-0 mt-5">
            @elseif ($index == 3)
            <div class="row g-0">
                <div class="col-lg-12 order-2 order-lg-1">
                    <div class="instructor-content">
                        <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                        <p class="">{{$abouts->content}}</p>
                    </div>
                </div>
                {{-- <div class="col-lg-6 bg-img cover-background min-height order-1 order-lg-2" data-background="{{asset('public/assets/front/img/content/courses-01.jpg')}}">
                </div> --}}
            {{-- </div>
            <div class="row g-0"> --}}
               
                @elseif ($index == 4)
                <div class="col-lg-12">
                    <div class="instructor-content">
                        <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                        <p>{{$abouts->content}}</p>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endforeach

    
@endsection