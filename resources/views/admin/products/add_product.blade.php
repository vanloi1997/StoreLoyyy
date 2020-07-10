@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Trang Chủ</a> <a href="{{ url('/admin/view-product') }}" class="current">Sản Phẩm</a> <a href="#" class="current">Thêm Sản Phẩm</a> </div>
    <h1>Thêm Sản Phẩm</h1>
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
              <h5>THÊM SẢN PHẨM</h5>
            </div>
            <div class="widget-content nopadding">  
              <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ url('admin/add-product') }}" name="add-product" id="add-product" novalidate="novalidate">{{csrf_field() }}
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
                    <input type="text" name="product_name" id="product_name" />
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mã Sản Phẩm</label>
                  <div class="controls">
                    <input type="text" name="product_code" id="product_code" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Màu Sắc</label>
                  <div class="controls">
                    <input type="text" name="product_color" id="product_color" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mô Tả</label>
                  <div class="controls">
                    <textarea type="text" name="description" id="description" ></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Gía</label>
                  <div class="controls">
                    <input type="text" name="price" id="price" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Hình Ảnh</label>
                  <div class="controls">
                    <input type="file" name="image" id="image" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Thêm" class="btn btn-success">
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