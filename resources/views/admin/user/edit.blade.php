@extends('admin.master')
@section('title','Edit User')
@section('content')
<div class="col-lg-6">
  <div class="row">
    @if(count($errors) > 0)
      <ul class="alert alert-danger">
        @foreach($errors->all() as $value)
          <li> {!! $value !!} </li>
        @endforeach
      </ul>
    @endif
    <form action="" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
        <label for="">Nhập Tên </label>
        <input class="form-control" type="text" name="name" value="{!! old('name',isset($user)?$user->name:null) !!}">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{!! old('email',isset($user)?$user->email:null) !!} "disabled>
      </div>
      <div class="form-group">
        <label for="">Mật Khẩu</label>
        <input type="password" class="form-control" name="pass" value="">
      </div>
      <div class="form-group">
        <label for=""> Nhập Lại Mật Khẩu </label>
        <input type="password" name="repass" class="form-control" value="">
      </div>
      <button type="submit" class="btn btn-default">User Edit</button>
    </form>
  </div>
</div>
@endsection
