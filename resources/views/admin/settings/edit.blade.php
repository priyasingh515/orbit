@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Settings</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('setting.index')}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form  method="POST" action="{{route('setting.update',$settings->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" value="{{$settings->mobile}}" placeholder="Enter Your Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Email</label>
                                <input type="email" name="email" value="{{$settings->email}}"  class="form-control" placeholder="Enter Email Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Whatsapp Number</label>
                                <input type="text" name="whatsapp" value="{{$settings->whatsapp}}"  class="form-control" placeholder="Enter Whatsapp number">
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Banner</label>
                                <input type="file" name="banner" value="{{$settings->banner}}"  class="form-control" placeholder="Enter Description">
                                <img src="{{ url('public/'.$settings->banner) }}" alt="Banner" height="100" width="100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Heading</label>
                                <input type="text" name="heading" value="{{$settings->heading}}" class="form-control" placeholder="Enter heading for front Page">
                            </div>
                        </div>
                       
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