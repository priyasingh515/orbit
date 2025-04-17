@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Teacher Assigned</h1>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{route('question.index')}}" class="btn btn-primary">View</a>
            </div> --}}
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   
    <div class="container-fluid">
        <form  method="POST" action="{{ route('student.assign',$answerSheet->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="assigned">Assigned</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Teacher</label>
                                @php
                                    $teachers = DB::table('users')
                                        ->join('teacher_states', 'users.id', '=', 'teacher_states.user_id')
                                        ->where('users.role', 3)
                                        ->where('teacher_states.state', $type)
                                        ->select('users.id', 'users.name')
                                        ->get();
                                @endphp
                                <select name="teacher_id" id="teacher" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($teachers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                 
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Answer Pdf</label>
                                <input type="hidden" name="answer_sheet_id" id="name" value="{{$answerSheet->id}}" class="form-control" placeholder="Enter Name">
                                <a href="{{ url($answerSheet->answer_pdf) }}" target="_blank">
                                    <img src="{{asset('public/assets/pdf_img/pdficons.jpg')}}" alt="Answer Pdf" height="100" width="100">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a href="" class="btn btn-outline-dark ml-3">Cancel</a> --}}
            </div>
        </form>
    </div>
    
    
    
    
    <!-- /.card -->
</section>

@endsection



@section('customJs')

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
            });
        @endif

        @if($errors->any())
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                text: errorMessages,
            });
        @endif
    });
</script>

@endsection