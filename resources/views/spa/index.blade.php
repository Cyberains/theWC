@extends("spa.main.master")
@section('content')
<section class="mt-5">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @if($banners->count())
            @foreach($banners as $key=>$item)
            <div class="item {{$key==0?'active':''}}">
                <img src="{{imageBasePath($item->image)}}" alt="Los Angeles" style="width:100%; height:500px">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>LA is always so much fun!</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="py-2" style="background: #395098;">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <form id="search-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="row no-gutters">
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-auto ">
                                        <select class="form-control select2" id="exampleFormControlSelect1">
                                            <option value=""></option>
                                            @if($city->count())
                                            @foreach($city as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                        <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                        <button type="submit" class="btn btn-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start What We Offer Area -->
<section class="offer-area offer-area-two pt-100 pb-70 " id="service_section" style="background-color: #f8f8f8;">
    <div class="container">
        <div class="section-title">
            <h2>Our Professionals Services For You</h2>
        </div>
        <div class="row service_load">
            @if($service->count())
            @foreach($service as $item)
            <div class="col-lg-3 col-sm-3 text-center ">
                <div class="single-offer">
                    <a href="{{route('spa.services.category',$item->id)}}">
                        <img src="{{asset('public/images/brand/'.$item->image)}}" height="60" width="60" style="border-radius:100%">
                        <h3>{{$item->title}}</h3>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="offer-shape">
        <img src="{{asset('public/assets/spa/images/shape/1.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/2.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/3.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/4.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/5.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/5.png')}}" alt="Image">
        <img src="{{asset('public/assets/spa/images/shape/6.png')}}" alt="Image">
    </div>
</section>

<section class="news-area pt-100 pb-70 mt-10">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Us</h2>
        </div>
        <div class="row">
            @if($whychoous->count())
            @foreach($whychoous as $item)
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-news">
                    <div class="blog-img">
                        <a href="news-details.html">
                            <img src="{{imageBasePath($item->image)}}" alt="Image">
                        </a>
                        <div class="dates">
                            <span>{{date_format($item->created_at,"Y-M")}}</span>
                        </div>
                    </div>
                    <div class="news-content-wrap">

                        <a href="news-details.html">
                            <h3>{{$item->heading}} </h3>
                        </a>
                        <p> {{$item->description}}</p>
                        <a class="read-more" href="news-details.html"> Read More
                            <i class="bx bx-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <img src="{{imageBasePath('59938652127799855191657019584.jpeg')}}" style="height:300px;width:100%">
    </div>
</section>
<!-- End What We Offer Area -->
<!-- End Case Area -->
<section class="case-area case-area-five pb-100">
    <div class="container">
        <div class="section-title">
            <h2>Beuty</h2>
        </div>
        <div class="row text-center">
            @if($category->isNotEmpty())
            @foreach($category as $item)
            <div class="col-sm-3">
                <img src="{{ asset('public/images/category/'.$item->image) }}" alt="Image" style="height:100px">
                <a class="link-icon" href="#"><i class="bx bx-plus"></i></a>
                <h3>
                    <a href="{{route('spa.services.products',['category_id'=>$item->id])}}">
                        {{$item->title}}
                    </a>
                </h3>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Case Area -->
<section class="offer-area-two pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="app_left_cont">
                    <h2>Download via SMS</h2>
                    <p>Get a link via SMS to install the app. Fill your number down here.</p>
                    <div class="get_app_form">
                        <span class="country_code">+91</span>
                        <input type="number" maxlength="10" value="">
                        <button class="btn btn-danger" disabled="">Send</button>
                    </div>

                    <div class="download_app">
                        <a href="https://play.google.com/store/apps/details?id=yesmadamservices.app.com.yesmadamservices&amp;hl=en?utm_source=yesmadam-website" class="google_play" target="_blank">
                            <img src="{{asset('public/assets/spa/images/goggle.png')}}" alt="" loading="lazy"></a>
                        <a href="https://apps.apple.com/in/app/yesmadam-at-home-salon/id1352802457" class="apple_play" target="_blank">
                            <img src="{{asset('public/assets/spa/images/app.svg')}}" alt="" loading="lazy"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="{{imageBasePath('90912837840048096901657019502.jpeg')}}" alt="yesmadam" loading="lazy">
            </div>
        </div>
    </div>
</section>
<!-- Start FAQ Area -->

<section class="faq-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>FAQ,s</span>
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <ul class="accordion">

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Research Is What Makes An Effective Business Plan?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                How Achieving Small Business Success?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Why Business Planing Is Important?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                How Do You Startup?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Research Is What Makes An Effective Business Plan?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                How Achieving Small Business Success?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Why Business Planing Is Important?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                How Do You Startup?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem, ipsum dolor sit amet How do you Startup? consectetur adipisicing elit. Accusamus ipsa error, excepturi, obcaecati aliquid veniam blanditiis quas voluptates maxime unde, iste minima repellat dolores dolor perferendis facilis. How do you Startup? dolores ipsum dolor sit amet How do you Startup.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $('.select2').select2({
        placeholder: "select"
    });
    $(document).on('change', '#exampleFormControlSelect1', function(e) {
        e.preventDefault();
        var city_id = $(this).val();
        let loader = $('.message_box');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{ route('spa.services.city')}}" + '/' + city_id,
            processData: false,
            contentType: false,
            beforeSend: () => {
                loader.html(`{!! transLang('loader_message') !!}`).removeClass('alert alert-success').addClass('alert-info');
            },
            error: (jqXHR, exception) => {
                loader.html(formatErrorMessage(jqXHR, exception)).removeClass('alert-info').addClass('alert-danger');
            },
            success: response => {
                var html = '';
                $.each(response, function(index, item) {
                    html += `<div class="col-lg-3 col-sm-3 text-center ">
                <div class="single-offer">
                    <a href="{{route('spa.services.category')}}` + "/" + item.id + `">
                    <img src="public/images/brand/` + item.image + `" height="60" width="60" style="border-radius:100%">
                        <h3>` + item.title + `</h3>
                        
                    </a>
                </div>
            </div>`;
                });
                $('#service_section .service_load').html(html);
            }
        });
    });
</script>
@endsection
</body>

</html>