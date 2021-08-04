<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BorangKuy</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="argon-login/img/brand/favicon.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="atlantis-dashboard/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['atlantis-dashboard/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="atlantis-dashboard/css/bootstrap.min.css">
	<link rel="stylesheet" href="atlantis-dashboard/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="atlantis-dashboard/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="{{ route('dosen-index') }}" class="logo text-white">
					<img src="argon-login/img/brand/favicon.png" alt="navbar brand" class="navbar-brand">
                    BorangKuy
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			@include('dosen.template.navbar')
		</div>

		<!-- Sidebar -->
        @include('dosen.template.sidebar')
		<!-- End Sidebar -->

		@yield('content')

	</div>
	<!--   Core JS Files   -->
	<script src="atlantis-dashboard/js/core/jquery.3.2.1.min.js"></script>
	<script src="atlantis-dashboard/js/core/popper.min.js"></script>
	<script src="atlantis-dashboard/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="atlantis-dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="atlantis-dashboard/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="atlantis-dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="atlantis-dashboard/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="atlantis-dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="atlantis-dashboard/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="atlantis-dashboard/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="atlantis-dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="atlantis-dashboard/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="atlantis-dashboard/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="atlantis-dashboard/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="atlantis-dashboard/js/atlantis.min.js"></script>

</body>
</html>
