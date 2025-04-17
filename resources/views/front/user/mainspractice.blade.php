@extends('front.layouts.master')
@section('title','Mains practice Question paper')
@section('content')

       
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Mains Practice Question</h2>

                {{-- <div class="accordion" id="papersAccordion">
                    @foreach ($papers as $paperType => $subjects)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ Str::slug($paperType) }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($paperType) }}">
                                    @if($paperType == 1)
                                        Paper 1
                                    @elseif($paperType == 2)
                                        Paper 2
                                    @elseif($paperType == 3)
                                        Paper 3
                                    @elseif($paperType == 4)
                                        Paper 4
                                    @elseif($paperType == 5)
                                        Paper 5
                                    @elseif($paperType == 6)
                                        Paper 6
                                    @else
                                        Invalid Paper Type
                                    @endif
                                </button>
                            </h2>
                            <div id="collapse{{ Str::slug($paperType) }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        @foreach ($subjects->sortBy('subject_type')->groupBy('subject_type') as $subjectType => $pdfs)
                                            <li class="list-group-item">
                                                <a href="javascript:void(0);" onclick="togglePDFs('pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}')">
                                                    @if($subjectType == 1)
                                                        Subject 1
                                                    @elseif($subjectType == 2)
                                                        Subject 2
                                                    @elseif($subjectType == 3)
                                                        Subject 3
                                                    @else
                                                        Invalid Subject Type
                                                    @endif
                                                </a>
                                                <ul class="list-group mt-2 d-none" id="pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}">
                                                    @foreach ($pdfs as $pdf)
                                                        <li class="list-group-item">
                                                            <a href="{{ url( $pdf->mains_file) }}" target="_blank">View PDF</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}


                <div class="accordion" id="papersAccordion">
                    @foreach ($papers as $paperType => $subjects)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ Str::slug($paperType) }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($paperType) }}">
                                    {{$paperType}}
                                    
                                </button>
                            </h2>
                            <div id="collapse{{ Str::slug($paperType) }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        @foreach ($subjects->sortBy('subject_name')->groupBy('subject_name') as $subjectType => $pdfs)
                                            <li class="list-group-item">
                                                <a href="javascript:void(0);" onclick="togglePDFs('pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}')">
                                                    {{$subjectType}}

                                                </a>
                                                <ul class="list-group mt-2 d-none" id="pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}">
                                                    @foreach ($pdfs as $pdf)
                                                        {{-- <li class="list-group-item">
                                                            <a href="{{ asset('public/' .$pdf->mains_file) }}" target="_blank">View PDF</a>
                                                        </li> --}}

                                                        <li class="list-group-item">
                                                            @if(Auth::check())
                                                                <a href="{{ url('public/'.$pdf->mains_file) }}" target="_blank">View PDF</a>
                                                            @else
                                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    Login to view PDF
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
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