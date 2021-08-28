@extends('frontend.layout.master')

@section('frontend-content')

<section id="about" class="about ">
    <div class="container">

        <div class="section-title">
            <h2>About Us</h2>
        </div>

        @foreach ($about as $row)

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                <img src="{{  asset('frontend/images/aboutImage/' .$row->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
               {!! $row->description !!}
                <br>
                <button class="seemore mt-3"><a href="">See More</a> </button>
            </div>
        </div>

        @endforeach

    </div>
</section>
    
@endsection