@extends('admin.master')
@section('title','Thêm Danh Mục')
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
          <?php dequy($cate,0,$str='Cha: ',old('danhmuc')) ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Nhập Danh Muc </label>
        <input class="form-control" type="text" name="name" value="{!! old('name') !!}">
      </div>

      <div class="form-group">
        <label for="">Active</label>
        <input type="radio" name="active" value="1"> Active
        <input type="radio" name="active" value="0" checked> No Active
      </div>

      <button type="submit" class="btn btn-default">Thêm Danh Mục</button>
    </form>
  </div>
</div>
@endsection
