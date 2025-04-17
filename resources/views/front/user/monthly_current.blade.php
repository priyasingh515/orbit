


@extends('front.layouts.master')
@section('title','User Dashboard')
@section('content')

<style>
    /* Sidebar Responsive Fix */
    .sidebar {
        background: #ebebeb57;
        color: white;
        padding: 20px;
        height: 100vh;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: block !important;
            width: 100%;
            padding: 15px;
            height: auto;
        }
    }

    /* Main Content Fix */
    main {
        min-height: 100vh !important;
        height: auto !important;
    }

    /* Card Responsive Fix */
    @media (max-width: 768px) {
        .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* Page Title Section */
    .page-title-section {
        padding: 9px 0 90px;
    }

    /* Pagination Fix */
    .pagination {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination .page-link {
        font-size: 14px;
        padding: 6px 12px;
        color: #007bff;
        border-radius: 50px;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
</style>

{{-- <!-- PAGE TITLE -->
<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" 
    data-overlay-dark="9" 
    data-background="{{ asset('assets/front/img/bg/bg-04.jpg') }}">
</section> --}}

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-3 sidebar d-none d-lg-block">
            @if(Auth::user()->name)
                <h4 style="font-size: 12px">Name: {{ Auth::user()->name }}</h4>
            @else
                <h4 style="font-size: 12px">Email: {{ Auth::user()->email }}</h4>
            @endif
            @if ($activePlan)
                <div class="alert alert-info">
                    <strong>Plan Details:</strong><br>
                    <b>Purchase Date:</b> {{ date('d M, Y', strtotime($activePlan->purchase_date)) }}<br>
                    <b>Expiry Date:</b> {{ date('d M, Y', strtotime($activePlan->expiry_date)) }}
                </div>
            @endif
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('user.count') }}" class="text-decoration-none">📊 Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('user.answerForm') }}" class="text-decoration-none">📝 Submit Answer</a>
                </li>
                <li class="list-group-item">
                    <a href="{{url('/answerList')}}" class="text-decoration-none">📂 My Answers</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('user.msg') }}" class="text-decoration-none">💬 Doubt Messages</a>
                </li>
                @if(auth()->check() && $hasPlan)
                    <li class="list-group-item">
                        <a href="{{url('current_affair')}}" class="text-decoration-none">📰 Monthly Current Affairs</a>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-9 d-flex flex-column">
            <div class="container mt-5">
                <div class="row">
                    @foreach ($currentAffairs as $answer)
                    <div class="col-4 col-md-3 col-lg-2 mb-4">
                        <a href="">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mt-2">
                                            <a href="{{ asset($answer->weekly_file) }}" target="_blank">
                                                <img src="{{asset('public/assets/pdf_img/pdficons.jpg')}}" alt="PDF Icon" height="50" width="50">
                                            </a>
                                        </h5>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($answer->year)->format('d M Y') }}
                                        </small>
                                        
                                        {{-- <p>{{ $answer->subject_name ?? 'N/A' }}</p> --}}
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            @if ($currentAffairs->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $currentAffairs->previousPageUrl() }}" rel="prev">Previous</a>
                                </li>
                            @endif

                            @foreach ($currentAffairs->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $currentAffairs->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($currentAffairs->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $currentAffairs->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div> --}}

            </div>
        </main>
    </div>
</div>

@endsection
