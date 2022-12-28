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
	<head><base href="">
		<title>Market Palace</title>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="/assets/media/logos/logo-marketpalace-red.svg" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<style>
			.error{
				color: #FF0000; 
			}
		</style>

		@yield('style')
		<!--end::Page Custom CSS-->

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
					<!--begin::Header-->
					@include('partials.header')
					<!--end::Header-->
					<!--begin::Toolbar-->
					{{-- @include('partials.toolbar') --}}
					<!--end::Toolbar-->
					<!--begin::Container-->
                    @yield('content')
					<!--end::Container-->
					<!--begin::Footer-->
					@include('partials.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
		@include('partials.activites_drawer')
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		@include('partials.chat_drawer')
		<!--end::Chat drawer-->
		<!--end::Drawers-->
		<!--end::Main-->
		<!--begin::Engage drawers-->
		<!--begin::Demos drawer-->
		@include('partials.demos_drawer')
		<!--end::Demos drawer-->
		<!--end::Engage drawers-->
		<!--begin::Engage toolbar-->
		@include('partials.engage_toolbar')
		<!--end::Engage toolbar-->
		<!--begin::Scrolltop-->
		@include('partials.scroll_to_top')
		<!--end::Scrolltop-->
		<!--begin::Modals-->
		<!--begin::Modal - Upgrade plan-->
		@include('partials.upgrade_plane')
		<!--end::Modal - Upgrade plan-->
		<!--begin::Modal - Offer A Deal-->
		@include('partials.offer_a_deal')
		<!--end::Modal - Offer A Deal-->
		<!--begin::Modal - Create App-->
		@include('partials.create_app')
		<!--end::Modal - Create App-->
		<!--begin::Modal - Users Search-->
		@include('partials.users_search')
		<!--end::Modal - Users Search-->
		<!--begin::Modal - Invite Friends-->
		@include('partials.invite_friends')
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "/assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="/assets/js/custom/widgets.js"></script>
		<script src="/assets/js/custom/apps/chat/chat.js"></script>
		<script src="/assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="/assets/js/custom/modals/create-campaign.js"></script>
		<script src="/assets/js/custom/modals/create-app.js"></script>
		<script src="/assets/js/custom/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->

		<!--begin::Ajax-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<!--end::Ajax-->
		<!--begin::Page Custom Javascript-->
		@yield('script')
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>