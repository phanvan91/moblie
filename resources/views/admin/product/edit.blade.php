@extends('admin.master')
@section('title','Edit Product')
@section('content')
<form method="post" name="editform" enctype="multipart/form-data">
<div class="col-lg-6">
  <div class="row">
    @if(count($errors) > 0)
      <ul class="alert alert-danger">
        @foreach($errors->all() as $value)
          <li> {!! $value !!} </li>
        @endforeach
      </ul>
    @endif
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <select class="form-control" name="danhmuc">
        <option value="0">Lựa chọn Danh Mục Sản Phẩm</option>
        <?php dequy($cate,0,$str='Cha: ',$product['category_id']) ?>
      </select>
      <div class="form-group">
        <label for=""> Tên Sản Phẩm </label>
        <input type="text" name="name" class="form-control" value="{!! old('name',isset($product)?$product['name']:null) !!}">
      </div>
      <div class="form-group">
        <label for=""> Giá </label>
        <input type="text" name="priceold" class="form-control" value="{!! old('priceold',isset($product)?$product['priceold']:null) !!}">
      </div>
      <div class="form-group">
        <label for=""> Giá sale </label>
        <input type="text" class="form-control" name="pricesale" value="{!! old('pricesale',isset($product)?$product['pricesale']:null) !!}">
      </div>
      <div class="form-group">
        <label for=""> Description </label>
        <textarea name="mota" class="form-control"  rows="8" cols="80">{!! old('mota',isset($product)?$product['description']:null) !!}</textarea>
          <script type="text/javascript"> ckeditor("mota") </script>
      </div>
      <div class="form-group">
        <label for=""> Content </label>
        <textarea name="content" class="form-control" rows="8" cols="80">{!! old('content',isset($product)?$product['content']:null) !!}</textarea>
          <script type="text/javascript"> ckeditor("content") </script>
      </div>
      <div class="form-group">
        <label for="">Hình ảnh</label>
        <img src="{!! asset('uploads/'.$product['image']) !!}" width=300px alt="">
        <input type="hidden" name="curent_img" value="{!! $product['image'] !!}">
      </div>
      <div class="form-group">
        <label for=""> Hình Ảnh </label>
        <input type="file" name="image" value="">
      </div>

      <div class="form-group">
        <label for=""> CPU </label>
        <input type="text" name="cpu" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Tốc Độ CPU </label>
        <input type="text" name="tocdocpu" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Ram </label>
        <input type="text" name="ram" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Ổ đĩa </label>
        <input type="text" name="odia" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Dung Lượng </label>
        <input type="text" name="dungluong" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Chip Đồ Họa </label>
        <input type="text" name="chipdohoa" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Kích Thước Màn Hình </label>
        <input type="text" name="kichthuocmanhinh" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Độ Phân Giải </label>
        <input type="text" name="dophangiai" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Hệ Điều Hành </label>
        <input type="text" name="hedieuhanh" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Dung Lượng Pin </label>
        <input type="text" name="dungluongpin" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Camera Trước </label>
        <input type="text" name="cameratruoc" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Camera Sau </label>
        <input type="text" name="camerasau" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Băng tầng 4G </label>
        <input type="text" name="bangtang4g" class="form-control" value="None">
      </div>
      <div class="form-group">
        <label for=""> Bluetooth </label>
        <input type="text" name="bluetooth" class="form-control" value="None">
      </div>


      <input type="submit" name="submit" value="Sửa Sản Phẩm" class="btn btn-success">
      <br><br><br>

  </div>
</div>
<div class="col-lg-2"></div>
<div class="col-lg-4">
  @foreach($image_detail as $key => $value)
  <div id="{!! $key !!}" class="form-group" >
    <img src="{!! asset('uploads/imagedetail/'.$value['image']) !!}" idhinh="{!! $value['id'] !!}" id="{!! $key !!}" width="200px" alt="">
    <a href="javascript:void(0)"  id="del_img" type="button" class="btn btn-danger btn-circle" > <i class="fa fa-times"></i> </a>
  </div>
  @endforeach
  <button type="button" id="addimage" name="button" class="btn btn-primary"> ImageDetail </button>
  <div id="insert">

  </div>
</div>
</form>
@endsection
