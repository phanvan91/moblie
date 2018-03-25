@extends('admin.master')
@section('title','Edit Category')
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
    @if(Session::has('flash_message'))
      <div class="alert alert-{!! Session::get('flash_level') !!}">
        {!! Session::get('flash_message') !!}
      </div>
    @endif
    <form action="" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
        <label for="">Thêm Danh Mục</label>
        <select class="form-control" name="danhmuc">
          <option value="0">Thêm Danh Mục Cha</option>
          <?php dequy($cate,0,$str='Cha: ',$data['parent_id'] ) ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Nhập Danh Muc </label>
        <input class="form-control" type="text" name="name" value="{!! old('name',isset($data)?$data['name'] : null) !!}">
      </div>
      @if($data['parent_id'] == 0) @else
      <div class="form-group">
        <label for="">Active</label>
        <input type="radio" name="active" @if($data['active'] == 1) echo checked @endif value="1"> Active
        <input type="radio" name="active" @if($data['active'] == 0) echo checked @endif value="0" > No Active
      </div>
      @endif
      <button type="submit" class="btn btn-default">Sửa Danh Mục</button>
    </form>
  </div>
</div>
@endsection
