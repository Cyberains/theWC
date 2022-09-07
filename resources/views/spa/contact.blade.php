@extends("spa.main.master")
@section('content')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Contact Us</h2>
            <ul>
                <li>
                    <a href="index.php">
                        Home
                    </a>
                </li>
                <li>Contact</li>

            </ul>
        </div>
    </div>
</div>
<section class="main-contact-area contact-info-area contact-info-three pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Contact Us</span>
            <h2>Drop us a message for any query</h2>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-wrap contact-pages mb-0">
                    <div class="contact-form contact-form-mb">
                        <p class="alert message_box"></p>
                        <form id="contactForm" novalidate="true">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control textarea-hight" id="message" cols="30" rows="4" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="button" id="senMsg" class="default-btn btn-two disabled" style="pointer-events: all; cursor: pointer;">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us:</h3>
                            <a href="mailto:hello@arduix.com">hello@earlybasket.com</a>
                            <a href="mailto:info@arduix.com">info@arduix.com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us:</h3>
                            <a href="tel:+91 9643824343">+91 9643-82-4343</a>
                            <a href="tel:+0124-427-8955">0124-427-8955</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-location-plus"></i>
                            <h3>Udyog Vihar</h3>
                            <a href="#">Apolis Building,Plot no 736, LGF
                                Udyog Vihar Phase V ,Sector 19,
                                Gurugram, Haryana 122008 (India)</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-support"></i>
                            <h3>Live Chat</h3>
                            <a href="#">live chat all the time with our company 24/7</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).on('click', '#senMsg', function(e) {
        e.preventDefault();
        let btn = $(this);
        let loader = $('.message_box');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('spa.contact.create') }}",
            data: new FormData($('#contactForm')[0]),
            processData: false,
            contentType: false,
            beforeSend: () => {
                btn.attr('disabled', true);
                loader.html(`{!! transLang('loader_message') !!}`).removeClass('alert alert-success').addClass('alert-info');
            },
            error: (jqXHR, exception) => {
                btn.attr('disabled', false);
                loader.html(formatErrorMessage(jqXHR, exception)).removeClass('alert-info').addClass('alert-danger');
            },
            success: response => {
                btn.attr('disabled', false);
                loader.html(response.message).removeClass('alert-info').addClass('alert-success');
                location.reload(true);
            }
        });
    });
</script>
@endsection