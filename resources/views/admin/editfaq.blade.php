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
              			<h3 class="card-title">Edit FAQ</h3>

			             <div class="card-tools">
			                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
			                  <i class="fas fa-minus"></i>
			                </button>
			            </div>
			        </div>
            		<div class="card-body">
            			<form method="post" action="{{route('updatefaq')}}" enctype="multipart/form-data">
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

            				<input type="hidden" name="pid" value="{{$getData->pid}}">
            				<input type="hidden" name="fid" value="{{$getData->id}}">
	              			
			              	<div class="form-group">
			                	<label for="inputDescription">Question</label><span class="clr-red">*</span>
			                	<textarea id="question" name="question" class="form-control" rows="2">{{$getData->question}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Answer</label><span class="clr-red">*</span>
			                	<textarea id="answer" name="answer" class="form-control" rows="2">{{$getData->answer}}</textarea>
			              	</div>
			             
			              	<div class="form-group">
			                	<label for="inputStatus">Status</label>
			                	<select id="status" name="status" class="form-control custom-select">
			                  		<option selected disabled>Select one</option>
			                  		<option value="1" @if($getData->status ==1) selected @endif>Active</option>
			                  		<option value="0" @if($getData->status ==0) selected @endif>Inactive</option>
			                	</select>
			              	</div>

		              		<input type="submit" value="Update" class="btn btn-success float-right">
		              	</form>
            		</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>

@endsection