<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\chitietdonhang;
class DonHangController extends Controller
{
    public function getDonHang(){
      $customer = customer::orderBy('id','DESC')->get();
      return view('admin.donhang.donhang',compact('customer'));
    }
    public function getChiTiet($id){
      $customer = customer::find($id);
      $chitiet = chitietdonhang::where('id_cus',$customer['id'])->get();
      return view('admin.donhang.chitiet',compact('chitiet'));
    }
    public function getDel($id){
      $cus = customer::find($id);
      $cus->delete();
      return redirect()->route('getdonhang');
    }
}
