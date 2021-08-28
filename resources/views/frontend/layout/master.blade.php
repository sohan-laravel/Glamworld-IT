<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Glamworld IT-Your Trusted IT Partner</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('frontend.partial.style')


</head>

<body>

    <!-- ======= Top Bar ======= -->

	@include('frontend.partial.header')

    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

	@include('frontend.partial.hero')

    <!-- End Hero -->

    <!-- ======= About Us Section ======= -->

	@yield('frontend-content')
    
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->

	@include('frontend.partial.service')
    
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    
	@include('frontend.partial.cta')

    <!-- End Cta Section -->


    <!-- ======= Portfolio Section ======= -->
    
	@include('frontend.partial.portfolio')

    <!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->

	@include('frontend.partial.contact')
   
    <!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    
	@include('frontend.partial.footer')

    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>


    <!-- Vendor JS Files -->
   
	@include('frontend.partial.scripts')

</body>

</html>