@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pending Plans</h1>
            </div>
           
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
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>User name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Plan name</th>
                            <th>price</th>
                            <th>Purchase  date</th>
                            <th>plan expire date</th>
                            <th>Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($pendingPlans as $plan)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$plan->user_name}}</td>
                            <td>{{$plan->mobile}}</td>
                            <td>{{$plan->email}}</td>
                            <td>{{$plan->state}}</td>
                            <td>{{$plan->district}}</td>
                            <td> {{$plan->plan_name}}</td>
                            <td> {{$plan->price}}</td>
                            <td> {{$plan->purchase_date}}</td>
                            <td> {{$plan->expiry_date}}</td>
                            <td>
                                @if($plan->status == 'pending')
                                    <span class="badge bg-danger text-white px-3 py-1 rounded-pill">{{ $plan->status }}</span>
                                @elseif($plan->status == 'active')
                                    <span class="badge bg-success text-white px-3 py-1 rounded-pill">{{ $plan->status }}</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill">{{ $plan->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="edit-status" data-id="{{ $plan->id }}" data-status="{{ $plan->status }}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('pendingplan.delete', $plan->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStatusModalLabel">Edit Plan Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateStatusForm">
                                            @csrf
                                            <input type="hidden" id="planId" name="plan_id">
                                            <label for="status">Select Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="active">Active</option>
                                            </select>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </tbody>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>

@endsection

@section('customJs')
<script>
    $(document).ready(function() {
        // Modal open on edit button click
        $(".edit-status").click(function() {
            let planId = $(this).data("id");
            let currentStatus = $(this).data("status");

            $("#planId").val(planId);
            $("#status").val(currentStatus);
            $("#editStatusModal").modal("show");
        });

        // Form submit event
        $("#updateStatusForm").submit(function(e) {
            e.preventDefault();

            let formData = {
                _token: $('meta[name="csrf-token"]').attr("content"),
                plan_id: $("#planId").val(),
                status: $("#status").val()
            };

            $.ajax({
                url: "/admin/update-plan-status",
                type: "POST",
                data: formData,
                success: function(response) {
                    alert("Status Updated Successfully!");
                    location.reload(); // Page refresh
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    });

</script>

@endsection