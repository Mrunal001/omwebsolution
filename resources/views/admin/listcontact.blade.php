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
                <h3 class="card-title">Contact List</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                  		<tr>
                    		<th>Name</th>
                    		<th>Email</th>
                    		<th>Country</th>
                        <th>State</th>
                    		<th>City</th>
                    		<th>Subject</th>
                        <th>Message</th>
                        <th>Answer</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                  		@foreach($getData as $data)    
	                  		<tr>
	                    		<td>{{$data->name}}</td>

	                    		<td><a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal' data-id="{{$data->id}}">{{$data->email}}</a></td>
	                    		<td>{{$data->country}}</td>
                          <td>{{$data->state}}</td>
                          <td>{{$data->city}}</td>
                          <td>{{$data->subject}}</td>
                          <td>{{$data->message}}</td>	
                          <td>{{$data->answer}}</td>                    		
	                  		</tr>
	                  	@endforeach
                  	</tbody>
                  	<tfoot>
                  		<tr>
                    		<th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Answer</th>
                  		</tr>
                  	</tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="practice_modal">
  <div class="modal-dialog">
     <form id="companydata" action="{{route('contactAnswer')}}" method="post">
      @csrf
          <div class="modal-content">
          <input type="hidden" id="cid" name="cid" value="">

          <div class="modal-body">
            <label>Email:</label>
            <input type="text" name="email" id="email" value="" class="form-control">
          </div>

          <div class="modal-body">
            <label>Answer:</label>
            <textarea name="answer" id="answer" value="" class="form-control"></textarea>
          </div>

          <input type="submit" value="Submit" id="submit" class="btn btn-success" style="font-size: 0.8em;">
      </div>
     </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#editCompany").click(function(){
      var customer_id = $(this).data('id');
      $.ajax({
        url: "{{route('getContactData')}}",
        type:"post",
        data:{"_token": "{{ csrf_token() }}","customer_id":customer_id},
        success: function(result)
        {
          $('#email').val(result);
          $('#cid').val(customer_id);
        }
      });
    });
  });
</script>
@endsection