@extends('front.layouts.header')
@section('content')

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

    	@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="section-title">
          	<h2>Password</h2>
          	<h3><span>Forget Password</span></h3>
        </div>

        <div class="row" style="padding-top: 50px;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?size=626&ext=jpg');background-size: cover;">

            <div class="col-lg-12">
                <form method="post" class="php-email-form" action="{{route('emailverify')}}">
                @csrf
                    <label style="font-weight: 800;padding-bottom: 5px;">Verify Email</label>
                    <div class="col form-group">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Your Email" >
                    </div>
                    <div class="text-center">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection