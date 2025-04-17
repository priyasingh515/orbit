@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Doubt List</h1>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{route('evaluate.create')}}" class="btn btn-primary">Add About</a>
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
            <form action=""method="get">
            <div class="card-header">
                <div class="card-title">
                    {{-- <button type="button" onclick="window.location.href='{{route('categories.index')}}'" class="btn btn-default btn-sm">Reset</button> --}}
                </div>
                    
                </div>
            </form>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Answer sheet</th>
                            <th>Checked Answer sheet</th>
                            <th>Student Doubt</th>
                            <th>Evaluator Reply</th>
                            <th>Evaluator Name</th>
                            <th>Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($doubts as $dout)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$dout->student_name}}</td>
                            <td> {{$dout->student_email}}</td>
                            <td>
                                @if (!empty($dout->answer_pdf) && is_string($dout->answer_pdf))
                                    <a href="{{ url($dout->answer_pdf) }}" target="_blank">
                                        <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Answer Pdf" height="50" width="50">
                                    </a>
                                @else
                                    <span>No PDF</span>
                                @endif
                            </td>
                            <td>
                                @if (!empty($dout->check_file) && is_string($dout->check_file))
                                    <a href="{{ url($dout->check_file) }}" target="_blank">
                                        <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Answer Pdf" height="50" width="50">
                                    </a>
                                @else
                                    <span>No PDF</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewModal" 
                                        data-title="Description"
                                        data-content="{{ $dout->description }}">
                                    View
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewModal" 
                                        data-title="Reply"
                                        data-content="{{ $dout->reply }}">
                                    View
                                </button>
                            </td>
                            <td> {{$dout->teacher_name}}</td>
                            <td>
                                @if($dout->status == 'pending')
                                    <span class="badge bg-danger">Pending</span>
                                @elseif($dout->status == 'active')
                                    <span class="badge bg-success">Success</span>
                                @endif
                            </td>
                            {{-- <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#messageModal" data-message="{{ $enq->message }}">
                                    View
                                </button>
                            </td>
                            <td>{{$enq->state}}</td> --}}
                            
                            <td>
                                <a href="{{route('doubtDlt.delete',$dout->id)}}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="viewModalLabel">View</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body" id="modalContent">
                          <!-- Content will be inserted here via JS -->
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
    const viewModal = document.getElementById('viewModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const content = button.getAttribute('data-content');
        const title = button.getAttribute('data-title');

        const modalBody = viewModal.querySelector('.modal-body');
        const modalTitle = viewModal.querySelector('.modal-title');

        modalBody.textContent = content;
        modalTitle.textContent = title;
    });
</script>
@endsection

@section('customJs')

@endsection