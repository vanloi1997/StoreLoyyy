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
            <form  class="form-horizontal" method="POST" action="{{ url('admin/add-attributes/'.$productDetails->id) }}" name="add-attributes" id="add-attributes">{{csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
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
                <div class="control-group">
                  <label class="control-label"></label>
                  <div class="field_wrapper">
                      <div>
                          <input required type="text" name="sku[]" id="sku" placeholder="Sku" style="width: 120px"/>
                          <input required type="text" name="size[]" id="size" placeholder="Size" style="width: 120px"/>
                          <input required type="text" name="price[]" id="price" placeholder="Price" style="width: 120px"/>
                          <input required type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px"/>
                          <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus fa-fw"></i></a>
                      </div>
                  </div>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh Sách Thuộc Tính Sản Phẩm</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Attributes ID</th>
                        <th>Sku</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productDetails['attributes'] as $key => $val)
                    <tr>
                        <td style = "text-align: center">{{ $key + 1 }}</td>
                        <td style = "text-align: center">{{ $val->sku }}</td>
                        <td style = "text-align: center">{{ $val->size }}</td>
                        <td style = "text-align: center">{{ $val->price }}</td>
                        <td style = "text-align: center">{{ $val->stock }}</td>
                        <td style = "text-align: center">
                            <a rel="{{ $val->id }}" rel1="delete-attributes" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
@endsection