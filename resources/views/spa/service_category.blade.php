@extends("spa.main.master")
@section('content')

<section class="offer-area offer-area-two pt-100 pb-70 " id="service_section" style="background-color: #f8f8f8;">
    <div class="container">
        <div class="section-title">
            <h2>Our Professionals Services For You</h2>
        </div>
        <div class="row service_load">
            @if($serviceCategory->count())
            @foreach($serviceCategory as $item)
            <div class="col-lg-3 col-sm-3 text-center ">
                <div class="single-offer">
                    <a href="{{route('spa.services.products',['category_id'=>$item->id,'brand_id'=>$item->brand_id])}}">
                        <img src="{{asset('public/images/category/'.$item->image)}}" height="60" width="60" style="border-radius:100%">
                        <h3>{{$item->title}}</h3>
                        <p>{!!$item->description!!}</p>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection