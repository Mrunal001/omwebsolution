@extends('admin.layouts.header')
@section('content')
<style type="text/css">
	.pdtp{ padding-top: 30px;}
	.mrgtp{ margin-top: 30px;}
</style>
<div class="content-wrapper">
	<section class="content mrgtp">
      	<div class="card">
            <div class="card-header">
                <h3 class="card-title">Portfolio List</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                  		<tr>
                    		<th>Title</th>
                    		<th>Image</th>
                    		<th>Type</th>
                    		<th>Status</th>
                    		<th>Action</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data)

                  		<?php $imageData = json_decode($data->images, true); ?>
    
	                  		<tr>
	                    		<td>{{$data->title}}</td>
	                    		<td>
	                    			<img src="{{asset('portfolio/').'/'.$data->images}}" width="60" height="60">
	                    		</td>
	                    		<td>{{$data->type}}</td>
	                    		<td>
	                    			@if($data->status ==1)
	                    				Active
	                    			@else
	                    				Inactive
	                    			@endif
	                    		</td>
	                    		<td>
	                    			<a href='{{route("editportfolio",$data->id) }}'><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
	                    			<a href='{{route("deleteportfolio",$data->id) }}' onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
	                    		</td>
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Title</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                  		</tr>
                  	</tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection