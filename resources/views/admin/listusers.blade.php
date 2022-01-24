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
                <h3 class="card-title">Users List</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                  		<tr>
                    		<th>Full Name</th>
                    		<th>Email</th>
                    		<th>Phone</th>
                        <th>Gender</th>
                    		<th>Status</th>
                    		<th>Action</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data)    
	                  		<tr>
	                    		<td>{{$data->fullname}}</td>
	                    		<td>{{$data->email}}</td>
	                    		<td>{{$data->phone}}</td>
                          <td>{{$data->gender}}</td>
	                    		<td>
	                    			@if($data->status ==1)
	                    				Active
	                    			@else
	                    				Inactive
	                    			@endif
	                    		</td>
	                    		<td>
	                    			<a href='{{route("editusers",$data->id) }}'><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
	                    			<a href='{{route("deleteusers",$data->id) }}' onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
	                    		</td>
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
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