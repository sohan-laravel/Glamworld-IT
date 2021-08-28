<section id="cta" class="cta mb-4">
        <div class="container" data-aos="zoom-in">

            <div class="row">

                @foreach ($cta as $row)

                <div class="col-lg-9 text-center text-lg-left">
                    <h3>{{ $row->name }}</h3>
                    <p> {!! $row->description !!}</p>
                </div>

                @endforeach

                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="tel:01972240525">Call To Action</a>
                </div>
            </div>

        </div>
    </section>