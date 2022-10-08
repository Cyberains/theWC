@section('styles')
<style>

</style>
@endsection




  <section class="header-area bg-section">
    <div class="navbar-area">
        <div class="container-fluid">
               <div class="row">
                        <ul class="top_header ml-auto">
                          <li><a href="#" class="active">Login</a></li>
                           <li><a href="#" class="">Register</a></li>
                        </ul>
                      </div>
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img class="logo_img" src="{{ url('public/assets/spa/images/img/800x300-done2.png') }}" alt="Logo">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                     
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="/">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#about">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#testimonial">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#how-it-works">OUR PROCESS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#contact">CONTACT</a>
                                </li>
                                <li class="nav-item">
                                    @if(Auth()->check())
                                        @if(Auth::user()->role=='Professional')
                                            <a class="page-scroll" href="{{ route('professional.dashboard') }}">Dashboard</a>
                                        @elseif(Auth::user()->role=='admin')
                                            <a class="page-scroll" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        @endif
                                    @else
                                        <a class="page-scroll" href="{{ route('login') }}">Login</a>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </nav> 
            </div> 
        </div> 
    </div> 
</section>  

