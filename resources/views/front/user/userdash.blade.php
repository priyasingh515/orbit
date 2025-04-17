@extends('front.layouts.master')
@section('title','User Dashboard')
@section('content')


<style>
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
        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .page-title-section{
            padding: 9px 0 90px
        }

        @media (max-width: 768px) {
            .table-responsive {
                width: 100% !important;
                max-width: 100%;
                overflow-x: auto !important;
                padding: 0 10px;
            }
            .table {
                margin-left: 0 !important;
                margin-right: auto !important;
            }

            main {
                align-items: flex-start !important;
            }
        }

</style>


        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-3 sidebar d-none d-md-block">
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
        
              
                <main class="col-md-9 col-lg-9 d-flex flex-column">
                   
                    <div class="container-fluid py-5">
                        <div class="row justify-content-center p-3">
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                                <a href="{{ route('user.answerForm') }}" class="text-decoration-none">
                                    <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-4">
                                        <div class="card-body">
                                            <h6 class="text-muted text-uppercase fw-light">Submit New Answer</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                                <a href="{{ url('/answerList') }}" class="text-decoration-none">
                                    <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-4">
                                        <div class="card-body">
                                            <h6 class="text-muted text-uppercase fw-light">Evaluated Answer</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    
                            @if(auth()->check() && $hasPlan)
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                                <a href="{{ url('current_affair') }}" class="text-decoration-none">
                                    <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-4">
                                        <div class="card-body">
                                            <h6 class="text-muted text-uppercase fw-light">Monthly Current Affairs</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#paper_type').on('change', function () {
                    var paperId = $(this).val();
        
                    if (paperId) {
                        $.ajax({
                            url: '/get-subjects/' + paperId,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $('#subject').empty().append('<option value="">Select Subject</option>');
        
                                $.each(data, function (key, subject) {
                                    $('#subject').append('<option value="' + subject.id + '">' + subject.subject_name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#subject').empty().append('<option value="">Select Subject</option>');
                    }
                });
            });
        </script>

@endsection