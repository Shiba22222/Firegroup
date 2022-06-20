@extends('layouts.master',['title' => 'Chi tiết sản phẩm'])
@section('content')
@if(!empty($getDetail))
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
        @endif
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{$getDetail->image}}" width="100%" id="productImg">
            </div>
            <div class="col-6">
                <h3>Tên: {{$getDetail->name}}</h3>
                <br>
                <h5>Tiêu đề: {{$getDetail->title}}</h5>
                <br>
                <h5>Giá: {{number_format($getDetail->price)}}VND</h5>
                <br>
                <h6>Chi tiết sản phẩm
                    <i class="fa fa-indent"></i>
                </h6>
                <p>{{$getDetail->description}}</p>
            </div>
        </div>
    </div>

@else
    <h1><center>Sản phẩm không tồn tại!</center></h1>
@endif
@endsection
