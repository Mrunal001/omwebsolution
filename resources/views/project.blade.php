@extends('front.layouts.header')
@section('content')

<!--Changing the number in the column_# class changes the number of columns-->
<style type="text/css">
    figure {
    margin: 0px 3px !important;
}
<?php 
use App\Models\ProjectImage;
?>
</style>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div id="wrap">
    <div id="columns" class="columns_4">
        <div class="box">
        @foreach($getData as $data)
           <?php $imageData=ProjectImage::where('pid',$data->id)->first();
                      ?>
                <figure>
                    @if(!empty($imageData->pimage))
                    <img src="{{asset('uploads/').'/'.$imageData->pimage}}">
                    @endif
                    <hr>
                    <figcaption>{{$data->name}}</figcaption>
                    <span class="price" style="float: left;font-size: 20px;color: #F2702F;">₹{{$data->price}}</span>
                    <span class="price" style="float: right;"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    <a class="button btn-get-started scrollto" href="{{route('projectDetail',$data->id)}}">Read More</a>
                </figure>
            
        @endforeach
        </div>
    </div>
</div>
@endsection