@extends('layouts.admin')

@section('content')
<!--begin::Toolbar-->
<div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start me-3 gap-2">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Expenses</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{ route('home') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{ route('expenses') }}" class="text-gray-600 text-hover-primary">Expenses</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">Add</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">New</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center">
            <!--begin::Daterange-->
            <a href="#" class="btn btn-flex bg-body h-35px h-lg-40px px-5" id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover" title="Select dashboard daterange">
                <span class="me-4">
                    <span class="text-muted fw-bold me-1" id="kt_dashboard_daterangepicker_title">Today</span>
                    <span class="text-primary fw-bolder" id="kt_dashboard_daterangepicker_date">Dec 17</span>
                </span>
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-4 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--end::Daterange-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->

<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10 p-10">
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin:Form-->
                <form id="saveForm" class="form" action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add New Expenses</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Please carefully complete all the fields
                            {{-- <a href="#" class="fw-bolder link-primary">Project Guidelines</a>. --}}
                           @include('partials.validation_messages')
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Expense Title</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a Expense title for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Expense Title" name="name" id="name" />
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Amount</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a expenses amount for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="number" class="form-control form-control-solid" placeholder="Enter Expense Amount" name="amount" id="amount" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Col-->
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                         <!--begin::Col-->
                         <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Paid By</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a expenses paid by for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Amount Paid By" name="paid_by" id="paid_by" />
                        </div>
                        <!--end::Col-->
                         <!--begin::Col-->
                         <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Paid To</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a expenses paid to for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Amount Paid To" name="paid_to" id="paid_to" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
							<div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-bold mb-2">Description</label>
								<textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Type Expenses Description" id="description"></textarea>
                            </div>
                        </div>
						<!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <a href="{{ route('expenses') }}" class="btn btn-light me-3">Cancel</a>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Content-->
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
if ($("#saveForm").length > 0) {
    $("#saveForm").validate({
        rules: {
            name: {
            required: true,
            },
            amount: {
            required: true,
            },
            paid_by: {
            required: true,
            },
            paid_to: {
            required: true,
            },
        },
        messages: {
            name: {
            required: "Please enter name",
            maxlength: "Shop name maxlength should be 50 characters long."
            },
            amount: {
            required: "Please enter amount",
            maxlength: "amount maxlength should be 50 characters long."
            },
            paid_by: {
            required: "Please enter paid by name",
            maxlength: "Paid by name maxlength should be 50 characters long."
            },
            paid_to: {
            required: "Please enter paid to name",
            maxlength: "Paid to name maxlength should be 50 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').html('Please Wait...');
            $("#submit"). attr("disabled", true);
            $.ajax({
                url: "{{route('expense.save')}}",
                type: "POST",
                data: $('#saveForm').serialize(),
                    success: function( response ) {
                    $('#submit').html('Submit');
                    $("#submit"). attr("disabled", false);
                    document.getElementById("saveForm").reset();
                    Swal.fire({
                    position: "top-right",
                    icon: "success",
                    title: "Record Added Successfully",
                    showConfirmButton: false,
                    timer: 2000
                    });
                }
            });
        }
    })
}
</script>
@endsection