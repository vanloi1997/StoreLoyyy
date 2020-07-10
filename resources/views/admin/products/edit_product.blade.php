@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Trang Chủ</a> <a href="{{ url('/admin/view-product') }}" class="current">Sản Phẩm</a> <a href="#" class="current">Sửa Sản Phẩm</a> </div>
    <h1>Sửa Sản Phẩm</h1>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_error') !!}</strong>
    </div>
    @endif    
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif 
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>SỬA SẢN PHẨM</h5>
            </div>
            <div class="widget-content nopadding">  
              <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('admin/edit-product/'.$productDetails->id) }}" name="edit-product" id="edit-product" novalidate="novalidate">{{csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Danh Mục Sản Phẩm</label>
                  <div class="controls">
                    <select name="category_id" id="category_id" style="width: 220px">
                      <?php echo $categories_dropdown; ?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tên Sản Phẩm</label>
                  <div class="controls">
                    <input type="text" name="product_name" id="product_name" value="{{ $productDetails->product_name }}"/>
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mã Sản Phẩm</label>
                  <div class="controls">
                    <input type="text" name="product_code" id="product_code" value="{{ $productDetails->product_code }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Màu Sắc</label>
                  <div class="controls">
                    <input type="text" name="product_color" id="product_color" value="{{ $productDetails->product_color }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mô Tả</label>
                  <div class="controls">
                    <textarea type="text" name="description" id="description" >{{ $productDetails->description }}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Gía</label>
                  <div class="controls">
                    <input type="text" name="price" id="price" value="{{ $productDetails->price }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Hình Ảnh</label>
                  <div class="controls">
                    <input type="file" name="image" id="image" />
                    <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                    @if(!empty($productDetails->image))
                    <img style="width: 50px" src="{{ asset('/images/backend_images/products/small/'.$productDetails->image) }}"> | <a href="{{ url('admin/delete-product-image/'.$productDetails->id) }}">Delete</a>
                    @endif
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Sửa" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
@endsection