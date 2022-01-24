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
              			<h3 class="card-title">Add Project</h3>

			             <div class="card-tools">
			                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
			                  <i class="fas fa-minus"></i>
			                </button>
			            </div>
			        </div>
            		<div class="card-body">
            			<form method="post" action="{{('createproject')}}" enctype="multipart/form-data">
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
	              			<div class="form-group">
	                			<label for="inputName">Project Name</label><span class="clr-red">*</span>
	                			<input type="text" id="project_name" name="project_name" class="form-control">
	              			</div>
	              			<div class="form-group">
			                	<label for="inputDescription">Technology</label><span class="clr-red">*</span>
			                	<textarea id="technology" name="technology" class="form-control" rows="2"></textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Can be Used</label><span class="clr-red">*</span>
			                	<textarea id="can_be_used" name="can_be_used" class="form-control" rows="2"></textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Modules</label><span class="clr-red">*</span>
			                	<textarea id="modules" name="modules" class="form-control" rows="3"></textarea>
			              	</div>
			              	<div class="form-group">
			                	<label for="inputDescription">Project Description</label><span class="clr-red">*</span>
			                	<textarea id="project_desc" name="project_desc" class="form-control" rows="4"></textarea>
			              	</div>
			              	<div class="form-group">
	                			<label for="inputClientCompany">Images</label><span class="clr-red">*</span>
	                			<input type="file" id="images" name="images[]" class="form-control" multiple="multiple" accept="image/*">
	              			</div>
	              			<div class="imgPreview"> </div>

	              			<div class="form-group">
	                			<label for="inputClientCompany">Price</label><span class="clr-red">*</span>
	                			<input type="text" id="project_price" name="project_price" class="form-control">
	              			</div>
			              	<div class="form-group">
			                	<label for="inputStatus">Status</label>
			                	<select id="project_status" name="project_status" class="form-control custom-select">
			                  		<option selected disabled>Select one</option>
			                  		<option value="1">Active</option>
			                  		<option value="0">Inactive</option>
			                	</select>
			              	</div>

		              		<input type="submit" value="Add Porject" class="btn btn-success float-right">
		              	</form>
            		</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
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