@extends('front.layouts.master')
@section('title','User Dashboard')
@section('content')


<style>
    .page-title-section{
            padding: 9px 0 90px
        }

        .contact-icon {
            transition: transform 0.3s ease-in-out;
        }

        .contact-icon:hover {
            transform: scale(1.2);
        }
</style>


        <!-- QUICK CONTACT
        ================================================== -->
        <section class="contact-form pb-0">
            <div class="container mb-2-9 mb-md-6 mb-lg-7">
                <div class="section-heading">
                    {{-- <span class="sub-title">OUR CONTACTS</span> --}}
                    <h2 class="mb-2 font-weight-400">Welcome to your Free Trial</h2>
                    <div class="heading-seperator"><span>You can submit 2 GS questions for demo evaluation</span></div>
                </div>
                <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                    <div class="col-lg-6 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <a href="javascript:void(0);" onclick="checkL()">
                                <div class="mb-4">
                                    <i class="contact-icon ti-plus"></i>
                                </div>
                            </a>
                            <div>
                                <a href="">
                                    <h4>Submit Answer</h4>
                                    <ul class="list-unstyled p-0 m-0">
                                        <li>Choose Question from any source</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                    
                            @php
                                $link = '';
                                if (auth()->check()) {
                                    if (Auth::user()->state == 'cg') {
                                        $link = url('cgplan');
                                    } elseif (Auth::user()->state == 'mp') {
                                        $link = url('ourplan');
                                    }
                                } elseif (Session::has('selected_state')) {
                                    if (Session::get('selected_state') == 'cg') {
                                        $link = url('cgplan');
                                    } elseif (Session::get('selected_state') == 'mp') {
                                        $link = url('ourplan');
                                    }
                                }
                            @endphp
                    
                            <a href="{{ $link }}">
                                <div class="mb-4">
                                    <i class="contact-icon ti-arrow-up"></i>
                                </div>
                            </a>
                    
                            <div>
                                <h4>Upgrade Plan</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li>Better Experience—<br> Upgrade Your Plan</li>
                                </ul>
                            </div>
                    
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>

        <script>
            function checkL() {
                @auth
                    window.location.href = "{{ route('user.answerForm') }}";
                @endauth
        
                @guest
                    // alert("After login, you can upload your answer.");

                    Swal.fire({
                        title: "Login Required!",
                        text: "After login, you can upload your answer.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    }).then(() => {
                        var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        myModal.show();
                    });
                @endguest
            }
        </script>

        {{-- <script>
            function checkL() {
                @auth
                    // User is logged in, redirect to answer form
                    window.location.href = "{{ route('user.answerForm') }}";
                @endauth
        
                @guest
                    // User is not logged in, show alert message
                    alert("After login, you can upload your answer.");
                @endguest
            }
        </script> --}}
      
    
@endsection