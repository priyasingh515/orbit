@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Mains Practice Question</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('mainspractice.index')}}" class="btn btn-primary">View List</a>
            </div>
        </div>
    </div>

</section>

<section class="content">

    <div class="container-fluid">
        <form  method="POST" action="{{route('mains.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">State</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select</option>
                                    <option value="cg">CG</option>
                                    <option value="mp">MP</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="paper_type">Paper Type</label>
                                <select name="paper_type" id="paper_type" class="form-control">
                                    <option value="">Select Paper Type</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject">Subject</label>
                                <select name="subject_type" id="subject" class="form-control">
                                    <option value="">Select Subject</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mains_file">Upload PDF</label>
                                <input type="file" name="mains_file" id="mains_file" class="form-control" required>
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

<script>
    $(document).ready(function () {
        // State Change -> Paper Types Load
        $('#state').on('change', function () {
            var state = $(this).val();
            if (state) {
                $.ajax({
                    url: '/admin/get_paper',
                    type: 'GET',
                    data: { state: state },
                    success: function (data) {
                        $('#paper_type').html('<option value="">Select Paper Type</option>');
                        $.each(data, function (key, value) {
                            $('#paper_type').append('<option value="' + value.id + '">' + value.paper_type_name + '</option>');
                        });
                    }
                });
            } else {
                $('#paper_type').html('<option value="">Select Paper Type</option>');
                $('#subject').html('<option value="">Select Subject</option>'); // Reset Subject
            }
        });

        // Paper Type Change -> Subjects Load
        $('#paper_type').on('change', function () {
            var paperTypeId = $(this).val();
            if (paperTypeId) {
                $.ajax({
                    url: '/admin/get_subjects',
                    type: 'GET',
                    data: { paper_type_id: paperTypeId },
                    success: function (data) {
                        $('#subject').html('<option value="">Select Subject</option>');
                        $.each(data, function (key, value) {
                            $('#subject').append('<option value="' + value.id + '">' + value.subject_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subject').html('<option value="">Select Subject</option>');
            }
        });
    });
</script>

@endsection