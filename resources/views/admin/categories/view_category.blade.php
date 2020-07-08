@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" class="tip-bottom" ><i class="icon-home"></i> Trang Chủ</a> <a href="#" class="current">Tất Cả Danh Mục</a> </div>
    <h1>DANH MỤC</h1>
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
                        <th>Name</th>
                        <th>Url</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $categories)
                    <tr>
                        <td style = "text-align: center">{{ $categories->id }}</td>
                        <td style = "text-align: center">{{ $categories->name }}</td>
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