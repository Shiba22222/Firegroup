@extends('layouts.master',['title' => 'Danh sách sản phẩm'])
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
                </div>
                <div class="card-header">
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-content">
                    <form class="card-body" action="">
                        <label for="">Tìm kiếm:</label>
                        <input type="search" name="search" placeholder="Tìm kiếm" value="{{$searches}}">
                    </form>
                        <div class="card-body">
                            <a href="{{route('getProduct')}}" class="btn btn-outline-success">+ Tạo Sản Phẩm Mới</a>
                            <a href="{{route('getPro',['status' => 'pending'])}}" class="btn btn-outline-primary">Pending <span>{{$pending}}</span></a>
                            <a href="{{route('getPro',['status' => 'approve'])}}" class="btn btn-outline-secondary">Approve <span>{{$approve}}</span></a>
                            <a href="{{route('getPro',['status' => 'reject'])}}" class="btn btn-outline-info">Reject <span>{{$reject}}</span></a>
                            <a href="{{route('getPro')}}" class="btn btn-outline-success">Clear</a>
                        </div>


                    <!-- table with light -->
                    <div class="table-responsive">
                        <table class="table table-light mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>TÊN</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Trạng Thái</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody id="ListCategory">
                            @foreach($getProducts as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{$item->image}}" alt="" height="120px" width="150px"></td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price)}} VND</td>
                                    <td>{{$item->status}}</td>

                                    <td>
                                        <a href="{{route('getDetail',['id'=> $item->id])}}">
                                            <button type="submit" title="update" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Chi tiết</i>
                                            </button>
                                        </a>
                                        <a href="{{route('getUpdateProduct',['id'=> $item->id])}}">
                                            <button type="submit" title="update" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                            </button>
                                        </a>
                                        <a href="{{route('getDeleteProduct',['id'=> $item->id])}}">
                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Xóa</i>
                                            </button>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$getProducts->links()}}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

