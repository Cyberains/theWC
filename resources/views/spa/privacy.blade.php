@extends("spa.main.master")
@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Privacy Policy</h2>
            <ul>
                <li>
                    <a href="index.php">
                        Home
                    </a>
                </li>
                <li>Privacy Policy</li>

            </ul>
        </div>
    </div>
</div>
<section class="terms-conditions ptb-100">
    <div class="container">
        <div class="single-privacy">
            <h3 class="mt-0">{{$privacy_policy->heading}} </h3>
            <p> {!!$privacy_policy->description!!} </p>
        </div>
    </div>
</section>
@endsection