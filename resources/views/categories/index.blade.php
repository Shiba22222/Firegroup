@extends('layouts.master',['title' => 'Danh sách danh mục'])
@section('content')
    <div class="row" id="table-inverse">
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
                <div class="card-content">

                    <div class="card-body">
                        <a href="{{route('getCategory')}}" class="btn btn-outline-success">+ Tạo Danh Mục Mới</a>
                    </div>

                    <!-- table with light -->
                    <div class="table-responsive">
                        <table class="table table-light mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>TÊN</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Trạng Thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody id="ListCategory">
                            @foreach($getCategories as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{$item->image}}" alt="" height="100px" width="120px"></td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{route('getUpdateCategory',['id'=> $item->id])}}">
                                            <button type="submit" title="update" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                            </button>
                                        </a>
                                        <a href="{{route('getDeleteCategory',['id'=> $item->id])}}">
                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Xóa</i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
