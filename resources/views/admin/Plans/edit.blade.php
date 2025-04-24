@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Plan</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('plan.index')}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form  method="POST" action="{{ route('plan.update',$plans->id) }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select</option>
                                    <option value="cg" {{ ($plans->state ?? '') == 'cg' ? 'selected' : '' }}>CG</option>
                                    <option value="mp" {{ ($plans->state ?? '') == 'mp' ? 'selected' : '' }}>MP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Plan Name</label>
                                <input type="text" name="plan_name" value="{{$plans->plan_name}}" class="form-control" placeholder="Enter Plan Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Plan Validity</label>
                                <input type="text" name="plan_validity" value="{{$plans->plan_validity}}"  class="form-control" placeholder="Enter Plan Validity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="daily_question_limit">Daily Question Limit</label>
                                <input type="number" name="daily_question_limit"  value="{{$plans->daily_question_limit}}"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Medium</label>
                                <input type="text" name="medium"  value="{{$plans->medium}}" class="form-control" placeholder=" Hindi or English Medium" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Price</label>
                                <input type="text" name="price" value="{{$plans->price}}"  class="form-control" placeholder="Enter price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Description 1</label>
                                <input type="text" name="description_1" value="{{$plans->description_1}}" class="form-control" placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Description 2</label>
                                <input type="text" name="description_2" value="{{$plans->description_2}}"  class="form-control" placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Description 3</label>
                                <input type="text" name="description_3" value="{{$plans->description_3}}" class="form-control" placeholder="Enter Description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Description 4</label>
                                <input type="text" name="description_4" value="{{$plans->description_4}}" class="form-control" placeholder="Enter Description">
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