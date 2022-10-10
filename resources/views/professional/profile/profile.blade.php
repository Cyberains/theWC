@extends('professional.layouts.main')
@section('title')
    <title>Profile</title>
@endsection

@section('btitle')
    <li class="breadcrumb-item">Profile</li>
@endsection

@section('style')
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
        /* .nav-pills .nav-link {
            color: #fff!important;
        } */
        /*add profile*/

        .heading {
            font-size: 25px;
            margin-right: 25px;
        }

        .fa {
            font-size: 25px;
        }

        .checked {
            color: orange;
        }

        /* Three column layout */
        .side {
            float: left;
            width: 15%;
            margin-top:10px;
        }

        .middle {
            margin-top:10px;
            float: left;
            width: 70%;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Individual bars */
        .bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
        .bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
        .bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
        .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
        .bar-1 {width: 15%; height: 18px; background-color: #f44336;}

        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {
            .side, .middle {
                width: 100%;
            }
            .right {
                display: none;
            }
        }

        .profile-pic {
            color: transparent;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }
        .profile-pic input {
            display: none;
        }
        .profile-pic img {
            position: absolute;
            object-fit: cover;
            width: 165px;
            height: 165px;
            box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
            border-radius: 100px;
            z-index: 0;
        }
        .profile-pic .-label {
            cursor: pointer;
            height: 165px;
            width: 165px;
        }
        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10000;
            color: #fafafa;
            transition: background-color 0.2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0;
        }
        .profile-pic span {
            display: inline-flex;
            padding: 0.2em;
            height: 2em;
        }

    .emp-profile{
        padding: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 50%;
        height: 60%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }

    </style>

@endsection

@section('body')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <div class="profile-pic">
                                        <label class="-label" for="file">
                                            <span class="glyphicon glyphicon-camera"></span>
                                            <span>Change Image</span>
                                        </label>
                                        <input id="file" type="file" name="image"/>
                                        @if($user->upload_photo)
                                            <img class="profile-user-img img-fluid img-circle" src="{{ $user->upload_photo }}" alt="User profile picture" id="output" width="200" />
                                        @else
                                            <img class="profile-user-img img-fluid img-circle" src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="User profile picture" id="output" width="200" />
                                        @endif
                                    </div>
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->role }}</p>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                <p class="text-muted">{{ $user->def_address }}</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                <p class="text-muted">
                                    @foreach($user->skills as $skill)
                                        <ul><span class="tag tag-danger">{{$skill}}</span></ul>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills float-right">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 pt-2">{{ $user->name }}</div>
                                    <div class="col-4 pt-2">{{ $user->email }}</div>
{{--                                    <div class="col-4 pt-2">Personal Address</div>--}}
                                    <div class="col-4 pt-2">{{ $user->experience }}</div>
                                    <div class="col-4 pt-2">{{ $user->qualification }}</div>
                                    <div class="col-4 pt-2">{{ $user->mobile }}</div>
                                    <div class="col-4 pt-2">{{ $user->dob }}</div>
                                    <div class="col-4 pt-2">
                                        <span>
                                            @foreach(range(1,5) as $i)
                                                @if($user->rating >0)
                                                    @if($user->rating >0.5)
                                                        <span class="fa fa-star" style="color: orange;font-size: 15px;"></span>
                                                    @else
                                                        <span class="fa fa-star-half-o" style="color: orange;font-size: 15px;"></span>
                                                    @endif
                                                @else
                                                    <span class="fa  fa-star-o" style="color: orange;font-size: 15px;"></span>
                                                @endif
                                                    <?php $user->rating--; ?>
                                            @endforeach
                                        </span>
                                    </div>
                              </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title ml-auto" id="exampleModalLabel" style="color:#904795;">Update Your Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <div class="col-md-12">
                                    <div class="card">
                                      <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                          <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Personal</a></li>
                                          <li class="nav-item"><a class="nav-link pinks" href="#prof-address" data-toggle="tab">Address</a></li>
                                          <li class="nav-item"><a class="nav-link" href="#add-skill" data-toggle="tab">Skills</a></li>
                                           <li class="nav-item"><a class="nav-link" href="#add-document" data-toggle="tab">Upload Document</a></li>
                                        </ul>
                                      </div>
                                      <div class="card-body">
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="profile">
                                            <form class="form-horizontal" method="post" action="{{ route('professional.profile-update') }}" >
                                                @csrf
                                                <input type="text" name="id" value="{{ auth()->user()->id }}" id="id" hidden="hidden">
                                                <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label disabled">Name</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="inputName" name="name" value="{{ auth()->user()->name }}" placeholder="Name" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                  <input type="email" class="form-control" id="inputEmail" name="email" value="{{ auth()->user()->email }}" placeholder="Email" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="experience" name="experience" value="{{ auth()->user()->experience }}" placeholder="Experience" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputQuli" class="col-sm-2 col-form-label">Qualification</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="qualification" name="qualification" value="{{ auth()->user()->qualification }}" placeholder="Qualification" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ auth()->user()->mobile }}" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 col-form-label">Date of Birth </label>
                                                <div class="col-sm-10">
                                                  <input type="date" id="dob" name="dob" value="{{ auth()->user()->dob }}" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary badge-pill" style="width:80px">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                          </div>

                                          <div class="tab-pane" id="prof-address">
                                            <form class="form-horizontal" method="post" action="{{ route('professional.add-prof-address') }}">
                                                @csrf
                                              <div class="form-group row">
                                                <label for="house_no" class="col-sm-2 col-form-label">House No</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="house_no" name="house_no" placeholder="House number" required>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="area" class="col-sm-2 col-form-label">Area</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="area" name="area" placeholder="Area" required>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="landmark" class="col-sm-2 col-form-label">Landmark</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark" required>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="mobile" class="col-sm-2 col-form-label">Mobile No</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone" required>
                                                </div>
                                              </div>
                                               <div class="form-group row">
                                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Pin Code</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Pin code" required>
                                                </div>
                                              </div>
                                                <div class="form-group row">
                                                    <label for="state" class="col-sm-2 col-form-label">State</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address_type" class="col-sm-2 col-form-label">Address Type</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="address_type" name="address_type" placeholder="Address Type" required>
                                                    </div>
                                                </div>

                                                <label class="container">Is Default
                                                    <input type="checkbox" checked="checked" name="is_default">
                                                    <span class="checkmark"></span>
                                                </label>

                                              <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                  <button type="submit" class="btn btn-primary badge-pill" style="width:80px">Submit</button>
                                                </div>
                                              </div>
                                            </form>
                                          </div>

                                          <div class="tab-pane" id="add-skill">
                                            <div class="card-body">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Add Skill's</label>
                                                                <form method="post" action="{{ route('professional.add_skill') }}">
                                                                    @csrf
                                                                    <div class="select2-purple">
                                                                        <select class="select2" multiple="multiple" name="skills[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                                            @foreach($user->get_all_services_for_skill as $sub_cat)
                                                                                <option value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-2 col-sm-10">
                                                                            <button type="submit" class="btn btn-primary badge-pill" style="width:80px">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="tab-pane" id="add-document">
                                              <div class="card-body">

                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script>
    $(function () {
        $('.select2').select2()
    })
</script>

<script>
        function Edit(){
            $('#edit-photo-modal').modal('show')
        }

        function EditProfile(){
            $('#edit-profile-modal').modal('show')
        }

        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>
@endsection
