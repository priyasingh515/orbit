@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Enquiry List</h1>
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
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                            {{-- <th>Subject</th> --}}
                            <th>Phone Number</th>
                            <th>Meassge</th>
                            <th>State</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($enquery as $enq)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$enq->name}}</td>
                            <td> {{$enq->email}}</td>
                            {{-- <td> {{$enq->subject}}</td> --}}
                            <td>{{$enq->mobile}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#messageModal" data-message="{{ $enq->message }}">
                                    View
                                </button>
                            </td>
                            <td>{{$enq->state}}</td>
                            
                            <td>
                                <a href="{{route('enquerylist.delete',$enq->id)}}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
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
        var messageModal = document.getElementById('messageModal');

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