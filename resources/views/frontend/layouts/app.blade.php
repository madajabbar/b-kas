<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Beli dan jual barang bekas berkualitas di BKASID.com. Temukan berbagai pilihan barang bekas terbaik untuk kebutuhan Anda.">
    <meta name="keywords" content="belanja barang bekas, jual barang bekas, barang bekas berkualitas, situs jual beli barang bekas">
    <meta name="author" content="BKASID">
    <meta name="robots" content="index, follow">
    <meta name="og:title" content="BKASID - Belanja Barang Bekas Berkualitas">
    <meta name="og:description" content="Beli dan jual barang bekas berkualitas di BKASID.com. Temukan berbagai pilihan barang bekas terbaik untuk kebutuhan Anda.">
    <meta name="og:image" content="{{ asset('frontend/Logo.png') }}">
    <meta name="og:url" content="https://www.bkasid.com/">
    <meta name="og:type" content="website">
    <meta name="og:locale" content="id_ID">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@bkasid">
    <meta name="twitter:title" content="BKASID - Belanja Barang Bekas Berkualitas">
    <meta name="twitter:description" content="Beli dan jual barang bekas berkualitas di BKASID.com. Temukan berbagai pilihan barang bekas terbaik untuk kebutuhan Anda.">
    <meta name="twitter:image" content="{{ asset('frontend/Logo.png') }}">
    <meta name="twitter:url" content="https://www.bkasid.com/">
    <link rel="canonical" href="https://www.bkasid.com/">
    <!-- SITE TITLE -->
    <title>BKAS</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/simple-line-icons.css') }}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    @yield('css')

</head>

<body>

    <!-- LOADER -->
    <div class="preloader" id="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Home Popup Section -->
    @include('frontend.layouts.util.popup')
    <!-- End Screen Load Popup Section -->

    <!-- START HEADER -->
    @include('frontend.layouts.navbar')
    <!-- END HEADER -->

    <!-- START SECTION BANNER -->
    @yield('banner')
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">
        @yield('content')
    </div>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    @include('frontend.layouts.footer')
    <!-- END FOOTER -->

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <!-- Latest jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <!-- popper min js -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}
    <!-- owl-carousel min js  -->
    <script src="{{ asset('frontend/assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- magnific-popup min js  -->
    <script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
    <!-- waypoints min js  -->
    <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
    <!-- parallax js  -->
    <script src="{{ asset('frontend/assets/js/parallax.js') }}"></script>
    <!-- countdown js  -->
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope min js -->
    <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
    <!-- jquery.dd.min js -->
    <script src="{{ asset('frontend/assets/js/jquery.dd.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <!-- elevatezoom js -->
    <script src="{{ asset('frontend/assets/js/jquery.elevatezoom.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.get('/api/category', function(data) {
                var categoryDropdown = $('#categoryDropdown');
                data.forEach(function(category) {
                    var form = $('<form>')
                        .attr('action', ' ') // Set your desired action URL here
                        .attr('method', 'GET');

                    var categoryInput = $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'category_id') // Use the appropriate input name
                        .val(category.slug); // Use the category ID or relevant identifier

                    var submitButton = $('<button>')
                        .addClass('dropdown-item menu-link')
                        .attr('type', 'submit')
                        .text(category.name);

                    form.append(categoryInput, submitButton);
                    var categoryItem = $('<li>').append(form);
                    categoryDropdown.append(categoryItem);
                });
            });
        });
    </script>
    @yield('js')
</body>

</html>
