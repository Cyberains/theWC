@extends('professional.layouts.main')
@section('title')
    <title>Profile</title>
@endsection

@section('btitle')
    <li class="breadcrumb-item">Profile</li>
@endsection

@section('body')
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        @if($user->upload_photo != null || $user->upload_photo != '')
                            <img src="{{ $user->upload_photo }}" alt="user avatar" />
                        @else
                            <img src="https://cdn.pixabay.com/photo/2014/04/02/10/25/man-303792_960_720.png" alt=""/>
                        @endif

                        <div class="file btn btn-lg btn-primary" onclick="Edit()">
                            Change Photo
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <h6>
                            {{ $user->role }}
                        </h6>
                        <p class="proile-rating">RANKINGS :
                            <span>
                                <td>
                                    <span class="fa fa-star" style="color: orange"></span>
                                    <span class="fa fa-star" style="color: orange"></span>
                                    <span class="fa fa-star" style="color: orange"></span>
                                    <span class="fa fa-star" style="color: orange"></span>
                                    <span class="fa fa-star"></span>
                                </td>
                            </span>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="profile-edit-btn" onclick="EditProfile()">Edit Profile</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORKING LOCATION</p>
                        <p href="">{{ $user->working_location }}</p><br/>
                        <p>SKILLS</p>
                        <a href="">{{ $user->qualification }}</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->mobile }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession Expertise</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->qualification }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->experience }}</p>
                                </div>
                            </div>


                            <p id="demo"></p>
                            <div>
                                <div onclick="getLocation()" style="cursor: grabbing">Get Location</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="edit-photo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Update Image</h3>
                    <form class="sform form" method="post" action="{{ route('professional.avatar-update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="image">Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <div class="d-flex">
                                        <input class="form-control ml-4 photo" type="file" name="image" id="image" value="{{ old('image') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button  type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>
                                    <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Update Profile</h3>
                    <form class="sform form" method="post" action="{{ route('professional.profile-update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="name">Name<span>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="name" id="name" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="email">Email<span>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="email" id="name" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="experience">Experience<span>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="experience" id="experience" value="{{ auth()->user()->experience }}">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="working_location">Working Location<span>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="working_location" id="working_location" value="{{ auth()->user()->working_location }}">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="qualification">Qualification<span>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="qualification" id="qualification" value="{{ auth()->user()->qualification }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button  type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>
                                    <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
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

@section('script')
    <script type="text/javascript">

        function Edit(){
            $('#edit-photo-modal').modal('show')
        }

        function EditProfile(){
            $('#edit-profile-modal').modal('show')
        }


        let x = document.getElementById("demo");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
            // codeLatLng(position.coords.latitude, position.coords.longitude)
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }

        // function codeLatLng(lat, lng) {
        //     var latlng = new google.maps.LatLng(lat, lng);
        //     geocoder.geocode({'latLng': latlng}, function(results, status) {
        //         if (status === google.maps.GeocoderStatus.OK) {
        //             console.log(results)
        //             if (results[1]) {
        //                 //formatted address
        //                 alert(results[0].formatted_address)
        //                 //find country name
        //                 for (var i=0; i<results[0].address_components.length; i++) {
        //                     for (var b=0;b<results[0].address_components[i].types.length;b++) {
        //                         //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
        //                         if (results[0].address_components[i].types[b] === "administrative_area_level_1") {
        //                             //this is the object you are looking for
        //                             city= results[0].address_components[i];
        //                             break;
        //                         }
        //                     }
        //                 }
        //                 //city data
        //                 alert(city.short_name + " " + city.long_name)
        //             } else {
        //                 alert("No results found");
        //             }
        //         } else {
        //             alert("Geocoder failed due to: " + status);
        //         }
        //     })
        // }

    </script>
@endsection
