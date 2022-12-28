@extends('layouts.admin')

@section('content')

<!--begin::Toolbar-->
<div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start me-3 gap-2">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Trashed Shop Types</h1>
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
                    <a href="{{ route('types') }}" class="text-gray-600 text-hover-primary">Shop Types</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">List</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">Trashed</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center">
            <!--begin::total-->
            <a href="#" class="btn btn-flex bg-body h-35px h-lg-40px px-5" id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover" title="Total Brands" style="margin:5px;">
                <span class="me-4">
                    <span class="text-muted fw-bold me-1" id="kt_dashboard_daterangepicker_title">Total:</span>
                    <span class="text-primary fw-bolder" id="kt_dashboard_daterangepicker_date">{{ $total }}</span>
                </span>
            </a>
            <!--end::total-->
            
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
        <!--begin::Tables Widget 10-->
        <div class="card mb-5 mb-xl-8 mt-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Trashed Shop Types</span>
                    {{-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 new products</span> --}}
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('types') }}" class="btn btn-sm btn-light-primary">
                    <!--end::Svg Icon-->Shop Types</a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                @if(count($rows) > 0)
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-325px rounded-start">Name</th>
                                <th class="min-w-200px text-end rounded-end"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($rows as $row)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $row->title }}</a>
                                        </div>
                                    </div>
                                </td>
                               
                                <td class="text-end">
                                    <form style="display:inline;" action="{{ route('type.restore', $row->id) }}" method="POST" class="restore_record">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Update.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </button>
                                    </form>
                                    
                                    <form style="display:inline;" action="{{ route('type.delete.permanent', $row->id) }}" method="POST" class="delete_record">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{ $rows->links() }}
                </div>
                @else
                <h3 style="text-align: center;">Trash is empty</h3>
                @endif
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 10-->
    </div>
</div>

@endsection

@section('script')
<script>

$(".delete_record").click(function(e) {
    e.preventDefault();
    var delete_form = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then(function(delete_result) {
        if (delete_result.value) {
            Swal.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
            )
            delete_form.submit();
        }
    });
});


$(".restore_record").click(function(f) {
    f.preventDefault();
    var restore_form = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "It will be restored",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, restore it!"
    }).then(function(restore_result) {
        if (restore_result.value) {
            Swal.fire(
                "Resotred!",
                "Your file has been restored.",
                "success"
            )
            restore_form.submit();
        }
    });
});

</script>
@endsection