@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Message</h1>
            </div>
            <div class="col-sm-6 text-right">
                {{-- <a href="{{route('evaluate.create')}}" class="btn btn-primary">Add Evaluate</a> --}}
            </div>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Answer Sheet</th>
                            <th>Checked Sheet</th>
                            <th>Doubt file</th>
                            <th>Resolve file</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($Message as $student)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->student_email}}</td>
                            <td>
                                <a href="{{ url('public/'.$student->answer_sheet) }}" target="_blank">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('public/'.$student->check_file) }}" target="_blank">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td>
                                @if ($student->doubt_file)
                                    <a href="{{ asset('public/'.$student->doubt_file) }}" target="_blank">
                                        <img src="{{ asset('public/assets/front/img/logos/pd.png') }}" alt="Doubt File" height="50" width="50">
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($student->resolve_file)
                                    <a href="{{ asset('public/'.$student->resolve_file) }}" target="_blank">
                                        <img src="{{ asset('public/assets/front/img/logos/pd.png') }}" alt="Doubt File" height="50" width="50">
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                {{-- {{ $student->description }} --}}
                                <a href="javascript:void(0);" 
                                    class="btn btn-primary btn-sm view-description" 
                                    data-description="{{ $student->description }}"
                                    data-reply="{{ $student->reply ?? '' }}">
                                    View
                                </a>
                            </td>
                            <td>
                                <span class="badge 
                                    @if($student->status == 'active') bg-success 
                                    @else bg-danger 
                                    @endif">
                                    {{ $student->status == 'active' ? 'Replied' : 'Pending' }}
                                </span>
                            </td>
                            
                            <td>
                                <a href="javascript:void(0);" class="edit-status" data-id="{{ $student->id }}" data-status="{{ $student->description }}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        
                        @endforeach
                    
                    </tbody>
                    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descriptionModalLabel">Doubt & Reply</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Doubt:</strong></p>
                                    <p id="modal-description"></p>
                                    <hr>
                                    <p><strong>Reply:</strong></p>
                                    <p id="modal-reply"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editStatusModalLabel">Edit Reply Message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateStatusForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="doubtId" name="doubt_id">
                                    
                                        <label for="status">Student Message</label>
                                        <textarea class="form-control" id="currentStatus" cols="30" rows="3" disabled></textarea>
                                    
                                        <label for="newStatus" class="mt-2">Your Reply</label>
                                        <textarea class="form-control" id="newStatus" name="reply" cols="30" rows="5" required></textarea>
                                    
                                        <label class="mt-2">Attach Resolve File (optional)</label>
                                        <input type="file" name="resolve_file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                                    
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.view-description').click(function(){
            let description = $(this).data('description');
            let reply = $(this).data('reply');

            $('#modal-description').text(description);
            $('#modal-reply').text(reply ? reply : 'No reply yet.');

            $('#descriptionModal').modal('show');
        });
    });
</script>

@endsection

@section('customJs')

<script>
    $(document).ready(function() {
        // Open modal and set data
        $(".edit-status").click(function() {
            let doubtId = $(this).data("id");
            let currentStatus = $(this).data("status");

            $("#doubtId").val(doubtId);
            $("#currentStatus").val(currentStatus);
            $("#newStatus").val(""); 
            $("#editStatusModal").modal("show");
        });

        // AJAX Form Submit
        $("#updateStatusForm").submit(function(e){
            e.preventDefault();

            let formData = new FormData(this); // handles file + text
            $.ajax({
                url: "/admin/send-reply", // make sure route name matches
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    alert(response.message);
                    $("#editStatusModal").modal("hide");
                    $("#updateStatusForm")[0].reset();
                    // optionally reload table or row here
                },
                error: function(xhr){
                    alert("Error: " + xhr.responseJSON.message);
                }
            });
        });
    });
</script>


@endsection