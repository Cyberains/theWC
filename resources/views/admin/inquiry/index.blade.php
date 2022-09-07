@extends('admin.includes.main')
@section('title')

<title>Inquiry</title>

@endsection

@section('btitle')
<li class="breadcrumb-item">Inquiry</li>
@endsection

@section('btitle1')

<li class="breadcrumb-item">Inquiry</li>

@endsection

@section('style')

<style type="text/css">
  .table-status {

    width: 150px;
  }

  .table .active-color {

    color: darkgreen;
    font-weight: 600;
  }

  .table .inactive-color {
    color: maroon;
    font-weight: 600;
  }

  .table .fa-toggle-on {

    color: darkgreen;
  }
</style>
@endsection

@section('body')

<div class="container-fluid">
  <div class="row bg-white mx-0 py-3 mt-2">
    <div class="col-md-12">
      <table class="table table-responsive-sm table-bordered" id="table-id">
        <thead>
          <tr class="table-primary">
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Subject</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contact as $customer)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->subject }} </td>
            <td>{{ $customer->message }} </td>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.row-->
</div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection