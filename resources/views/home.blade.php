@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .image-container {
        position: relative;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .image-container:hover .image {
        opacity: 0.3;
    }

    .image-container:hover .middle {
        opacity: 1;
    }
</style>

<link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css"/>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header "><a href="{{route('Category')}}"><button class="btn btn-success ">START SHOPING</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($userinfo)

                        <div class="row">
                            <div class="col-md-12">
                    <!------ Include the above in your HEAD tag ---------->
                                <div class="card-title mb-4">
                                                <div class="d-flex justify-content-start">
                                                    <div class="image-container">
                                                        <img src="{{$userinfo->avatar}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                        <div class="middle">
                                                            <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                                            <input type="file" style="display: none;" id="profilePicture" name="file" />
                                                        </div>
                                                    </div>
                                                    <div class="userData ml-3">
                                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{$userinfo->name}}</a></h2>
                                                        <h6 class="d-block"><a href="javascript:void(0)">0</a> USD </h6>
                                                        <h6 class="d-block"><a href="javascript:void(0)">0</a> Active Bonus</h6>
                                                        <h6 class="d-block"><a href="javascript:void(0)">0</a> Bonus</h6>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                    </div>
                                                </div>
                                            </div>
                                <div class="row">
                                                <div class="col-12">
                                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content ml-1" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                                                            <div class="row">
                                                                <div class="col-sm-3 col-md-2 col-5">
                                                                    <label style="font-weight:bold;">User id</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{$userinfo->provaider_user_id}}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-3 col-md-2 col-5">
                                                                    <label style="font-weight:bold;">Email</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{$userinfo->email}}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-3 col-md-2 col-5">
                                                                    <label style="font-weight:bold;">Full Name</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    {{$userinfo->name}}
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                        <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                            Facebook, Google, Twitter Account that are connected to this account
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                        </div>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    $(document).ready(function () {
        $imgSrc = $('#imgProfile').attr('src');
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgProfile').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#btnChangePicture').on('click', function () {
            // document.getElementById('profilePicture').click();
            if (!$('#btnChangePicture').hasClass('changing')) {
                $('#profilePicture').click();
            }
            else {
                // change
            }
        });
        $('#profilePicture').on('change', function () {
            readURL(this);
            $('#btnChangePicture').addClass('changing');
            $('#btnChangePicture').attr('value', 'Confirm');
            $('#btnDiscard').removeClass('d-none');
            // $('#imgProfile').attr('src', '');
        });
        $('#btnDiscard').on('click', function () {
            // if ($('#btnDiscard').hasClass('d-none')) {
            $('#btnChangePicture').removeClass('changing');
            $('#btnChangePicture').attr('value', 'Change');
            $('#btnDiscard').addClass('d-none');
            $('#imgProfile').attr('src', $imgSrc);
            $('#profilePicture').val('');
            // }
        });
    });
</script>
