<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Om Web Solution</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('front/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"
    type="text/css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style type="text/css">
        .container:before{
            display:none;
        }
        .thumbnail {
            position: relative;
            padding: 0px;
            margin-bottom: 20px;
        }
        .thumbnail img {
            width: 80%;
        }
        .thumbnail .caption{
            margin: 7px;
        }
        .main-section{
            background-color: #F8F8F8;
        }
        .dropdown{
            float:right;
            padding-right: 30px;
        }
        .btn{
            border:0px;
            margin:10px 0px;
            box-shadow:none !important;
        }
        .dropdown .dropdown-menu{
            padding:20px;
            width:auto;
            left:-110px !important;
            box-shadow:0px 5px 30px black;
        }
        .total-header-section{
            border-bottom:1px solid #d2d2d2;
        }
        .total-section p{
            margin-bottom:20px;
        }
        .cart-detail{
            padding:15px 0px;
        }
        .cart-detail-img img{
            width:65px;
            height:50px;
        }
        .cart-detail-product p{
            margin:0px;
            color:#000;
            font-weight:500;
        }
        .cart-detail .price{
            margin-right:10px;
            font-weight:500;
        }
        .cart-detail .count{
            color:#C2C2DC;
        }
        .checkout{
            border-top:1px solid #d2d2d2;
            padding-top: 15px;
        }
        .checkout .btn-primary{
            border-radius:50px;
            height:50px;
        }
        .dropdown-menu:before{
            content: " ";
            position:absolute;
            top:-20px;
            right:50px;
            border:10px solid transparent;
            border-bottom-color:#fff;
        }
    </style>
</head>

<body>
<?php 
$actual_link = "$_SERVER[REQUEST_URI]";
$link_array = explode('/',$actual_link);
$page = end($link_array);

$userdata = Session::get('userdata');
?>

  <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="mailto:omwebsolution001@gmail.com">omwebsolution001@gmail.com</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+91 7283963745</span>
                </i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">

                <a href="https://twitter.com/OMWebSolution1" class="twitter">
                    <i class="bi bi-twitter"></i>
                </a>

                <a href="https://www.facebook.com/OM-Web-Solution-113122047255578/?ref=pages_you_manage" class="facebook">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="https://www.linkedin.com/company/omwebsolution/?viewAsMember=true" class="linkedin">
                    <i class="bi bi-linkedin"></i>
                </a>

                <a href="https://www.youtube.com/channel/UCcJiFutM0FKKXHddMKhR0UA?view_as=subscriber?sub_confirmation=1" class="linkedin">
                    <i class="bi bi-youtube"></i>
                </a>

                <a href="t.me/omwebsolution" class="linkedin">
                    <i class="bi bi-telegram"></i>
                </a>

                <a href="live:.cid.aeedf0696bb11006" class="linkedin">
                  <i class="bi bi-skype"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <img src="{{asset('front/assets/img/logo.png')}}" alt="om web solution" width="" height="75">

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto @if(empty($page)) active @endif" href="{{route('index')}}">Home</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'about') active @endif" href="{{route('about')}}">About</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto @if($page == 'portfolios') active @endif" href="{{route('portfolio')}}">Portfolio</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'project') active @endif" href="{{route('project')}}">Project</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'career') active @endif" href="{{route('career')}}">Career</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="{{route('commingsoon')}}">Blog</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="{{route('commingsoon')}}">Privacy Policy</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'contact') active @endif" href="{{route('contact')}}">Contact</a>
                    </li>

                    @if(!empty($userdata))
                        <li class="dropdown"><a href="#"><span>Welcome, {{$userdata->fullname}}</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{route('manageprofile')}}">Manage Profile</a></li>
                                <li><a href="{{route('forgetpassword')}}">Forget Password</a></li>
                                <li><a href="{{route('changepassword')}}">Change Password</a></li>
                                <li><a href="{{route('userlogout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="nav-link scrollto @if($page == 'signin') active @endif" href="{{route('signin')}}">Login / Register</a>
                        </li>
                    @endif
                    <div class="dropdown">
                        <button type="button" class="btn btn-info" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </div>
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p>Total: <span class="text-info">₹ {{ $total }}</span></p>
                                </div>
                            </div>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{asset('uploads')}}/{{$details['image']}}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-info"> ₹{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block" style="text-align: center;display: contents;">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('about')}}">About</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('portfolio')}}">Portfolio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('career')}}">Career</a></li>
                            
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Website Designing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Website Development</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">CMS Website Design</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Payment Integration</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Logo Designing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Graphic Design</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>

                        <div class="social-links mt-3">

                            <a href="https://twitter.com/OMWebSolution1" class="twitter"><i class="bx bxl-twitter"></i>
                            </a>

                            <a href="https://www.facebook.com/OM-Web-Solution-113122047255578/?ref=pages_you_manage" class="facebook"><i class="bx bxl-facebook"></i>
                            </a>
                  
                            <a href="https://www.linkedin.com/company/omwebsolution/?viewAsMember=true" class="linkedin"><i class="bx bxl-linkedin"></i>
                            </a>

                            <a href="https://www.youtube.com/channel/UCcJiFutM0FKKXHddMKhR0UA?view_as=subscriber?sub_confirmation=1" class="youtube"><i class="bx bxl-youtube"></i>
                            </a>

                            <a href="t.me/omwebsolution" class="telegram"><i class="bx bxl-telegram"></i>
                            </a>

                            <a href="live:.cid.aeedf0696bb11006" class="skype"><i class="bx bxl-skype"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Start Login Register Modal -->
    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Login to Your Account</h1><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('userlogin')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <br>
                            <input type="text" name="email" placeholder="Email" style="padding: 10px;width: 100%;">
                        </div>

                        <div class="form-group">
                            <label for="email">Password</label><br>
                            <input type="password" name="password" placeholder="Password" style="padding: 10px;width: 100%;">
                        </div>
                      
                        <input type="submit" name="login" class="login btn btn-success loginmodal-submit" value="Login">
                    </form>
                </div>
                <div class="login-help" style="padding: 15px;">
                    <a href="{{route('signin')}}">Register</a>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Register Modal -->

    <!-- Vendor JS Files -->
    <script src="{{asset('front/assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('front/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>