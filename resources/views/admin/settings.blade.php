@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Trang Chủ</a> <a href="#" class="current">Đổi Mật Khẩu</a> </div>
    <h1>Đổi Mật Khẩu</h1>
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
              <h5>ĐỔI MẬT KHẨU</h5>
            </div>
            <div class="widget-content nopadding">  
              <form class="form-horizontal" method="POST" action="{{ url('admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Mật Khẩu Cũ</label>
                  <div class="controls">
                    <input type="password" name="current_pwd" id="current_pwd" />
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mật Khẩu Mới</label>
                  <div class="controls">
                    <input type="password" name="new_pwd" id="new_pwd" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Nhập Lại Mật Khẩu Mới</label>
                  <div class="controls">
                    <input type="password" name="confirm_pwd" id="confirm_pwd" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Cập Nhật Mật Khẩu" class="btn btn-success">
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