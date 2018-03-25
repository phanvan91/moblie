<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CateRequest;
class CateController extends Controller
{
    public function getCateAdd(){
      $cate = Category::select('id','name','parent_id')->get()->toArray();
      return view('admin.cate.add',compact('cate'));
    }
    public function postCateAdd(CateRequest $request){
      $cate = new Category;
      $cate->name = $request->name;
      $cate->slug = str_slug($request->name);
      $cate->parent_id = $request->danhmuc;
      $cate->active = $request->active;
      $cate->save();
      return redirect()->route('getcatelist')->with(['flash_message'=>'Đã Tạo Dữ Liệu Xong','flash_level'=>'success']);
    }

    public function getCateList(){
      $cate = Category::select('id','name','parent_id','active')->get();
      return view('admin.cate.list',compact('cate'));
    }

    public function getCateEdit($id){
      $cate = Category::select('id','name','parent_id','active')->get();
      $data = Category::find($id);
      return view('admin.cate.edit',compact('data','cate'));
    }
    public function postCateEdit($id,Request $request){
      $cate = Category::find($id);
      $cate->name = $request->name;
      $cate->slug = str_slug($request->name);
      $cate->parent_id = $request->danhmuc;
      $cate->active = $request->active;
      $cate->save();
      return redirect()->route('getcatelist')->with(['flash_message'=>'Đã Edit Dữ Liệu Xong','flash_level'=>'success']);
    }
}
