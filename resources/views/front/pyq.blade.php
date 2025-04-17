@extends('front.layouts.master')
@section('title','PYQ')
@section('content')
<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>


        {{-- <!-- PRICING
        ================================================== -->
        <section class="bg-img cover-background dark-overlay mt-5 mb-5" data-overlay-dark="8" data-background="" style="background: linear-gradient(to right, #6a11cb, #2575fc)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-heading text-center">
                            <span class="sub-title">Questions</span>
                            <h2 class="h1 mb-0" style="color: #ffff">Previous Year Question paper</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-n1-9">
                    @foreach ( $questionpapers as $question)
                        <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                            <div class="category-item-01">
                                <a href="{{ url($question->pdf_path) }}" class="d-block text-decoration-none" target="_blank">
                                    <div class="category-img text-center">
                                        <img src="{{asset('/public/assets/pdf_img/pdficons.jpg')}}" alt="PDF Icon" height="50" width="50">
                                    </div>
                                    <div class="ms-3 text-center">
                                        <h3 class="h4 mb-0 text-white">{{ $question->paper_name }}</h3>
                                        <p class=" text-white">{{ $question->year }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </section> --}}

        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Previous Year Question paper</h2>
        
                <div class="accordion" id="papersAccordion">
                    @foreach ($questionpapers as $paperType => $subjects) 
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ Str::slug($paperType) }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($paperType) }}">
                                    {{ $paperType }} <!-- ✅ Paper Type Name Now Shows -->
                                </button>
                            </h2>
                            <div id="collapse{{ Str::slug($paperType) }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        @foreach ($subjects as $subject)

                                            @if(Auth::check())
                                                <a href="{{ url($subject->pdf_path) }}" target="_blank">View PDF</a>
                                            @else
                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    Login to view PDF
                                                </a>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        <script>
            function togglePDFs(id) {
                let pdfList = document.getElementById(id);
                pdfList.classList.toggle("d-none");
            }
        </script>


@endsection