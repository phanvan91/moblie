<?php

namespace App\Http\Controllers;
use Auth;
use Request;

use App\Category;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\ProductDetailImage;
use DB;
use File;

class ProductController extends Controller
{
    public function getProductAdd(){
      $cate = Category::select('id','name','parent_id')->get();
      return view('admin.product.add',compact('cate'));
    }
    public function postProductAdd(ProductRequest $request){
      $nameimage = $request->file('image')->getClientOriginalName();
      $product = new Product;
      $product->name = $request->name;
      $product->slug = str_slug($request->name);
      $product->priceold = $request->priceold;
      $product->pricesale = $request->pricesale;
      $product->description = $request->mota;
      $product->content = $request->content;
      $product->image = $nameimage;
      $product->user_id = Auth::user()->id;
      $product->category_id = $request->danhmuc;
      $product->cpu  = $request->cpu;
      $product->tocdocpu  = $request->tocdocpu;
      $product->ram  = $request->ram;
      $product->odia  = $request->odia;
      $product->dungluongodia  = $request->dungluong;
      $product->chipsetdohoa  = $request->chipdohoa;
      $product->kichthuocmanhinh = $request->kichthuocmanhinh;
      $product->dophangiai  = $request->dophangiai;
      $product->hedieuhanh  = $request->hedieuhanh;
      $product->dungluongpin  = $request->dungluongpin;
      $product->cameratruoc  = $request->cameratruoc;
      $product->camerasau  = $request->camerasau;
      $product->bangtang4g  = $request->bangtang4g;
      $product->bluetooth  = $request->bluetooth;
      $request->file('image')->move('uploads/',$nameimage);
      $product->save();
      if($request->hasFile('fadd')){
        foreach($request->fadd as $value){
          $img = new ProductDetailImage;
          if(isset($value)){
            $img->image = $value->getClientOriginalName();
            $img->product_id = $product->id;
            $value->move('uploads/imagedetail',$value->getClientOriginalName());
            $img->save();
          }
        }
     }
     return redirect()->route('getproductlist');
  }
  public function getProductList(){
    $product = Product::select('id','name','category_id')->orderBy('id','desc')->get()->toArray();
    return view('admin.product.list',compact('product'));
  }
  public function getProductEdit($id){
    $cate = Category::select('id','name','parent_id')->get();
    $product = Product::find($id);
    $image_detail = Product::find($id)->imagedetail;
    return view('admin.product.edit',compact('product','cate','image_detail'));
  }
  public function postProductEdit($id,Request $request){
    $product = Product::find($id);
    $product->name = Request::input('name');
    $product->slug = str_slug(Request::input('name'));
    $product->priceold = Request::input('priceold');
    $product->pricesale = Request::input('pricesale');
    $product->description = Request::input('mota');
    $product->content = Request::input('content');
    $product->user_id = Auth::user()->id;
    $product->category_id = Request::input('danhmuc');
    $curent_image =  'uploads/'.Request::input('curent_img');
    $product->cpu  = Request::input('cpu');
    $product->tocdocpu  = Request::input('tocdocpu');
    $product->ram  = Request::input('ram');
    $product->odia  = Request::input('odia');
    $product->dungluongodia  = Request::input('dungluong');
    $product->chipsetdohoa  = Request::input('chipdohoa');
    $product->kichthuocmanhinh = Request::input('kichthuocmanhinh');
    $product->dophangiai  = Request::input('dophangiai');
    $product->hedieuhanh  = Request::input('hedieuhanh');
    $product->dungluongpin  = Request::input('dungluongpin');
    $product->cameratruoc  = Request::input('cameratruoc');
    $product->camerasau  = Request::input('camerasau');
    $product->bangtang4g  = Request::input('bangtang4g');
    $product->bluetooth   = Request::input('bluetooth');
    if(!empty(Request::File('image'))){
      $imagename = Request::File('image')->getClientOriginalName();
      $product->image = $imagename;
      Request::File('image')->move('uploads/',$imagename);
      if(File::exists($curent_image)){
        File::delete($curent_image);
      }
    }
    $product->save();
    if(!empty(Request::File('fadd'))){
      foreach(Request::File('fadd') as $value){
        $image_detail = new ProductDetailImage;
        $image_detail->image = $value->getClientOriginalName();
        $image_detail->product_id = $id;
        $value->move('uploads/imagedetail/',$value->getClientOriginalName());
        $image_detail->save();
      }
    }
    return redirect()->route('getproductlist');
  }

  public function delimgdetail($id){
    if(Request::ajax()){
      $idhinh = (int)Request::get('idhinh');
      $imgdetail = ProductDetailImage::find($idhinh);
      if(!empty($imgdetail)){
        $img = 'uploads/imagedetail/'.$imgdetail->image;
        if(File::exists($img)){
          File::delete($img);
        }
        $imgdetail->delete();
      }
    }
    return 'ok';
  }

  public function getProductDel($id){
    $image_detail = Product::find($id)->imagedetail->toArray();
    foreach($image_detail as $value){
      File::delete('uploads/imagedetail/'.$value['image']);
    }
    $product = Product::find($id);
    File::delete('uploads/'.$product->image);
    $product->delete($id);
    return redirect()->route('getproductlist');
  }
}
