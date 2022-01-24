@extends('admin.layouts.header')
@section('content')
<style type="text/css">
	.pdtp{ padding-top: 30px;}
	.clr-red {color: red;font-weight: bolder;}
</style>
<div class="content-wrapper">
	<section class="content">
      	<div class="row">
        	<div class="col-md-12 pdtp">
          		<div class="card card-primary">
            		<div class="card-header">
              			<h3 class="card-title">Edit User</h3>

			             <div class="card-tools">
			                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
			                  <i class="fas fa-minus"></i>
			                </button>
			            </div>
			        </div>
            		<div class="card-body">
            			<form method="post" action="{{route('updateusers')}}" enctype="multipart/form-data">
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

            				@csrf

            				<input type="hidden" name="pid" value="{{$getData->id}}">
            				
	              			<div class="form-group">
	                			<label for="inputName">Full Name</label><span class="clr-red">*</span>
	                			<input type="text" id="fullname" name="fullname" class="form-control" value="{{$getData->fullname}}">
	              			</div>
	              			<div class="form-group">
	                			<label for="inputName">Email</label>
	                			<input type="text" id="email" name="email" class="form-control" value="{{$getData->email}}" disabled="disabled">
	              			</div>
	              			<div class="form-group">
	                			<label for="inputName">Password</label>
	                			<input type="text" id="password" name="password" class="form-control" value="{{$getData->password}}" disabled="disabled">
	              			</div>
	              			<div class="form-group">
	                			<label for="inputClientCompany">Phone</label><span class="clr-red">*</span>
	                			<input type="text" id="phone" name="phone" class="form-control" value="{{$getData->phone}}">
	              			</div>
	              			<div class="form-group">
	              				<label for="inputClientCompany">Gender</label><span class="clr-red">*</span>
	              				<br>
				              	<input type="radio" name="gender" value="Male" @if($getData->gender =='Male') checked @endif>
				              	<label for="male">Male</label><br>
				              	<input type="radio" name="gender" value="Female" @if($getData->gender =='Female') checked @endif>
				              	<label for="female">Female</label><br>
				            </div>
			              	<div class="form-group">
			                	<label for="inputStatus">Status</label>
			                	<select id="status" name="status" class="form-control custom-select">
			                  		<option selected disabled>Select one</option>
			                  		<option value="1" @if($getData->status ==1) selected @endif>Active</option>
			                  		<option value="0" @if($getData->status ==0) selected @endif>Inactive</option>
			                	</select>
			              	</div>

		              		<input type="submit" value="Update Porject" class="btn btn-success float-right">
		              	</form>
            		</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection