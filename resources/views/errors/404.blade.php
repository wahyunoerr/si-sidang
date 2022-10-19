<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>Wah Kamu Salah Jalan</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('backend/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Error 500 -->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
					<!--begin::Logo-->
					<a href="../../demo8/dist/index.html" class="mb-10 pt-lg-10">
						<img alt="Logo" src="{{ asset('backend/media/logos/logo-umri.png')}}" class="h-200px mb-5" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-gray-800 mb-10">404</h1>
						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-3 text-muted mb-15">Tidak ditemukan
						<br />Silahkan coba lagi nanti ya!</div>
						<!--end::Message-->
						<!--begin::Action-->
						<div class="text-center">
							@if(Auth::check())
							<a href="{{ route('home') }}" class="btn btn-lg btn-primary fw-bolder">Kembali ke Beranda</a>
							@else
							<a href="{{ url('/') }}" class="btn btn-lg btn-primary fw-bolder">Kembali ke Beranda</a>
							@endif
						</div>
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Error 500-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('backend/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('backend/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
