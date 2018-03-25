<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
Use App\Product;
use Mail;
use Cart;
use App\customer;
use App\chitietdonhang;
class FrontController extends Controller
{
    public function index(){
      $count = Cart::count();
      $content = Cart::content();
      $cate = Category::select('id','name','parent_id')->where('parent_id',0)->get()->toArray();
      return view('front.trangchu.main',compact('cate','active','content','count'));
    }
    public function cate($id){
      $count = Cart::count();
      $content = Cart::content();
      $title_cate = Category::where('id',$id)->first();
      $product_cate = Product::where('category_id',$id)->orderBy('id','desc')->paginate(16);
      $cate_cungloai = Category::where('id',$product_cate[0]->category_id)->get()->toArray();
      $cate_cungloai1 = Category::where('parent_id',$cate_cungloai[0]['parent_id'])->get()->toArray();
      return view('front.category.category',compact('product_cate','title_cate','cate_cungloai1','count','content'));
    }
    public function detail($id){
      $count = Cart::count();
      $content = Cart::content();
      $product = Product::find($id);
      $image_detail = Product::find($id)->imagedetail->toArray();
      $product_cungloai = Product::where('category_id',$product['category_id'])->where('id','<>',$id)->orderBy('id','desc')->take(4)->get()->toArray();
      return view('front.detail.detail',compact('product','image_detail','product_cungloai','count','content'));
    }
    public function getcontact(){
      $content = Cart::content();
      $count = Cart::count();
      return view('front.contact.contact',compact('count','content'));
    }
    public function postcontact(Request $request){
      $data = ['email' => $request->email,'hoten'=>$request->hoten,'loinhan' =>$request->loinhan];
      Mail::send('front.contact.mail',$data,function($msg){
        $msg->from('phanvan91@gmail.com','phanvan');
        $msg->to('phanvan91@gmail.com','phanvanmail');
        $msg->subject('phanvan');

      });
      return redirect()->route('trangchu');
    }
    public function getmuahang($id){
      $product = Product::where('id',$id)->first();
      Cart::add(['id'=>$id,'name'=>$product['name'],'qty'=>1,'price'=>$product['pricesale'],'options'=>['image'=>$product['image']]]);
      return redirect()->back();
    }
    public function getgiohang(){
      $total = Cart::subtotal();
      $count = Cart::count();
      $content = Cart::content();
      return view('front.shop.shop',compact('content','count','total'));
    }
    public function xoasanpham($id){
      Cart::remove($id);
      return redirect()->back();
    }
    public function update(Request $request){
      if($request->ajax()){
        $rowid = $request->get('rowid');
        $qty = $request->get('qty');
        Cart::update($rowid,$qty);
        return 'ok';
      }
    }
    public function postgiohang(Request $request){
      $this->validate($request,[
        'ten' => 'required',
        'email' => 'required',
        'sdt' => 'required'
      ],
      [
        'ten.required' => 'Vui lòng nhập tên',
        'email.required' => 'Vui lòng nhập email',
        'sdt.required' => 'Vui lòng nhập số điện thoại'
      ]
    );
    $customer = new customer;
    $customer->name = $request->ten;
    $customer->email = $request->email;
    $customer->sodienthoai = $request->sdt;
    $customer->save();

    $content = Cart::content();


    if(!empty($content)){
      foreach($content as $value){
        $chitietdonhang = new chitietdonhang;
        $chitietdonhang->name = $value->name;
        $chitietdonhang->soluong = $value->qty;
        $chitietdonhang->price = $value->price;
        $chitietdonhang->id_cus = $customer->id;
        $chitietdonhang->save();
      }
    }
    Cart::destroy();
    return redirect()->route('trangchu');

  }



}
