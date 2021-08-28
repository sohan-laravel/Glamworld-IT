 <section id="hero" class="d-flex align-items-center mb-5">

        <div class="container">

            @foreach ($hero as $row)

            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>
                        {{ $row->name }}
                    </h1>
                    <h2>
                        {!! $row->description !!}
                    </h2>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        <a href="{{ $row->link }}" target="_blank" class="btn-watch-video"> Watch
                            Video <i class="icofont-play-alt-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{  asset('frontend/images/heroImage/' .$row->image) }}" class="img-fluid animated" alt="{{ $row->name }}">
                </div>
            </div>

            @endforeach

        </div>

    </section>