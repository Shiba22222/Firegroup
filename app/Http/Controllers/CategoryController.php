<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use File;

class CategoryController extends Controller
{
    public function get(){
        $getCategories = DB::table('categories')->get();
        return view('categories.index')->with([
            'getCategories' => $getCategories,
        ]);
    }
    public function getCategory(){
        return view('categories.create');
    }
    public function postCategory(CreateCategoryRequest $request){
        $image = !empty($request['image']) ? $request['image'] : "";
        unset($request['image']);
        $image = !empty($image) ? ImageService::save($image, 'images/products/', false) : "";

        $postCategory = DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
        ]);
        return redirect('category')->with('success','Tạo danh mục thành công');
    }

    public function getUpdateCategory($id){
        $getUpdateCategory = DB::table('categories')
            ->where('id',$id)->first();

        if (empty($getUpdateCategory)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }

        return view('categories.update')->with([
            'getUpdateCategory' => $getUpdateCategory
        ]);
    }

    public function postUpdateCategory(EditCategoryRequest $request, $id){
        $postUpdateCategory = DB::table('categories')->where('id', $id);

        if (empty($postUpdateCategory)){
            return back()->with('message','Không thể sửa. Mời nhập lại thao tác');
        }

        $image = !empty($request['image']) ? $request['image'] : "";
        unset($request['image']);
        $image = !empty($image) ? ImageService::save($image, 'images/products/', false) : "";
        $postUpdateCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status
        ]);
        return redirect('category')->with('success','Sửa danh mục thành công');
    }

    public function deleteCategory($id){
        $deleteCategory = DB::table('categories')
            ->where('id', $id);
        if (empty($deleteCategory)){
            return back()->with('message','Không thể xóa. Mời nhập lại thao tác');
        }
        $deleteCategory->delete();
        return redirect('category')->with('success','Xóa danh mục thành công');
    }
}
