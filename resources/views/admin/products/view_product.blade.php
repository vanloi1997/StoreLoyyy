@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" class="tip-bottom" ><i class="icon-home"></i> Trang Chủ</a> <a href="#" class="current">Tất Cả Sản Phẩm</a> </div>
    <div>
        <h1 style="float: left">SẢN PHẨM</h1>
        <a href="{{ url('admin/add-product') }}" class="btn btn-success" style="margin-top: 24px ; margin-left: 18px">Thêm Mới</a>
    </div>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh Sách Tất Cả Sản Phẩm</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Danh Mục Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Màu Sắc</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Hình Ảnh</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $key => $products)
                    <tr>
                        <td style = "text-align: center">{{ $key + 1 }}</td>
                        <td style = "text-align: center">{{ $products->cate_name }}</td>
                        <td style = "text-align: center">{{ $products->product_name }}</td>
                        <td style = "text-align: center">{{ $products->product_code }}</td>
                        <td style = "text-align: center">{{ $products->product_color }}</td>
                        <td style = "text-align: center">{{ $products->description }}</td>
                        <td style = "text-align: center">{{ $products->price }}</td>
                        <td style = "text-align: center">
                            @if(!empty($products->image))
                                <img src="{{ asset('/images/backend_images/products/small/'.$products->image) }}" style="width: 70px">
                            @endif
                        </td>
                        <td style = "text-align: center">
                            <a href="#myModal{{ $products->product_code }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                            <a href="{{ url('admin/edit-product/'.$products->id) }}" class="btn btn-primary btn-mini">Edit</a>
                            <a href="{{ url('admin/delete-product/'.$products->id) }}"  class="delcate btn btn-danger btn-mini">Delete</a>
                        </td>
                    </tr>  
                    <div id="myModal{{ $products->product_code }}" class="modal hide">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>CHI TIẾT SẢN PHẨM ---- {{ $products->product_name }}</h3>
                        </div>
                        <div class="modal-body">
                            <p>STT: {{ $key + 1 }}</p>
                            <p>Danh Mục: {{ $products->cate_name }}</p>
                            <p>Tên Sản Phẩm: {{ $products->product_name }}</p>
                            <p>Mã Sản Phẩm: {{ $products->product_code }}</p>
                            <p>Màu Sắc: {{ $products->product_color }}</p>
                            <p>Gía: {{ $products->price }}</p>
                            <p>Mô Tả: {{ $products->description }}</p>
                            <p>Loại Vải: {{ $products->description }}</p>
                            <p>Chất Liệu: {{ $products->description }}</p>
                        </div>
                    </div>
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