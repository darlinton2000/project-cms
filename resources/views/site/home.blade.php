@extends('site.layout')

@section('title', 'DLInfo')

@section('content')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" >{{ $front_config['title'] }}</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">{{ $front_config['subtitle'] }}</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                            <img src="{{asset('img/ilstrator/phone.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_2  -->
    <div class="service_area_2">
        <div class="container">
            <div class="service_content_wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_service  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span>01</span>
                            <h3>Sign Up for free</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_service  wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".4s">
                            <span>02</span>
                            <h3>Make your profile</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4  wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                        <div class="single_service">
                            <span>03</span>
                            <h3>Enjoy the app</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area_2  -->

    <!-- testmonial_area  -->
    <div class="testmonial_area">
        <div class="container">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                    regular users</h3>
                        </div>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                                tempor incididunt labore et dolore magna aliqua <br>
                                quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                    - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                    regular users</h3>
                        </div>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                                tempor incididunt labore et dolore magna aliqua <br>
                                quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                    - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                    regular users</h3>
                        </div>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                                tempor incididunt labore et dolore magna aliqua <br>
                                quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                    - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                    regular users</h3>
                        </div>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                                tempor incididunt labore et dolore magna aliqua <br>
                                quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                    - Robert Smile
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ testmonial_area  -->

    <!-- about  -->
    <div class="features_area ">
        <div class="container">
            <div class="features_main_wrap">
                    <div class="row  align-items-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="features_info2">
                                    <h3>Features that give
                                        you real feel</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida Risus com odo
                                        viverra maecenas.</p>
                                    <div class="about_btn">
                                        <a class="boxed-btn4" href="#">Download Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 offset-xl-1 offset-lg-1 col-md-6 ">
                                <div class="about_draw wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                                    <img src="{{asset('assets/img/ilstrator_img/draw.png')}}" alt="">
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
    <!--/ about  -->

@endsection