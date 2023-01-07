<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Market Palace</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @if(count($shops) > 0)
					<!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::Row-->
							<div class="row g-5 g-xl-8" id="data">
								<div class="col-xl-12">
									<!--begin::List Widget 9-->
									<div class="card card-xl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header align-items-center border-0 mt-3">
											<h3 class="card-title align-items-start flex-column">
												<span class="fw-bolder text-dark fs-3">My Shops</span>
												<span class="text-gray-400 mt-2 fw-bold fs-6">Please Select A Shop You Want To Interect</span>
											</h3>
											<div class="card-toolbar">
												<!--begin::Menu-->
                                                <a class="btn btn-primary btn-sm px-4" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add new shop</a>
												<!--end::Menu-->
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pt-5">
											<!--begin::Item-->
                                            @foreach($shops as $shop)
                                            <div class="d-flex mb-7">
												<!--begin::Symbol-->
												<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
													<img src="{{ '/assets/media/images/shops/'.$shop->image }}" class="mw-100" alt="" />
												</div>
												<!--end::Symbol-->
												<!--begin::Section-->
												<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
													<!--begin::Title-->
													<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
														<a href="{{ route('shop.session', $shop->id) }}" class="fs-5 text-gray-800 text-hover-primary fw-bolder">{{ $shop->name }}</a>
														<span class="text-gray-400 fw-bold fs-7 my-1">{{ $shop->shop_type->title }}</span>
														<span class="text-gray-400 fw-bold fs-7">Located At:
														<i class="text-primary fw-bold">{{ $shop->address }}</i></span>
													</div>
													<!--end::Title-->
													<!--begin::Info-->
													<div class="text-end py-lg-0 py-2">
														<span class="text-gray-800 fw-boldest fs-3">{{ $shop->phone }}</span>
														<span class="text-gray-400 fs-7 fw-bold d-block">{{ $shop->email }}</span>
													</div>
													<!--end::Info-->
												</div>
												<!--end::Section-->
											</div>
                                            @endforeach
											<!--end::Item-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::List Widget 9-->
								</div>
							</div>
							<!--end::Row-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
                    @else
                    <!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Heading-->
									<div class="card-px text-center pt-15 pb-15">
										<!--begin::Title-->
										<h2 class="fs-2x fw-bolder mb-0">Welcome to Market Palace</h2>
										<!--end::Title-->
										<!--begin::Description-->
										<p class="text-gray-400 fs-4 fw-bold py-7">Click on the below button to add
										<br />your first SHOP.</p>
										<!--end::Description-->
										<!--begin::Action-->
										<a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add New Shop</a>
										<!--end::Action-->
									</div>
									<!--end::Heading-->
									<!--begin::Illustration-->
									<div class="text-center pb-15 px-5">
										<img src="assets/media/illustrations/sketchy-1/17.png" alt="" class="mw-100 h-200px h-sm-325px" />
									</div>
									<!--end::Illustration-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
                    @endif

                    <!--begin::Modal - New Target-->
                    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content rounded">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <!--begin:Form-->
                                    <form id="saveForm" class="form" action="{{ route('shop.save') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">Add New Shop</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5">Please carefully complete all the fields
                                            {{-- <a href="#" class="fw-bolder link-primary">Project Guidelines</a>. --}}
                                        </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-9 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Shop Name</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a shop name for future usage and reference"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Shop Name" name="name" id="name"/>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('/assets/media/avatars/shop_default.png')"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">Shop Type</label>
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Shop Type" name="shop_type" id="shop_type">
                                                    <option value="">Select shop type...</option>
                                                    @foreach($shop_types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Email</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a shop email for future usage and reference"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="email" class="form-control form-control-solid" placeholder="Enter Shop Email" name="email" id="email"/>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Phone</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a shop phone for future usage and reference"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Shop Phone" name="phone" id="phone"/>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <div class="d-flex flex-column mb-8">
                                                    <label class="fs-6 fw-bold mb-2">Address</label>
                                                    <textarea class="form-control form-control-solid" rows="3" name="address" placeholder="Type Shop Address" id="address"></textarea>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--begin::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end:Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Target-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/modals/create-campaign.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->

		<!--begin::Ajax-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<!--end::Ajax-->

        <script>
            $(document).ready(function (e) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#saveForm').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type:'POST',
                        url: "{{ route('shop.save')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        this.reset();
                        $('#table').load(document.URL +  ' #table');
                        Swal.fire({
                            position: "top-right",
                            icon: "success",
                            title: "Record Added Successfully",
                            showConfirmButton: false,
                            timer: 2000
                            });
                        },
                        error: function(data){
                            Swal.fire({
                                position: "top-right",
                                icon: "error",
                                title: "Record Not Added",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    });
                });
            });
        </script>
		<!--end::Javascript-->

	</body>
	<!--end::Body-->
</html>