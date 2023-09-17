@extends('user.cover')
@section('content')
	<style>
     .order-card:hover{
        cursor: pointer;
     }   
    </style>
	<div class="page-body">
        <div class="row">

            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block" onclick="window.location.href='#card1'">
                        <h6 class="m-b-20">Cars in store</h6>
                        <h2 class="text-right"><i class="fa fa-car f-left"></i><span>0</span></h2>
                        <p class="m-b-0">All cars<span class="f-right">0</span></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card" onclick="window.location.href='#card2'">
                    <div class="card-block">
                        <h6 class="m-b-20">All bookings</h6>
                        <h2 class="text-right"><i class="ti-list f-left"></i><span>0</span></h2>

                        <p class="m-b-0">This Month<span class="f-right">0</span></p>
                    </div>
                    <!-- <span class="btn btn-info m-b-5">test</span> -->
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card" onclick="window.location.href='#card3'">
                    <div class="card-block">
                        <h6 class="m-b-20">Today's booking</h6>
                        <h2 class="text-right"><i class="ti-reload f-left"></i><span>0</span></h2>
                        <p class="m-b-0">This day<span class="f-right">0</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-pink order-card" onclick="window.location.href='#card4'">
                    <div class="card-block">
                        <h6 class="m-b-20">Comments</h6>
                        <h2 class="text-right"><i class="fa fa-comment f-left"></i><span>0</span></h2>
                        <p class="m-b-0">all comments<span class="f-right">0</span></p>
                    </div>
                </div>
            </div>
            
            <!-- order-card end -->
            <!-- statustic and process start -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h5>Statistics</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-chevron-left"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-refresh reload-card"></i></li>
                                <li><i class="fa fa-times close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <canvas id="Statistics-chart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Customer Feedback</h5>
                    </div>
                    <div class="card-block">
                        <span class="d-block text-c-blue f-24 f-w-600 text-center">0</span>
                        <canvas id="feedback-chart" height="100"></canvas>
                        <div class="row justify-content-center m-t-15">
                            <div class="col-auto b-r-default m-t-5 m-b-5">
                                <h4>0%</h4>
                                <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Positive</p>
                            </div>
                            <div class="col-auto m-t-5 m-b-5">
                                <h4>0%</h4>
                                <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Negative</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- statustic and process end -->
            
        </div>
    </div>
@endsection