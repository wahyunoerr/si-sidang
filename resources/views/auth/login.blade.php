@include('backend.head')
<body id="kt_body" class="bg-dark">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url('backend/media/illustrations/dozzy-1/14-dark.png')">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
							@csrf
                            <!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
                                <img src="{{ asset('backend/media/logos/logo-umri.png')}}" class="h-200px mb-5" alt="">
								<h1 class="text-dark mb-3">Silahkan Masuk Untuk Melanjutkan</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Belum Punya Akun?
								<a href="{{ route('register') }}" class="link-primary fw-bolder">Buat Akun</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">NIM</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input id="email" type="email" class="form-control form-control-lg form-control-solid  @error('username') is-invalid @enderror" name="username" value="{{ old('usesrname') }}" required autocomplete="username" autofocus/>
                                 @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
									<!--end::Label-->
									<!--begin::Link-->
									<a href="../../demo3/dist/authentication/flows/dark/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input id="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password"  required autocomplete="current-password" />
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
