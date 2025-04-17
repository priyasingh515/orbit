@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Question Paper</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('question.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   
    <div class="container-fluid">
        <form  method="POST" action="{{ route('question.update', $questions->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-control" onchange="toggleYearField()">
                                    <option value="">Select</option>
                                    <option value="cg" {{ ($questions->state ?? '') == 'cg' ? 'selected' : '' }}>CG</option>
                                    <option value="mp" {{ ($questions->state ?? '') == 'mp' ? 'selected' : '' }}>MP</option>
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
                                <label for="paper_type">Subject Type</label>
                                <select name="subject_type" id="subject" class="form-control">
                                    <option value="">Select Subject Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 part-section">
                            <div class="mb-3">
                                <label for="part">Part</label>
                                <select name="part" id="part" class="form-control">
                                    <option value="">Select Part</option>
                                    <option value="a">Part A</option>
                                    <option value="b">Part B</option>
                                </select>
                            </div>
                        </div>
                       
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Upload PDF</label>
                                <input type="file" name="file" id="file" value="{{$questions->pdf_path}}" class="form-control" accept="application/pdf">
                                @if($questions->pdf_path) 
                                <a href="{{ url('admin/pdfs/' . basename($questions->pdf_path)) }}" target="_blank">View PDF</a>
                                @else
                                    No PDF
                                @endif
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
    
    
    
    
    <!-- /.card -->
</section>

@endsection



@section('customJs')

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script>
    function toggleYearField() {
        var state = document.getElementById("state").value;
        var yearField = document.getElementById("yearField");

        if (state === "cg") {
            yearField.style.display = "none"; // Hide Year Field
        } else {
            yearField.style.display = "block"; // Show Year Field
        }
    }

    // Ensure correct state is applied on page load (useful for editing forms)
    window.onload = toggleYearField;
</script>


<script>
    $(document).ready(function () {
        $('#state').on('change', function () {
            var state = $(this).val();
            $('#paper_type').html('<option value="">Select Paper Type</option>'); // Clear previous options

            if (state === 'mp') {
                // Static Data for MP
                var staticOptions = [
                    { id: 14, paper_type_name: 'Part A' },
                    { id: 15, paper_type_name: 'Part B' },
                ];

                $.each(staticOptions, function (key, value) {
                    $('#paper_type').append('<option value="' + value.id + '">' + value.paper_type_name + '</option>');
                });
            } else if (state) {
                // API Call for Other States
                $.ajax({
                    url: '{{ url("/admin/get-paper-types") }}', // Ensure correct route
                    type: 'GET',
                    data: { state: state },
                    success: function (data) {
                        if (data.length > 0) {
                            $.each(data, function (key, value) {
                                $('#paper_type').append('<option value="' + value.id + '">' + value.paper_type_name + '</option>');
                            });
                        } else {
                            $('#paper_type').html('<option value="">No Paper Types Found</option>');
                        }
                    },
                    error: function () {
                        alert('Something went wrong! Please try again.');
                    }
                });
            }
        });
    });
</script> --}}


<script>
    $(document).ready(function () {
        var selectedState = "{{ $questions->state ?? '' }}";
        var selectedPaperType = "{{ $questions->paper_type ?? '' }}";
        var selectedSubject = "{{ $questions->subject_type ?? '' }}";

        function loadPaperTypes(state, selectedPaperType) {
            if (state) {
                $.ajax({
                    url: '/admin/get_paper',
                    type: 'GET',
                    data: { state: state },
                    success: function (data) {
                        $('#paper_type').html('<option value="">Select Paper Type</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedPaperType) ? 'selected' : '';
                            $('#paper_type').append('<option value="' + value.id + '" ' + selected + '>' + value.paper_type_name + '</option>');
                        });

                        // Agar edit mode hai to subjects load kare
                        if (selectedPaperType) {
                            loadSubjects(selectedPaperType, selectedSubject);
                        }
                    }
                });
            } else {
                $('#paper_type').html('<option value="">Select Paper Type</option>');
                $('#subject').html('<option value="">Select Subject</option>'); 
            }
        }

        function loadSubjects(paperTypeId, selectedSubject) {
            if (paperTypeId) {
                $.ajax({
                    url: '/admin/get_subjects',
                    type: 'GET',
                    data: { paper_type_id: paperTypeId },
                    success: function (data) {
                        $('#subject').html('<option value="">Select Subject</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedSubject) ? 'selected' : '';
                            $('#subject').append('<option value="' + value.id + '" ' + selected + '>' + value.subject_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subject').html('<option value="">Select Subject</option>');
            }
        }

        // State Change Event
        $('#state').on('change', function () {
            var state = $(this).val();
            loadPaperTypes(state, '');
        });

        // Paper Type Change Event
        $('#paper_type').on('change', function () {
            var paperTypeId = $(this).val();
            loadSubjects(paperTypeId, '');
        });

        // Page Load -> Edit Mode Data Load
        if (selectedState) {
            loadPaperTypes(selectedState, selectedPaperType);
        }
    });
</script>
    
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
{{-- <script>
    Dropzone.autoDiscover = false;

    var pdfDropzone = new Dropzone("#pdf-dropzone", {
        url: "{{ route('question.store') }}",
        paramName: "file",
        maxFiles: 1,
        acceptedFiles: ".pdf",
        maxFilesize: 5, // 5MB max
        autoProcessQueue: false,
        addRemoveLinks: true,
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
    });

    document.getElementById("upload-form").addEventListener("submit", function (e) {
        e.preventDefault();

        if (pdfDropzone.files.length === 0) {
            alert("Please upload a PDF file.");
            return;
        }

        var formData = new FormData();
        formData.append("name", document.getElementById("name").value);
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("file", pdfDropzone.files[0]);

        fetch("{{ route('question.store') }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("✅ Upload successful!");
                pdfDropzone.removeAllFiles();
                document.getElementById("name").value = "";
            } else {
                alert("❌ Upload failed: " + data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });

    // 🔹 Error Handling for Dropzone
    pdfDropzone.on("error", function (file, errorMessage, xhr) {
        if (xhr && xhr.response) {
            let response = JSON.parse(xhr.response);
            alert("❌ Error: " + response.message);
        } else {
            alert("❌ Upload failed. Please try again.");
        }
    });

    // 🔹 File Successfully Added Message
    pdfDropzone.on("addedfile", function (file) {
        console.log("📄 File added:", file.name);
    });

    // 🔹 File Removed Message
    pdfDropzone.on("removedfile", function (file) {
        console.log("🗑 File removed:", file.name);
    });

    // 🔹 Upload Complete Handler
    pdfDropzone.on("complete", function (file) {
        console.log("✅ Upload completed for:", file.name);
    });
</script> --}}


@endsection