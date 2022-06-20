<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use App\Services\ImageService;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function get(Request $request){
        $searches = $request['search'] ?  $request['search'] : "";
        $pending = DB::table('products')->where('status','pending')->count();
        $approve = DB::table('products')->where('status','approve')->count();
        $reject = DB::table('products')->where('status','reject')->count();

        if ($searches != ""){
            $getProducts = DB::table('products')
                            ->where('name', 'LIKE', '%'.$searches.'%')
                            ->orWhere('title', 'LIKE', '%'.$searches.'%')
                            ->orWhere('status', 'LIKE', '%'.$searches.'%')
                            ->orderBy('id','desc')
                            ->simplePaginate(5);
        }elseif ($request->input('status')){
            $getProducts = DB::table('products')
                            ->where('status', $request->input('status'))
                            ->orderby('id', 'desc')
                            ->simplePaginate(5);
        }

        else {
            $getProducts = DB::table('products')
                            ->simplePaginate(5);
        }

        return view('products.index')->with([
            'getProducts' => $getProducts,
            'searches' => $searches,
            'pending' => $pending,
            'approve' => $approve,
            'reject' => $reject
        ]);
    }

    public function getProduct(){
        $getCategory = DB::table('categories')
                        ->get();

        return view('products.create')->with([
            'getCategory' => $getCategory
        ]);
    }

    public function postProduct(CreateProductRequest $request){
        $image = !empty($request['image']) ? $request['image'] : "";
        unset($request['image']);
        $image = !empty($image) ? ImageService::save($image, 'images/products/', false) : "";

        $createProduct = DB::table('products')->insert([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);
        return redirect('product')->with('success','Thêm sản phẩm thành công');
    }

    public function getUpdateProduct($id){
        $getUpdateProduct = DB::table('products')->where('id', $id)->first();
        $getCategory = DB::table('categories')->get();

        if (empty($getUpdateProduct)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }

        return view('products.update')->with([
            'getUpdateProduct' => $getUpdateProduct,
            'getCategory' => $getCategory
        ]);
    }

    public function postUpdateProduct(EditProductRequest $request, $id){
        $postUpdateProduct = DB::table('products')
                                ->where('id',$id);

        $image = !empty($request['image']) ? $request['image'] : "";
        unset($request['image']);
        $image = !empty($image) ? ImageService::save($image, 'images/products/', false) : "";

        if (empty($postUpdateProduct)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }

        $postUpdateProduct->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);
        return redirect('product')->with('success','Sửa sản phẩm thành công');
    }

    public function deleteProduct($id){
        $deleteCategory = DB::table('products')
                            ->where('id', $id);

        if (empty($deleteCategory)){
            return back()->with('message','Không thể xóa. Mời nhập lại thao tác');
        }

        $deleteCategory->delete();
        return redirect('product')->with('success','Xóa sản phẩm thành công');
    }

    public function getDetail($id){
        $getDetail = DB::table('products')->find($id);

        if (empty($getDetail)){
            return back()->with('message','Không thể truy cập. Mời nhập lại thao tác');
        }

        return view('products.detail')->with([
            'getDetail' => $getDetail,
        ]);
    }
}
