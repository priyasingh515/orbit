@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Evaluate</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('evaluate.index')}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- <form  method="POST" action="{{ route('evaluate.store') }}"> --}}
        <form  method="POST" action="{{ url('admin/evaluate/store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Email</label>
                                <input type="text" name="email"  class="form-control" placeholder="Enter Email" required>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cpassword">State</label>
                                {{-- <input type="text" name="state"  class="form-control" placeholder="Enter Confirm Password"> --}}
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="cg">CG</option>
                                    <option value="mp">MP</option>
                                </select>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option  value="3">Evaluate</option>
                                   
                                </select>

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