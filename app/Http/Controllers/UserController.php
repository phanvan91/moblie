<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getAddUser(){
      return view('admin.user.add');
    }
    public function postAddUser(UserRequest $request){
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->pass);
      $user->remember_token = $request->_token;
      $user->save();
      return redirect()->route('getlistuser')->with(['flash_message'=>'Thêm User thành công','flash_level'=>'success']);
    }

    public function getListUser(){
      $user = User::select('id','name','email')->orderBy('id','desc')->get();
      return view('admin.user.list',compact('user'));
    }

    public function getEditUser($id){
      $user_curent = Auth::user()->id;
      $user = User::find($id);
      if($user_curent ==5){
        return view('admin.user.edit',compact('user'));
      }elseif($user_curent == $id){
        return view('admin.user.edit',compact('user'));
      }else{
        return redirect()->route('getlistuser')->with(['flash_message'=>'Không được Edit dữ liệu này','flash_level'=>'success']);
      }

    }
    public function postEditUser($id,Request $request){
      $user = User::find($id);
      $this->validate($request,[
        'name' => 'required',
        'pass' => 'required',
        'repass' => 'same:pass'
      ],
      [
        'name.required' => 'Vui lòng không được để trống Tên',
        'pass.required'=> 'Vui lòng không để trống Password',
        'repass.same' => 'Hai password phải giống nhau'
      ]
    );
    $user->name = $request->name;
    $user->password = Hash::make($request->pass);
    $user->save();
    return redirect()->route('getlistuser')->with(['flash_message'=>'User được Edit dữ thành công','flash_level'=>'success']);
    }
    public function getDelUser($id){
      $user_curent = Auth::user()->id;
      $user = User::find($id);
      if($user->id == 5 || $user_curent == $id){
        return redirect()->route('getlistuser')->with(['flash_message'=>'Không được xóa dữ liệu này','flash_level'=>'success']);
      }else{
        $user->delete($id);
        return redirect()->route('getlistuser');
      }
    }


    public function getlogout(){
      Auth::logout();
      return redirect()->route('login');
    }
}
