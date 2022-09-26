@extends('professional.layouts.main')
@section('title')
    <title>Dashboard</title>
@endsection

{{--@section('btitle')--}}
{{--    <li class="breadcrumb-item">The Women's Company</li>--}}
{{--@endsection--}}

@section('style')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
    <style>
        [class*=sidebar-dark-] {
            background-color: #924795!important;
        }
        .navbar-brand {
            text-align: center;
        }
        .nav-link .active{
            background-color: #924795!important;
        }
        .nav-pills .nav-link {
            color: #fff!important;
        }
    </style>
@endsection

@section('body')
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="">
            <div class="content">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                        <p>Bounce Rate</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>44</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>65</h3>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Monthly Recap Report</h5>


                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-center">
                                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                                </p>

                                                <div class="chart">
                                                    <!-- Sales Chart Canvas -->
                                                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                                </div>
                                                <!-- /.chart-responsive -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-4">
                                                <p class="text-center">
                                                    <strong>Goal Completion</strong>
                                                </p>

                                                <div class="progress-group">
                                                    Add Products to Cart
                                                    <span class="float-right"><b>160</b>/200</span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                                    </div>
                                                </div>
                                                <!-- /.progress-group -->

                                                <div class="progress-group">
                                                    Complete Purchase
                                                    <span class="float-right"><b>310</b>/400</span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                                                    </div>
                                                </div>

                                                <!-- /.progress-group -->
                                                <div class="progress-group">
                                                    <span class="progress-text">Visit Premium Page</span>
                                                    <span class="float-right"><b>480</b>/800</span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                                    </div>
                                                </div>

                                                <!-- /.progress-group -->
                                                <div class="progress-group">
                                                    Send Inquiries
                                                    <span class="float-right"><b>250</b>/500</span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                    </div>
                                                </div>
                                                <!-- /.progress-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- ./card-body -->
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block border-right">
                                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                                    <h5 class="description-header">$35,210.43</h5>
                                                    <span class="description-text">TOTAL REVENUE</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block border-right">
                                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                                    <h5 class="description-header">$10,390.90</h5>
                                                    <span class="description-text">TOTAL COST</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block border-right">
                                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                                    <h5 class="description-header">$24,813.53</h5>
                                                    <span class="description-text">TOTAL PROFIT</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                                    <h5 class="description-header">1200</h5>
                                                    <span class="description-text">GOAL COMPLETIONS</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-8">
                                <!-- MAP & BOX PANE -->

                                <!-- /.card -->
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-6">
                                        <!-- USERS LIST -->

                                        <!--/.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Latest Orders</h3>


                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Popularity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="badge badge-danger">Delivered</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-info">Processing</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="badge badge-danger">Delivered</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Browser Usage</h3>


                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="chart-responsive">
                                                    <canvas id="pieChart" height="150"></canvas>
                                                </div>
                                                <!-- ./chart-responsive -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-4">
                                                <ul class="chart-legend clearfix">
                                                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                                    <li><i class="far fa-circle text-success"></i> IE</li>
                                                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                    <li><i class="far fa-circle text-info"></i> Safari</li>
                                                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer p-0">
                                        <ul class="nav nav-pills flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    United States of America
                                                    <span class="float-right text-danger">
                                  <i class="fas fa-arrow-down text-sm"></i>
                                12%</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    India
                                                    <span class="float-right text-success">
                                  <i class="fas fa-arrow-up text-sm"></i> 4%
                                </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    China
                                                    <span class="float-right text-warning">
                                  <i class="fas fa-arrow-left text-sm"></i> 0%
                                </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.footer -->
                                </div></div>
                            </div>
                        </div>
                                <!-- /.card -->
                                <!-- PRODUCT LIST -->
                </section>
                <!-- /.content -->
            </div><!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
    </body>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="../public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../public/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../public/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../public/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../public/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../public/plugins/moment/moment.min.js"></script>
    <script src="../public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../public/dist/js/demo.js"></script>
    <script src="public/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../public/dist/js/pages/dashboard2.js"></script>
@endsection
