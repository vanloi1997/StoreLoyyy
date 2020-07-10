@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Trang Chủ</a> <a href="{{ url('/admin/view-category') }}" class="current">Danh Mục</a> <a href="#" class="current">Sửa Danh Mục</a> </div>
    <h1>Danh Mục</h1>
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
              <h5>SỬA DANH MỤC</h5>
            </div>
            <div class="widget-content nopadding">  
              <form class="form-horizontal" method="POST" action="{{ url('admin/edit-category/'.$cateDetails->id) }}" name="edit-category" id="edit-category" novalidate="novalidate">{{csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Tên Danh Mục</label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name" value="{{ $cateDetails->name }}" />
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Danh Mục Cha</label>
                  <div class="controls">
                  <select name="parent_id" style="width: 220px">
                      <option value="0">Chọn Danh Mục</option>
                      @foreach($parent_cate as $val)
                        <option value="{{ $val->id }}" 
                          @if($val->id == $cateDetails->parent_id) 
                            selected 
                          @endif >{{ $val->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mô Tả</label>
                  <div class="controls">
                    <textarea name="description" id="description">{{ $cateDetails->description }} </textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url" value="{{ $cateDetails->url }}"/>
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