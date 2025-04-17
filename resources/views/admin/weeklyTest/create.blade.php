@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Monthly Current Affairs</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('weekly.index')}}" class="btn btn-primary">View List</a>
            </div>
        </div>
    </div>

</section>

<section class="content">

    <div class="container-fluid">
        <form  method="POST" action="{{ route('weekly.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="cg">CG</option>
                                    <option value="mp">MP</option>

                                </select>
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year">Date & year</label>
                                <input type="date" name="year" id="year" class="form-control" placeholder="Enter Year" value="{{ old('year') }}">
                                
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="weekly_file">Upload PDF</label>
                                <input type="file" name="weekly_file" id="weekly_file" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    
</section>

@endsection



@section('customJs')

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