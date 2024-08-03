@extends('layouts.app')

@section('content')
<div class="container">

<h2>Đổi mật khẩu</h2>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif (session('current_password'))
<div class="alert alert-danger">
    {{ session('current_password') }}
</div>
@endif
<form action="/change-password" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="current_password">Mật khẩu cũ</label>
        <input type="password" class="form-control" id="current_password" name="current_password">
    </div>
    <div class="form-group">
        <label for="new_password">Mật khẩu mới</label>
        <input type="password" class="form-control" id="new_password" name="new_password">
    </div>
    <div class="form-group">
        <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn đổi mật khẩu không?')">Đổi mật khẩu</button>
</form>
</div>
@endsection

