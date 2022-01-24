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
          	<h2>Profile</h2>
          	<h3><span>Manage Profile</span></h3>
        </div>

        <div class="row" style="padding-top: 50px;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?size=626&ext=jpg');background-size: cover;">

            <div class="col-lg-12">
                <form method="post"  class="php-email-form" action="{{route('updateprofile')}}">
                @csrf
                	<input type="hidden" name="id" value="{{$getData->id}}">
                    <label style="font-weight: 800;padding-bottom: 5px;">Full Name</label>
                    <div class="col form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Full Name" value="{{$getData->fullname}}">
                    </div>

                    <label style="font-weight: 800;padding-bottom: 5px;">Email</label>
                    <div class="col form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{$getData->email}}" disabled="disabled">
                    </div>
                  
                  	<label style="font-weight: 800;padding-bottom: 5px;">Mobile</label>
                    <div class="col form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Mobile" value="{{$getData->phone}}" minlength="10" maxlength="10">
                    </div>

                    <label style="font-weight: 800;padding-bottom: 5px;">Gender</label>
                    <div class="col form-group">
                        <input type="radio" id="male" name="gender" value="Male" @if($getData->gender == 'Male') checked @endif>
						<label for="html">Male</label><br>
						<input type="radio" id="female" name="gender" value="Female" @if($getData->gender == 'Female') checked @endif>
						<label for="css">Female</label><br>
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