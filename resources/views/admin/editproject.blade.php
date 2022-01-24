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
              			<h3 class="card-title">Edit Project</h3>

			             <div class="card-tools">
			                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
			                  <i class="fas fa-minus"></i>
			                </button>
			            </div>
			        </div>
            		<div class="card-body">
            			<form method="post" action="{{route('updateproject')}}" enctype="multipart/form-data">
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
	                			<label for="inputName">Project Name</label><span class="clr-red">*</span>
	                			<input type="text" id="project_name" name="project_name" class="form-control" value="{{$getData->name}}">
	              			</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Technology</label><span class="clr-red">*</span>
			                	<textarea id="technology" name="technology" class="form-control" rows="2">{{$getData->technology}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Can be Used</label><span class="clr-red">*</span>
			                	<textarea id="can_be_used" name="can_be_used" class="form-control" rows="2">{{$getData->can_be_used}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Modules</label><span class="clr-red">*</span>
			                	<textarea id="modules" name="modules" class="form-control" rows="3">{{$getData->modules}}</textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Project Description</label><span class="clr-red">*</span>
			                	<textarea id="project_desc" name="project_desc" class="form-control" rows="4">{{$getData->description}}</textarea>
			              	</div>
			              	<div class="form-group">
	                			<label for="inputClientCompany">Images</label><span class="clr-red">*</span>
	                			<input type="file" id="images" name="images[]" class="form-control" multiple="multiple">
	                			<input type="hidden" name="oldimages" value="{{$getData->images}}">
	              			</div>
	              			@foreach($imageData as $projectimage)
								<div class="row preview-image preview-show-' + i + '">
									<div class="col-md-3 col-sm-4">
										<img class="img-thumbnail image-zone" id="pro-img-' + i + '" src="http://localhost/omwebsolution/public/uploads/{{$projectimage->pimage}}" width="50" height="50">
									</div>
									<div class="col-md-8 col-sm-4 ">
										<p>{{$projectimage->pimage}}</p>
									</div>
									<div class="col-md-1 col-sm-4" >
										<i class="fa fa-trash-o image-cancel" aria-hidden="true" data-no="' + i + '" id="{{$projectimage->id}}" onclick="deleteimaenoe(this.id)"></i>
									</div>
								</div>
							@endforeach
	              			<!-- <?php
	              				$imageData = json_decode($getData->images, true);
	              				if($imageData)
	              				{
		              				foreach($imageData as $value)
		              				{ ?>
		                    			<img src="{{asset('uploads/').'/'.$value}}" width="60" height="60">
		                    		<?php }
		                    	}
	              			?> -->

	              			<div class="imgPreview"> </div>

	              			<div class="form-group">
	                			<label for="inputClientCompany">Price</label><span class="clr-red">*</span>
	                			<input type="text" id="project_price" name="project_price" class="form-control" value="{{$getData->price}}">
	              			</div>
			              	<div class="form-group">
			                	<label for="inputStatus">Status</label>
			                	<select id="project_status" name="project_status" class="form-control custom-select">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function deleteimaenoe(deleteid)
	{
		$.ajax({
			url:"/deleteimaenoe",
			type:"get",
			data:deleteid:deleteid,
			success:function(data)
			{
				swal(
                    'Deleted!',
                    ' has been deleted!',
                    'success'
                )
                $(".preview-image").load(" .preview-image");
			}
		})
	}
    $(function() 
    {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).height(120).width(120).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#images').on('change', function() {
        multiImgPreview(this, 'div.imgPreview');
    });
    });    
</script>
@endsection