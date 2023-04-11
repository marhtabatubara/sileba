<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	@include('themes.auth.head')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body" style="background-image: url({{asset('images/bg.jpeg')}}); background-repeat:no-repeat;background-size:cover;background-repeat:no-repeat;width:100%;">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						{{$slot}}
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		@include('themes.auth.js')
		@yield('custom_js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>