@extends('admin.master')
@section('title','Tạo User')
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
    <form action="{!! URL::route('getadduser') !!}" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
        <label for="">Nhập Tên </label>
        <input class="form-control" type="text" name="name" value="{!! old('name') !!}">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{!! old('email') !!}">
      </div>
      <div class="form-group">
        <label for="">Mật Khẩu</label>
        <input type="password" class="form-control" name="pass" value="">
      </div>
      <div class="form-group">
        <label for=""> Nhập Lại Mật Khẩu </label>
        <input type="password" name="repass" class="form-control" value="">
      </div>
      <button type="submit" class="btn btn-default">User Add</button>
    </form>
  </div>
</div>
@endsection
