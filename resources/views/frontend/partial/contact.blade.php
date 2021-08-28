 <section id="contact" class="contact my-5">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Feel free to contact us</p>
            </div>

            @foreach ($footer as $row)

            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>{{ $row->address }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <a href="mailto:info@glamworlditltd.com">{{ $row->email }}</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <a href="tel:01972240525">
                            <p>+88 {{ $row->phone }}, +88 {{ $row->phone2 }}</p>
                        </a>
                    </div>
                </div>

            </div>

            @endforeach

            <d class="row" data-aos="fade-up">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://maps.google.com/maps?q=glamworldit&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>


                <div class="col-lg-6">

                    <form action="{{ route('order.store') }}" method="POST">

                        @csrf

                        <div class="form-row">

                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="text-center"><button class="btn btn-success" type="submit" name="submit">Send
                                Message</button></div>
                    </form>
                </div>

        </div>

        </div>
    </section>