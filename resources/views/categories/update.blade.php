@extends('layouts.master',['title' => 'Sửa danh mục'])
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
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
                    </div>
                    <div class="card-header">
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
                    </div>
                    <div class="card-header">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('postUpdateCategory',['id' => $getUpdateCategory->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên danh mục:</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{$getUpdateCategory->name}}"
                                                       name="name">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 mr-1">
                                            <h6>Trạng thái</h6>
                                            <fieldset class="form-group ">
{{--                                                @if($getUpdateCategory == )--}}
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option {{old('status',$getUpdateCategory->status) == 'Hoạt động' ? 'selected' : ''}} value="Hoạt động">Hoạt động</option>
                                                    <option {{old('status',$getUpdateCategory->status) == 'Không hoạt động' ? 'selected' : ''}} value="Không hoạt động">Không hoạt động</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Mô Tả sản phẩm:</label>
                                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$getUpdateCategory->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p>Upload Image</p>
                                            <div class="form-file">
                                                <input type="file" name="image">
                                                <br>
                                                <br>
                                                <img src="{{$getUpdateCategory->image}}" alt="" height="120px" width="150px">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Lưu </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
