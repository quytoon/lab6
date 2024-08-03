@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="/profile" method="POST" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <div class="form-group">
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
            <br>
            <input type="file" class="form-control" id="avatar" name="avatar" onchange="previewImage(this)">
            @if (isset($user->avatar))
            <img id="image-preview" src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar" style="max-width: 100px;">
                @else
                No image
            @endif
            

        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
        <a href="{{route('change-pass')}}" class="btn btn-danger">Đổi mật khẩu</a>
    
</div>
<script>
    function previewImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

