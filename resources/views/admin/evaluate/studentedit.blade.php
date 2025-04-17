@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Evaluate</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('about.index')}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- <form  method="POST" action="{{ route('evaluate.store') }}"> --}}
        <form  method="POST" action="{{ route('student.uploadCheckedSheet',$studentanswerList->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="answer_sheet_id" value="{{ $studentanswerList->answersheet_id }}">
                            <div class="mb-3">
                                <label for="name">Check Answer upload</label>
                                <input type="file" name="checked_file" class="form-control" required>
                                <a href="{{ url('public/'.$studentanswerList->answer_pdf) }}" target="_blank">
                                    <img src="{{asset('public/assets/front/img/logos/pd.png')}}" alt="Answer Pdf" height="100" width="100">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Email</label>
                                <input type="text" name="email" value="{{$studentanswerList->student_email}}"  class="form-control" placeholder="Enter Email">
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Remarks (Optional)</label>
                                {{-- <input type="text" name="remark" value=""  class="form-control" placeholder="Enter Remark"> --}}
                                <textarea name="remark" class="form-control" id="remark" cols="30" rows="10" >

                                </textarea>
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