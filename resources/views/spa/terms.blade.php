@extends("spa.main.master")
@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Terms Conditions</h2>
            <ul>
                <li>
                    <a href="index.php"> Home </a>
                </li>
                <li>Terms Conditions</li>
            </ul>
        </div>
    </div>
</div>
<section class="terms-conditions ptb-100">
    <div class="container">
        <div class="single-privacy">
            <h3 class="mt-0">{{$terms->heading}} </h3>
            <p> {!!$terms->description!!} </p>
        </div>
    </div>
</section>
@endsection