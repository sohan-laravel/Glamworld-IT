<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top ">
        <div class="container d-flex">

            @foreach ($footer as $row)

            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:info@glamworlditltd.com">{{ $row->email }}</a>
                <i class="icofont-phone"></i> <a href="tel:01972240525"> {{ $row->phone }}</a>
            </div>

            @endforeach

            <div class="social-links">
                <a href="https://twitter.com/glamworldit" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/glamworldit" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://instagram.com/glamworldit?utm_medium=copy_link" class="instagram"><i
                        class="icofont-instagram"></i></a>
                <a href="https://wa.me/01879599465" class="skype"><i class="icofont-brand-whatsapp"></i></a>
                <a href="https://bd.linkedin.com/company/glamworld-it-limtited" class="linkedin"><i
                        class="icofont-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/img/glamworld-white.png') }}"></a></h1>


            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="team.html">Team</a></li>
                    <li class="drop-down"><a href="">IT Services</a>
                        <ul>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Domain & Hosting</a></li>
                            <li><a href="#">Business Development</a></li>
                            <li><a href="#">IT Maintaining</a></li>
                            <li class="drop-down"><a href="#">IT Training</a>
                                <ul>
                                    <li><a href="#">Web Developement</a></li>
                                    <li><a href="#">Networking</a></li>
                                    <li><a href="#">Web Desinging</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="career.php">Career</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header>