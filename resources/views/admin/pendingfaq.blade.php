@extends('admin.layouts.header')
@section('content')
<?php 
use App\Models\Project;
?>
<style type="text/css">
	.pdtp{ padding-top: 30px;}
	.mrgtp{ margin-top: 30px;}
</style>
<div class="content-wrapper">
	<section class="content mrgtp">
      	<div class="card">
            <div class="card-header">
                <h3 class="card-title">FAQ List</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                  		<tr>
                    		<th>Project Name</th>
                    		<th>Question</th>
                        <th>Answer</th>
                    		<th>Status</th>
                        <th>Action</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data) 
                        <?php $pname= Project::where('id',$data->pid)->first();?>   
	                  		<tr>
	                    		<td>{{$pname->name}}</td>
	                    		<td>{{$data->question}}</td>
                          <td>{{$data->answer}}</td>
	                    		<td>
                            @if($data->status ==1)
                              Active
                            @else
                              Inactive
                            @endif   
                          </td>
                          
                          <td>
                            <a href='{{route("editfaq",$data->id) }}'><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;

                            <a href='{{route("deleteproject",$data->id) }}' onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>                    		
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Project Name</th>
                        <th>Question</th>
                        <th>Answer</th>
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