@extends('front.layouts.header')
@section('content')
<style type="text/css">
.serviceBox img {
    max-height: 200px;
    min-height: 200px;
}
a, a:hover, a:focus, a:active {
    text-decoration: none;
    outline: none;
}
ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.serviceBox{
    color: #888;
    background-color: #fff;
    font-family: 'Poppins', sans-serif;
    text-align: center;
    padding: 20px;
    border-radius: 0 40px;
}
.serviceBox .service-icon{
    color: #fff;
    background: linear-gradient(45deg, transparent, #2c970d, transparent);
    font-size: 50px;
    line-height: 110px;
    width: 110px;
    height: 110px;
    margin: 0 auto 30px;
    border-radius: 50px 0;
    position: relative;
    z-index: 1;
}
.serviceBox .service-icon:before{
    content: '';
    background: linear-gradient(to left, #80f80d, #2c970d);
    border-radius: 50%;
    position: absolute;
    left: 10px;
    bottom: 10px;
    top: 10px;
    right: 10px;
    z-index: -1;
}
.serviceBox .title{
    color: #2c970d;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    margin: 0 0 7px;
}
.serviceBox .description{
    font-size: 13px;
    line-height: 22px;
    letter-spacing: 0.5px;
}
.serviceBox.blue .service-icon{
    background: linear-gradient(45deg, transparent, #1c7ac0,transparent);
}
.serviceBox.blue .service-icon:before{
    background: linear-gradient(to left, #2ebef3, #1c7ac0);
}
.serviceBox.blue .title{ color: #1c7ac0; }
.serviceBox.pink .service-icon{
    background: linear-gradient(45deg, transparent, #db1557, transparent);
}
.serviceBox.pink .service-icon:before{
    background: linear-gradient(to left, #ff2b87, #db1557);
}
.serviceBox.pink .title{ color: #db1557; }
.serviceBox.orange .service-icon{
    background: linear-gradient(45deg, transparent, #f96407, transparent);
}
.serviceBox.orange .service-icon:before{
    background: linear-gradient(to left, #f98e1b, #f96407);
}
.serviceBox.orange .title{ color: #f96407; }
</style>
<section class="section_all bg-light" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_all text-center">
                    <h3 class="font-weight-bold">About US<span class="text-custom"></span></h3>
                    <p class="section_subtitle mx-auto text-muted">OM Web Solution is a progressive & innovative IT company, an illustrious name in the IT arena, for providing impeccable services.</p>
                    <div class="">
                        <i class=""></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row vertical_content_manage mt-5">
            <div class="col-lg-6">
                <div class="about_header_main mt-3">
                   
                    <h4 class="about_heading text-capitalize font-weight-bold mt-4"></h4>
                    <p class="text-muted mt-3">OM Web Solution is a web development outsourcing company specializing in website development, website Designing, web-portals, database solutions.</p>

                    <p class="text-muted mt-3"> We provide Website design, Web Development ,  Logo Design ,  Web Hosting , Domain Registration and (SEO) Search Engine Optimization. </p>

                    <p class="text-muted mt-3">Our aim is to provide best quality solution at competitive price. we help our customers make measurable improvements in all areas of their business. </p>

                    <p class="text-muted mt-3">Our expertise is in developing web applications , Ecommerce websites , web portals development , web designing , and Logo design.</p>

                    <p class="text-muted mt-3">Our Aim “To provide high quality technology services and solutions at competitive rates to the highest level of customer satisfaction with strong focus on integrity, innovation and excellence.”</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img_about mt-3">
                    <img src="https://i.ibb.co/qpz1hvM/About-us.jpg" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>

        <div class="row vertical_content_manage mt-5">
            <div class="col-lg-12">
                <div class="about_header_main mt-3">
                   
                    <h4 class="about_heading text-capitalize font-weight-bold mt-4">Why Choose Us</h4>
                    <p class="section_subtitle mx-auto text-muted">Yes this question is predominantly on top of your thoughts. We reckon the priority in our key decision-making as well as Troubleshooting methods performed in your server, thereby ensuring that your technology works for your business profits.</p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
        	<h4 class="about_heading text-capitalize font-weight-bold mt-4">What We Offer</h4>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox">
                        <img src="{{asset('Images/WebDesigning.jpg')}}">
                       
                        <h3 class="title">Website Designing</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox blue">
                        <img src="{{asset('Images/WebDevelopment.jpeg')}}">
                        <h3 class="title">Website Development</span></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox orange">
                        <img src="{{asset('Images/CMSDevelopment.png')}}">
                        <h3 class="title">CMS Website Designing</span></h3>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox pink">
                        <img src="{{asset('Images/payment-gateway.png')}}">
                        <h3 class="title">Logo Designing</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox">
                        <img src="{{asset('Images/LogoDesigning.png')}}">
                        <h3 class="title">Graphic Designing</span></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="serviceBox blue">
                        <img src="{{asset('Images/GraphicDesign.jpg')}}">
                        <h3 class="title">Payment Integration</span></h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection