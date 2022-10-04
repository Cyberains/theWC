@extends('admin.includes.main')
@section('title')
    <title>Lead | Lead Management</title>
@endsection
@section('body')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Working Location</th>
                            <th>Gender</th>
                            <th>Professional Qualification</th>
                            <th>Total Work Experience</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        @if(!empty($mails))
                            <h2>Today's</h2>
                            @foreach ($mails['today'] as $mail)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $mail->name }}</td>
                                    <td>{{ $mail->phone }}</td>
                                    <td>{{ $mail->email }}</td>
                                    <td>{{ $mail->work_location }}</td>
                                    <td>{{ $mail->m_f == 0 ? 'Female' : 'Male'}}</td>
                                    <td>{{ $mail->professional_qualification }}</td>
                                    <td>{{ $mail->total_work_experience }}</td>
                                    <td>{{ $mail->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Working Location</th>
                            <th>Gender</th>
                            <th>Professional Qualification</th>
                            <th>Total Work Experience</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        @if(!empty($mails))
                            <h2>Past's</h2>
                            @foreach ($mails['past'] as $mail)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $mail->name }}</td>
                                    <td>{{ $mail->phone }}</td>
                                    <td>{{ $mail->email }}</td>
                                    <td>{{ $mail->work_location }}</td>
                                    <td>{{ $mail->m_f == 0 ? 'Female' : 'Male'}}</td>
                                    <td>{{ $mail->professional_qualification }}</td>
                                    <td>{{ $mail->total_work_experience }}</td>
                                    <td>{{ $mail->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
