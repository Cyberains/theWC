@section('styles')
<style>


</style>
@endsection




<section id="topbar" class="topbar d-flex align-items-center">
        <div class="container-fluid d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-none d-md-flex align-items-center float-left mr-auto">
                <i class="bi bi-envelope d-flex align-items-center p-2">
                    <a href="mailto:support@thewomenscompany.in">support@thewomenscompany.in</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                   <a href="tel:918860014004">(+91) 88-6001-4004</a>
                </i>
            </div>
            <div class="social-links d-md-flex align-items-center">
                @if(Auth()->check())
                    @if(Auth::user()->role=='Professional')
                        <a class="twitter p-2" href="{{ route('professional.dashboard') }}" style="color:#fff;">Dashboard</a>
                    @elseif(Auth::user()->role=='admin')
                        <a class="twitter p-2" href="{{ route('admin.dashboard') }}" style="color:#fff;">Dashboard</a>
                    @endif
                @else
                    <a class="twitter p-2" href="{{ route('login') }}" style="color:#fff;"><i class="bi bi-person"></i>>Login</a>
                @endif
                <a href="#" class="facebook" style="color:#fff;"><i class="bi bi-arrow-right-short"></i>Become a Professional</a>
            </div>
        </div>
    </section>
  <section class="header-area bg-section">
    <div class="navbar-area">
        <div class="container-fluid">
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
                            </ul>
                        </div>
                    </nav>
            </div>
        </div>
    </div>
</section>

