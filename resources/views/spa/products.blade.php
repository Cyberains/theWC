@extends("spa.main.master")
@section('content')

<section class="offer-area offer-area-two pt-100 pb-70 " id="service_section" style="background-color: #f8f8f8;">
    <div class="container">
        <div class="section-title">
            <h2>Our Professionals Services For You</h2>
        </div>
        <div class="row service_load">
            <div class="col-sm-6">
                <ul class="list-group">
                    @if($categories->isNotEmpty())
                    @foreach($categories as $item)
                    <li class="list-group-item"><a href="{{route('spa.services.products',['category_id'=>$item->id,'brand_id'=>$item->brand_id])}}">{{$item->title}}</a></li>
                    @if(!empty($item->subCategoryName))
                    <ul class="list-group">
                        @foreach($item->subCategoryName as $row)
                        <li class="list-group-item"><a href="{{route('spa.services.products',['category_id'=>$item->id,'brand_id'=>$item->brand_id,'sub_cat_id'=>$row->id])}}">{{$row->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-sm-6">
                @if($products->isNotEmpty())
                @foreach($products as $item)
                <div class="card  mb-3">
                    <div class="card-header">{{$item->title}}</div>
                    <div class="card-body">
                        <span><b>MRP::</b> {{$item->price}}</span><br>
                        <span><b>Discount::</b>{{$item->discount_percentage}}%</span><br>
                        <span><b>Discount Amt::</b>{{$item->discount_amt}}</span><br>
                        <span><b>Service Duration::</b>{{$item->time_in_min}}</span>
                        @if($item->productFetaure->isNotEmpty())
                        @foreach($item->productFetaure as $feature)
                        <li class="card-text" style="list-style: none;">

                            <span>{{$feature->name}}</span>
                        </li>
                        @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <img src="{{asset('public/assets/spa/images/client/Product-Search-Not-Found-1.jpeg')}}">
                @endif
            </div>
        </div>
    </div>
</section>
@endsection