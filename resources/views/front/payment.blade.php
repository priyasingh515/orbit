@extends('front.layouts.master')
@section('title','Payment')
@section('content')

<style>
    .page-title-section{
            padding: 9px 0 90px
        }
   
</style>


        <section class="bg-very-light-gray d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 class="mb-4 text-primary">Scan the QR Code to Pay</h2>
                        <img src="{{ asset('assets/front/img/qr.jpeg') }}" alt="QR Code" class="img-fluid" height="350" width="350">
                        <p class="mb-3">
                            Note: Share your payment receipt on this number-
                            <a href="https://wa.me/{{$settingsData->whatsapp}}" target="_blank" style="color: black; font-weight: bold; text-decoration: none;">
                                {{$settingsData->whatsapp}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

      

    
@endsection