<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Women's Company | Invoice</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{ URL::asset('public/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{ URL::asset('public/dist/css/adminlte.min.css?v=3.2.0')}}">
<!-- custom design -->
<style>
    .lead {
        font-weight: 500!important;
    }
    .table thead th {
    color: #904795;
    }
    .invoice {
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 0.4rem;
    }
    .pay{
        cursor: pointer;
    }
</style>
</head>
<body>
<section class="content" style="background: #f3aece;background-size: cover;background-position: center; background-image: url(public/assets/spa/images/img/card_icon/invoice_bg2.png);">
    <div class="container">
      <form action="" method="">
        <div class="row">
            <div class="col-12 my-5">
              <!--   <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>
 -->
                <div class="invoice p-3 mb-3">

                    <div class="row">
                        <div class="col-12">
                         <h4 style="color:#904795;font-size: 1.2rem;font-family: inherit;font-weight: 600;">
                            <img class="logo_img" src="public/assets/spa/images/img/favicon_twc.png" alt="Logo"> The Women's Company
                            <small class="float-right">Date: 19/10/2022</small>
                        </h4>
                    </div>

                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Address</strong><br>
                                Apolis Building,Plot no 736,<br>
                                LGF Udyog Vihar Phase V,Sector<br>
                                19,Gurugram, HR 122008 (India)<br>
                                Phone: (+91) 88-6001-4004<br>
                                Email: support@thewomenscompany.in
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>Epic Corporations</strong><br>
                                F-256 , 1st Floor , B-Block , Ansal API ,<br>
                                
                                 Palam Corporate Plaza, Palam Vihar<br>
                                Gurgaon (HR), 122017 <br>
                                Phone: 0124-427-8955<br>
                                Email: Contactus@epiccorporations.com
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/10/2022<br>
                            <b>Account:</b> 968-34567
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Call of Duty</td>
                                        <td>455-981-221</td>
                                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>
                                        <td>$64.50</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Need for Speed IV</td>
                                        <td>247-925-726</td>
                                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>
                                        <td>$50.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Monsters DVD</td>
                                        <td>735-845-642</td>
                                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>
                                        <td>$10.70</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Grown Ups Blue Ray</td>
                                        <td>422-568-642</td>
                                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>
                                        <td>$25.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">
                            <p class="lead">Payment Methods:</p>
                            <img class="pay" src="public/assets/spa/images/img/card_icon/vish.png" alt="Visa">
                            <img class="pay" src="public/assets/spa/images/img/card_icon/master-card.png" alt="Mastercard">
                            <img class="pay" src="public/assets/spa/images/img/card_icon/paypal.png" alt="Paypal">
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>

                        <div class="col-6">
                            <!-- <p class="lead">Amount Due 20/10/2022</p> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody><tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                    </div>


                    <div class="row no-print">
                        <div class="col-12">
                            <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </form>
    </div>
</section>
</body>
</html>