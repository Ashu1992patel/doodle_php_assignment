<!doctype html>
<html lang="en">
	
    @include('common.head')
	<body>

		<!-- Loading starts -->
		@include('common.loader')
		<!-- Loading ends -->

		<div class="container">


			<!-- *************
				************ Header section start *************
				************* -->


			<!-- Header start -->
			@include('common.header')
			<!-- Header end -->



			<!-- Navigation start -->
			@include('common.navigation')
			<!-- Navigation end -->


			<!-- *************
				************ Header section end *************
				************* -->

			<!-- *************
				************ Main container start *************
				************* -->
			<div class="main-container">

				<!-- Page header start -->
				
				<!-- Page header end -->


				<!-- Content wrapper start -->
               @yield('content')
				
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
				************* -->


		</div>

		<!-- *************
				************ Required JavaScript Files *************
			************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ url('assets/js/jquery.min.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ url('assets/js/nav.min.js') }}"></script>
		<script src="{{ url('assets/js/moment.js') }}"></script>


		<!-- *************
				************ Vendor Js Files *************
			************* -->
		<!-- Daterange -->
		<script src="{{ url('assets/vendor/daterange/daterange.js') }}"></script>

		<!-- Main Js Required -->
		<script src="{{ url('assets/js/main.js') }}"></script>

		<script src="{{ url('assets/js/toastr.min.js') }}"></script>

		@if(session()->has('success'))
		<script>
			$( document ).ready(function() {
				toastr.success("{{ session('success') }}", 'Passed', {
					timeOut: 5000,
					closeButton: true,
					closeEasing: 'swing',
					closeMethod: 'fadeOut',
					progressBar: true
					});
			});  
		</script>
		@endif

		@if(session()->has('error'))
		<script>
			$( document ).ready(function() {
				toastr.error("{{ session('error') }}", 'Try Again', {
					timeOut: 5000,
					closeButton: true,
					closeEasing: 'swing',
					closeMethod: 'fadeOut',
					progressBar: true
				});
			});
		</script>
		<script>
			$(function(){
				$('div.alert').not('.alert-important').delay(3000).slideUp(300);
			})
		</script>
		@endif
		@yield('jsscripts')
	</body>

</html>