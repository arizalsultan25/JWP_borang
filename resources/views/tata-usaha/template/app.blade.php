<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>BorangKuy</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="{{ asset('argon-login/img/brand/favicon.png') }}" type="image/x-icon"/>

        <!-- Fonts and icons -->
        <script src="{{ asset('atlantis-dashboard/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('atlantis-dashboard/css/fonts.min.css') }}"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('atlantis-dashboard/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('atlantis-dashboard/css/atlantis.min.css') }}">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('atlantis-dashboard/css/demo.css') }}">

        {{-- SummerNote --}}
          <link rel="stylesheet" href="{{ asset('argon-login/vendor/summernote/summernote-bs4.min.css') }}">

          {{-- Sweet alert --}}
          <link rel="stylesheet" href="{{ asset('argon-login/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    </head>
<body data-background-color="bg3">
	<div class="wrapper">

        @include('tata-usaha.template.navbar')

		<!-- Sidebar -->
        @include('tata-usaha.template.sidebar', [
            'active' => $active
        ])
		<!-- End Sidebar -->

		@yield('content')

	</div>
<!--   Core JS Files   -->
<script src="{{ asset('atlantis-dashboard/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('atlantis-dashboard/js/core/popper.min.js') }}"></script>
<script src="{{ asset('atlantis-dashboard/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('atlantis-dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('atlantis-dashboard/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('atlantis-dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


<!-- Chart JS -->
<script src="{{ asset('atlantis-dashboard/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('atlantis-dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('atlantis-dashboard/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('atlantis-dashboard/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('atlantis-dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('atlantis-dashboard/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('atlantis-dashboard/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

{{-- Sweet Alert 2 --}}
<script src="{{ asset('argon-login/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('atlantis-dashboard/js/atlantis.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('argon-login/vendor/summernote/summernote-bs4.min.js') }}"></script>

{{-- Dashboard --}}
<script>
    Circles.create({
        id:'circles-1',
        radius:45,
        value:60,
        maxValue:100,
        width:7,
        text: 5,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value:70,
        maxValue:100,
        width:7,
        text: 36,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:40,
        maxValue:100,
        width:7,
        text: 12,
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets : [{
                label: "Total Income",
                backgroundColor: '#ff9e27',
                borderColor: 'rgb(23, 125, 255)',
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }],
                xAxes : [ {
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>

{{-- Datatable --}}
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            responsive: 'true'
        });

    })
</script>

{{-- Summernote --}}
<script>
    $(function () {
        $('.summernote').summernote()
    })
</script>

{{-- Sweetalert2 flash data --}}
@if (session('success'))
<script>
Swal.fire(
    'Success!',
    "{{ session('success') }}",
    'success'
)
</script>
@endif
</body>
</html>
