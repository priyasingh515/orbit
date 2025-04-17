@extends('front.layouts.master')
@section('title','Our Plan')
@section('content')

<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>

        
        <section class="bg-light">
            <div class="container">
                <div class="section-heading">
                    {{-- <span class="sub-title">Plans</span> --}}
                    <h2 class="h1 mb-0">Our Plans</h2>
                </div>
                <div class="row align-items-center g-xl-5 mt-n1-9">
                    @foreach ($cgplans as $plan)
                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <div class="card card-style4 p-1-9 p-xl-5">
                                <div class="border-bottom pb-1-9 mb-1-9 section-heading">
                                    <span class=" sub-title"style="width: 295px">{{$plan->plan_name}}</span>
                                    <h4 class="text-dark display-5 display-xxl-4 mb-0 lh-1 fw-bold">{{$plan->price}}<span class="display-29">/₹</span></h4>
                                </div>
                                <ul class="list-unstyled mb-2-9">
                                    <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->plan_validity}}</li>
                                    <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_1}}</li>
                                    <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_2}}</li>
                                    <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_3}}</li>
                                    <li class="mb-3"><i class="ti-check text-primary me-3"></i>{{$plan->description_4}}</li>
                                    <li><i class="ti-check text-primary me-3"></i>{{$plan->medium}}</li>
                                </ul>
                                <div>
                                    <a href="javascript:void(0);" onclick="checkLogin({{$plan->id}})" class="butn"><i class="far fa-gem icon-arrow before"></i><span
                                            class="label">Choose Plan</span><i class="far fa-gem icon-arrow after"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                 
                </div>
            </div>
        </section>
        <input type="hidden" id="auth_user" value="{{ Auth::check() ? '1' : '0' }}">

        <div class="modal fade" id="purchasePlanModal" tabindex="-1" aria-labelledby="purchasePlanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchasePlanModalLabel">Enter Your Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="purchasePlanForm">
                            @csrf
                            <input type="hidden" name="plan_id" id="plan_id">
        
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <select class="form-control" id="district" name="district" required>
                                    <option value="">Select District</option>
                                        @foreach ($cgDistricts as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                </select>
                            </div>
        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function checkLogin(planId) {
                 let isLoggedIn = $("#auth_user").val(); 
         
                 if (isLoggedIn == "1") {
                     $("#plan_id").val(planId);
                     $("#purchasePlanModal").modal("show");
                 } else {
                     alert("Please log in to purchase a plan.");
                     $("#loginModal").modal("show");
                 }
             }
         
             $("#purchasePlanForm").submit(function(e) {
                 e.preventDefault();
                 let formData = $(this).serialize(); 
         
                 $.ajax({
                     url: "{{ route('purchase.plan') }}",
                     type: "POST",
                     data: formData,
                     success: function(response) {
                         alert(response.message);
                         $("#purchasePlanModal").modal("hide");
                         if (response.redirect_url) {
                             window.location.href = response.redirect_url;
                         }
                     },
                     error: function(xhr) {
                         alert(xhr.responseJSON.message);
                     }
                 });
             });
        </script>
          
    
@endsection