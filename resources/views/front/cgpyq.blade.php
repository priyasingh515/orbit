@extends('front.layouts.master')
@section('title','PYQ')
@section('content')


<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>



        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Previous Year Question paper</h2>
        
                <div class="accordion" id="papersAccordion">
                    @foreach ($cgpyq as $paperType => $subjects) 
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
                                                <a href="{{ url('public/'.$subject->pdf_path) }}" target="_blank">View PDF</a>
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