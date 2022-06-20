@extends('layouts.master',['title' => 'Tạo Product'])
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
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
                            <form class="form" action="{{route('postProduct')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên sản phẩm:</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="Tên sản phẩm"
                                                       name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Tiêu đề sản phẩm:</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="Tiêu đề sản phẩm"
                                                       name="title">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Số lượng sản phẩm:</label>
                                                <input type="number" id="first-name-column" class="form-control" placeholder="Số lượng sản phẩm"
                                                       name="quantity">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Giá sản phẩm:</label>
                                                <input type="number" id="first-name-column" class="form-control" placeholder="Giá sản phẩm"
                                                       name="price">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h6>Trạng thái</h6>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option>pending</option>
                                                    <option>approve</option>
                                                    <option>reject</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h6>Danh mục</h6>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="category_id">
                                                    @foreach($getCategory as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Mô Tả sản phẩm:</label>
                                                <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p>Upload Image</p>
                                            <div class="form-file">
                                                <input type="file" name="image">
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
