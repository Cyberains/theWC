@extends('professional.layouts.main')
@section('title')
    <title>Dashboard</title>
@endsection
@section('style')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ URL::asset('public/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('public/dist/css/adminlte.min.css') }}">
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
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{$totalBookedServices}}</h3>
                                        <p>Total Services</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('professional.service-history') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $totalDoneServices }}</h3>
                                        <p>Completed Services</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ route('professional.service-done') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $totalTodayBookedServices }}</h3>
                                        <p>Today's Services</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('professional.service-pending') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $totalDoneServicesEarnings }}<sup style="font-size: 20px">₹</sup></h3>
                                        <p>Total Earning's</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h5 class="card-title">Monthly Recap Report</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-8">--}}
{{--                                                <p class="text-center">--}}
{{--                                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>--}}
{{--                                                </p>--}}
{{--                                                <div class="chart">--}}
{{--                                                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <p class="text-center">--}}
{{--                                                    <strong>Goal Completion</strong>--}}
{{--                                                </p>--}}
{{--                                                <div class="chart-responsive">--}}
{{--                                                    <canvas id="pieChart" height="150"></canvas>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-footer">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-3 col-6">--}}
{{--                                                <div class="description-block border-right">--}}
{{--                                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>--}}
{{--                                                    <h5 class="description-header">₹ 35,210.43</h5>--}}
{{--                                                    <span class="description-text">TOTAL REVENUE</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-3 col-6">--}}
{{--                                                <div class="description-block border-right">--}}
{{--                                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>--}}
{{--                                                    <h5 class="description-header">₹ 10,390.90</h5>--}}
{{--                                                    <span class="description-text">TOTAL COST</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-3 col-6">--}}
{{--                                                <div class="description-block border-right">--}}
{{--                                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>--}}
{{--                                                    <h5 class="description-header">₹ 24,813.53</h5>--}}
{{--                                                    <span class="description-text">TOTAL PROFIT</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-3 col-6">--}}
{{--                                                <div class="description-block">--}}
{{--                                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>--}}
{{--                                                    <h5 class="description-header">1200</h5>--}}
{{--                                                    <span class="description-text">GOAL COMPLETIONS</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Today's Service's</h3>
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Order ID</th>
                                                        <th>ClientName</th>
                                                        <th>Mobile No.</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Raised Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                    $sn = 1;
                                                ?>
                                                @foreach($bookedTodayServices as $bookedTodayService)
                                                    <tr>
                                                        <td>{{ $sn++ }}</td>
                                                        <td><a href="#">{{ $bookedTodayService->bookingId }}</a></td>
                                                        <td>{{ $bookedTodayService->user->name }}</td>
                                                        <td>{{ $bookedTodayService->user->mobile }}</td>
                                                        <td>{{ getServiceAmountByBookingId($bookedTodayService->bookingId) }} ₹</td>
                                                        <td>
                                                            @if($bookedTodayService->status == 'done')
                                                                <span class="badge badge-success">Done</span>
                                                            @elseif($bookedTodayService->status == 'pending')
                                                                <span class="badge badge-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td> {{ $bookedTodayService->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
@endsection
