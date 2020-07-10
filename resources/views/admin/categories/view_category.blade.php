@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" class="tip-bottom" ><i class="icon-home"></i> Trang Chủ</a> <a href="#" class="current">Tất Cả Danh Mục</a> </div>
    <div>
      <h1 style="float: left">DANH MỤC</h1>
      <a href="{{ url('admin/add-category') }}" class="btn btn-success" style="margin-top: 24px ; margin-left: 18px">Thêm Mới</a>
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
            <h5>Danh Sách Tất Cả Danh Mục</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên Danh Mục</th>
                        <th>Parent_id</th>
                        <th>Mô Tả</th>
                        <th>Url</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $key => $categories)
                    <tr>
                        <td style = "text-align: center">{{ $key + 1 }}</td>
                        <td style = "text-align: center">{{ $categories->name }}</td>
                        <td style = "text-align: center">{{ $categories->parent_id }}</td>
                        <td style = "text-align: center">{{ $categories->description }}</td>
                        <td style = "text-align: center">{{ $categories->url }}</td>
                        <td style = "text-align: center">
                            <a href="{{ url('admin/edit-category/'.$categories->id) }}" class="btn btn-primary btn-mini">Edit</a>
                            <a href="{{ url('admin/delete-category/'.$categories->id) }}"  class="delcate btn btn-danger btn-mini">Delete</a>
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