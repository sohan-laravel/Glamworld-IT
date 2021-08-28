<section id="services" class="services my-5">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p>Your dream come true by taking our smart solution</p>
            </div>

             
            <div class="row">
                @foreach ($service as $row)
                    <div class="col-lg-4 mb-4 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="#">{{ $row->name }}</a></h4>
                            <p>{!! $row->description !!}</p>
                        </div>
                </div>

                @endforeach

            </div>

        </div>
    </section>