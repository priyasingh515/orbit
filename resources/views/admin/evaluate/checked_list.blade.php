@extends('admin.layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Evaluated List</h1>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{route('evaluate.create')}}" class="btn btn-primary">Add Evaluate</a>
            </div> --}}
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            {{-- <th>Name</th> --}}
                            <th>Email</th>
                            <th>Submit answer</th>
                            <th>checked answer</th>
                            <th>Checked Date</th>
                            <th>Remark</th>
                            <th>Status</th>
                            {{-- <th width="100">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($checkedStudents as $evaluates)
                        <tr>
                            <td>{{$i++}}</td>
                            {{-- <td>{{$evaluates->student_name}}</td> --}}
                            <td>{{$evaluates->email}}</td>
                            <td>
                                <a href="{{ url('public/'.$evaluates->answer_pdf) }}" target="_blank">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td>
                                
                                <a href="{{ url('public/'.$evaluates->checked_file_path) }}" target="_blank">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="Answer Pdf" height="50" width="50">
                                </a>

                            </td>
                            <td>{{ \Carbon\Carbon::parse($evaluates->check_date)->format('d-M-Y') }}</td>

                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#remarkModal" data-message="{{ $evaluates->remark }}">
                                    View
                                </button>
                            </td>
                            <td>
                                <span class="badge 
                                    @if($evaluates->status == 'checked') bg-success 
                                    @elseif($evaluates->status == 'pending') bg-danger 
                                    @endif">
                                    {{ ucfirst($evaluates->status) }}
                                </span>
                            </td>
                            {{-- <td> {{$evaluates->email}}</td> --}}
                            {{-- @if ($evaluates->role == 3)
                            <td> {{$evaluates->role}}</td>                   
                          
                            @endif --}}
                            {{-- <td>
                                <a href="{{route('evaluate.edit',$evaluates->id)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('evaluate.delete', $evaluates->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td> --}}
                        </tr>
                        @endforeach
                        
                    </tbody>
                   
                </table>
                <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="remarkModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="messageContent">
                                <!-- Message content will appear here -->
                            </div>
                        </div>
                    </div>
                </div>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Wait for DOM to load
    document.addEventListener("DOMContentLoaded", function () {
        var messageModal = document.getElementById('remarkModal');

        messageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var message = button.getAttribute('data-message'); // Extract info from data-* attributes
            var modalBody = messageModal.querySelector('#messageContent');

            modalBody.textContent = message;
        });
    });
</script>
@endsection

@section('customJs')

@endsection