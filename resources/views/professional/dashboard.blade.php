@extends('professional.layouts.main')
@section('title')
    <title>Dashboard</title>
@endsection

@section('btitle')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('style')
    <style type="text/css">
        .table .active-color {
            color: darkgreen;
            font-weight: 600;
        }
        .table .inactive-color {
            color: maroon;
            font-weight: 600;
        }
    </style>
@endsection

@section('body')

    <div class="pl-md-5">
        <button type="button" id="days" class="btn btn-outline-success">Days</button>
        <button type="button" id="months" class="btn btn-outline-primary">Months</button>
        <button type="button" id="years" class="btn btn-outline-secondary">Years</button>
    </div>

    <canvas id="months-graph" width="500px" height="100px"></canvas>

    <canvas id="days-graph" width="500px" height="100px"></canvas>

    <canvas id="years-graph" width="500px" height="100px"></canvas>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        let token = $('meta[name="csrf-token"]').attr('content');

        //  Month
        $.ajax({
            url:"{{ route('professional.bookings-info') }}",
            method:'GET',
            data:{ _token:token },
            success:function(data){
                const dataa = {
                    labels: data['labels'],
                    datasets: [{
                        label: 'Earned Amount',
                        backgroundColor: 'rgb(106,73,80)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: data['data'],
                    }]
                };
                const config = {
                    type: 'bar',
                    data: dataa,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Monthly Based Earnings',
                                color: 'blue',
                                font: {
                                    size: 22,
                                    family: 'tahoma',
                                    weight: 'normal',
                                    style: 'italic'
                                },
                            },
                        }
                    }
                };
                const myChart = new Chart(
                    document.getElementById('months-graph'),
                    config
                );
            }
        });

        // Day
        $.ajax({
            url:"{{ route('professional.bookings-days') }}",
            method:'GET',
            data:{ _token:token },
            success:function(data){
                console.log('aaaaaaaaaaaaaaaaaaaaaa');
                console.log(data);
                const dataa = {
                    labels: data['labels'],
                    datasets: [{
                        label: 'Earned Amount',
                        backgroundColor: 'rgb(106,73,80)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: data['data'],
                    }]
                };
                const config = {
                    type: 'line',
                    data: dataa,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Days Based Earnings',
                                color: 'green',
                                font: {
                                    size: 22,
                                    family: 'tahoma',
                                    weight: 'normal',
                                    style: 'italic'
                                },
                            },
                        }
                    }
                };
                const myChart = new Chart(
                    document.getElementById('days-graph'),
                    config
                );
            }
        });

        $.ajax({
            url:"{{ route('professional.bookings-info') }}",
            method:'GET',
            data:{ _token:token },
            success:function(data){
                const dataa = {
                    labels: data['labels'],
                    datasets: [{
                        label: 'Earned Amount',
                        backgroundColor: 'rgb(106,73,80)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: data['data'],
                    }]
                };
                const config = {
                    type: 'line',
                    data: dataa,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Year Based Earnings',
                                color: 'pink',
                                font: {
                                    size: 22,
                                    family: 'tahoma',
                                    weight: 'normal',
                                    style: 'italic'
                                },
                            },
                        }
                    }
                };
                const myChart = new Chart(
                    document.getElementById('years-graph'),
                    config
                );
            }
        });
    </script>
@endsection

@section('script')
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script>
        $("#days").onclick(function(){
            console.log('daysssssssssssssss');
            $("#days-graph").show();
            $("#months-graph").hide();
            $("#years-graph").hide();
        });

        $("#months").onclick(function(){
            $("#months-graph").show();
            $("#days-graph").hide();
            $("#years-graph").hide();
        });

        $("#years").onclick(function(){
            $("#years-graph").show();
            $("#days-graph").hide();
            $("#months-graph").hide();
        });
    </script>
@endsection
