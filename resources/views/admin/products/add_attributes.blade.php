@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Trang Chủ</a> <a href="{{ url('/admin/view-product') }}" class="current">Sản Phẩm</a> <a href="#" class="current">Thêm Thuộc Tính Sản Phẩm</a> </div>
    <h1>Thêm Thuộc Tính Sản Phẩm</h1>
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
              <h5>THÊM THUỘC TÍNH SẢN PHẨM</h5>
            </div>
            <div class="widget-content nopadding">  
            <form  class="form-horizontal" method="POST" action="{{ url('admin/add-attributes/'.$productDetails->id) }}" name="add-attributes" id="add-attributes" novalidate="novalidate">{{csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Tên Sản Phẩm: </label>
                  <label class="control-label"  style="text-align: center"><strong>{{ $productDetails->product_name }}</strong></label>
                </div>
                <div class="control-group">
                  <label class="control-label">Mã Sản Phẩm: </label>
                  <label class="control-label"  style="text-align: center"><strong>{{ $productDetails->product_code}}</strong></label>
                </div>
                <div class="control-group">
                  <label class="control-label">Màu Sắc: </label>
                  <label class="control-label"  style="text-align: center"><strong>{{ $productDetails->product_color }}</strong></label>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Thêm Thuộc Tính" class="btn btn-success">
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