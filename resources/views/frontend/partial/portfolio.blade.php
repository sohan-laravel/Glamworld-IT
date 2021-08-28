<section id="portfolio" class="portfolio my-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>We believe in work not in word</p>
            </div>

            <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>

                @foreach ($category as $row)

                <li data-filter=".{{ $row->id }}">{{ $row->name }}</li>

                @endforeach

            </ul>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                 @foreach ($category as $row)

                @php
                    $products = App\Model\Product::where('category_id', $row->id)->where('status', 1)->latest()->get();
                @endphp

                @foreach ($products as $product)

                <div class="col-lg-4 col-md-6 portfolio-item {{ $row->id }}">
                    <div class="portfolio-img"><img src="{{  asset('frontend/images/productImage/' .$product->image_one) }}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $product->name }}</h4>
                        <p>{!! $product->description !!}</p>
                        <a href="{{  asset('frontend/images/productLinkImage/' .$product->image_two) }}" data-gall="portfolioGallery"
                            class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="{{ $product->link }}" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                   @endforeach
                @endforeach

               
            </div>

        </div>
    </section>