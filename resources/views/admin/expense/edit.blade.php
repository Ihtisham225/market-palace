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
                <li class="breadcrumb-item text-gray-600">Edit</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">{{ $info->title }}</li>
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
                <form id="updateForm" class="form" action="javascript:void(0)" method="POST">
                    @csrf
                    @method('PUT')
                    <div id="data">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Edit Expense</h1>
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
                                <input type="text" class="form-control form-control-solid" placeholder="Enter Expense Title" name="name" id="name" value="{{ $info->title }}" />
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Amount</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a expenses amount for future usage and reference"></i>
                                </label>
                                <!--end::Label-->
                                <input type="number" class="form-control form-control-solid" placeholder="Enter Expense Amount" name="amount" id="amount" value="{{ $info->amount }}" />
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
                                <input type="text" class="form-control form-control-solid" placeholder="Amount Paid By" name="paid_by" id="paid_by" value="{{ $info->paid_by }}" />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Paid To</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a expenses paid to for future usage and reference"></i>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Amount Paid To" name="paid_to" id="paid_to" value="{{ $info->paid_to }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Status</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Status" name="status">
                                    <option value="{{ $info->status }}" selected>{{ $info->status == 1 ? 'Active' : 'Inactive' }}</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <div class="d-flex flex-column mb-8">
                                    <label class="fs-6 fw-bold mb-2">Description</label>
                                    <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Type Expenses Description" id="description">{{ $info->description }}</textarea>
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
                    </div>
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
if ($("#updateForm").length > 0) {
    $("#updateForm").validate({
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
                url: "{{route('expense.update', $info->id)}}",
                type: "POST",
                data: $('#updateForm').serialize(),
                    success: function( response ) {
                    $('#submit').html('Submit');
                    $("#submit"). attr("disabled", false);
                    document.getElementById("updateForm").reset();
                    Swal.fire({
                    position: "top-right",
                    icon: "success",
                    title: "Record Updated Successfully",
                    showConfirmButton: false,
                    timer: 2000
                    });
                }
            });
            $('#data').load(document.URL +  ' #data');
        }
    })
}
</script>
@endsection