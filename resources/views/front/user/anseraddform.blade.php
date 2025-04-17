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


{{-- 
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-3 sidebar d-none d-md-block">
                    <h4>Submit Answer</h4>
                    @if ($activePlan)
                        <div class="alert alert-info">
                            <strong>Plan Details:</strong><br>
                            <b>Purchase Date:</b> {{ date('d M, Y', strtotime($activePlan->purchase_date)) }}<br>
                            <b>Expiry Date:</b> {{ date('d M, Y', strtotime($activePlan->expiry_date)) }}
                        </div>
                    @endif
                </nav>
        
                <!-- Main Content -->
                <main class="col-md-9 col-lg-9 d-flex flex-column justify-content-center align-items-center">
                    <div class="contact-form col-md-6 col-lg-12">
                        <h5 class="mb-3">Submit Answer</h5>
                        <form action="{{ route('user.answerstore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="paper_type">Paper Type</label>
                                        <select name="paper_type_id" id="paper_type" class="form-control" required>
                                            <option value="">Select Paper Type</option>
                                            @foreach ($papers as $item)
                                                <option value="{{ $item->id }}">{{ $item->paper_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="subject">Subject</label>
                                        <select name="subject_id" id="subject" class="form-control" required>
                                            <option value="">Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Answer Sheet</label>
                                        <input type="file" class="form-control" name="answer_sheet" required>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Answer</button>
                        </form>
                    </div>
        
                  
                    <div class="col-md-10 mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Submitted Answers</h5>
                            <a href="{{url('/answerList')}}" class="btn btn-primary">View All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paper Type</th>
                                        <th>Subject</th>
                                        <th>Answer Sheet</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($answers as $key => $answer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $answer->paper_type_name ?? 'N/A' }}</td>
                                            <td>{{ $answer->subject_name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ asset($answer->answer_pdf) }}" target="_blank">
                                                    View Answer Sheet
                                                </a>
                                            </td>
                                            <td>{{ ucfirst($answer->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </main>
            </div>
        </div> --}}

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
        
                <!-- Main Content -->
                <main class="col-md-9 col-lg-9 d-flex flex-column justify-content-center align-items-center">
                    <div class="contact-form col-md-6 col-lg-12">
                        <h5 class="mb-3">Submit Answer</h5>
                        <form action="{{ route('user.answerstore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="paper_type">Paper Type</label>
                                        <select name="paper_type_id" id="paper_type" class="form-control" required>
                                            <option value="">Select Paper Type</option>
                                            @foreach ($papers as $item)
                                                <option value="{{ $item->id }}">{{ $item->paper_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="question_no">No. of question</label>
                                        <input type="number" class="form-control" name="question_no" min="1">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Answer Sheet</label>
                                        <input type="file" class="form-control" name="answer_sheet" required>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Answer</button>
                        </form>
                    </div>
        
                  
                    <div class="col-md-10 mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 style="margin-left: 26px">Submitted Answers</h5>
                            <a href="{{url('/answerList')}}" class="btn btn-primary">View All</a>
                        </div>
                        
                        {{-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Type</th>
                                    <th>Subject</th>
                                    <th>Answer Sheet</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answers as $key => $answer)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $answer->paper_type_name ?? 'N/A' }}</td>
                                        <td>{{ $answer->subject_name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ asset($answer->answer_pdf) }}" target="_blank">
                                                View Answer Sheet
                                            </a>
                                        </td>
                                        <td>{{ ucfirst($answer->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paper Type</th>
                                        <th> no. of questions</th>
                                        <th>Answer Sheet</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($answers as $key => $answer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $answer->paper_type_name ?? 'N/A' }}</td>
                                            <td>{{ $answer->question_no ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ asset('public/'.$answer->answer_pdf) }}" target="_blank">
                                                    View Answer Sheet
                                                </a>
                                            </td>
                                            <td>{{ ucfirst($answer->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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