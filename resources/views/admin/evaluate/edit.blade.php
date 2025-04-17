@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Evaluate</h1>
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
        <form  method="POST" action="{{ route('evaluate.update',$evaluate->id) }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Title</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Title" value="{{$evaluate->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Content</label>
                                <input type="text" name="email"  class="form-control" value="{{$evaluate->email}}" placeholder="Enter content">
                            </div>
                        </div>
    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" value="" placeholder="Enter Password" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cpassword">State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="cg" {{ $evaluate->state == 'cg' ? 'selected' : '' }}>CG</option>
                                    <option value="mp" {{ $evaluate->state == 'mp' ? 'selected' : '' }}>MP</option>
                                </select>
                            </div>
                        </div>  --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="evaluate">Select</label>
                                <select name="evaluate" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="3" {{ $evaluate->role == 3 ? 'selected' : '' }}>Evaluate</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="evaluate">Select</label>
                                <select name="evaluate" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="3" {{ $evaluate->role == 3 ? 'selected' : '' }}>Evaluate</option>
                                </select> 
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" name="cpassword"  class="form-control" placeholder="Enter Confirm Password" required>
                            </div>
                        </div>     --}}
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
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