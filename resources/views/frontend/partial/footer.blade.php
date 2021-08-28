<footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3><img class="img-fluid" src="{{ asset('frontend/assets/img/glamworld-white.png') }}"> </h3>

                            @foreach ($footer as $row)

                            <p>{{ $row->address }}</p>

                            <a href="tel:01972240525">
                                <p><strong> Phone: </strong> +88 {{ $row->phone }} </p>
                            </a>

                            <a href="mailto:info@glamworlditltd.com">
                                <p><strong> Email:</strong> {{ $row->email }}</p>
                            </a>

                            @endforeach

                            <div class="social-links mt-3">
                                <a href="https://twitter.com/glamworldit" class="twitter"><i
                                        class="icofont-twitter"></i></a>
                                <a href="https://www.facebook.com/glamworldit" class="facebook"><i
                                        class="icofont-facebook"></i></a>
                                <a href="https://instagram.com/glamworldit?utm_medium=copy_link" class="instagram"><i
                                        class="icofont-instagram"></i></a>
                                <a href="https://wa.me/01879599465" class="google-plus"><i
                                        class="icofont-brand-whatsapp"></i></a>
                                <a href="https://bd.linkedin.com/company/glamworld-it-limtited" class="linkedin"><i
                                        class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Maintaining</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Digital Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">App Developement</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <form action="{{ route('subscribe.store') }}" method="post">

                            @csrf

                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>GlamwroldIT</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed & Developed by <a href="">Glamworld IT Limited</a>
            </div>
        </div>
    </footer>