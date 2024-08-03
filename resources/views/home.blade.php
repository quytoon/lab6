@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thông tin user') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <form action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="fullname">Họ và tên</label>
            <input type="text" readonly class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" readonly  class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" readonly class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
            <br>
            @if (isset($user->avatar))
            <img id="image-preview" src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar" style="max-width: 100px;">
            @else
            No image
            @endif
            <br>
            
        </div>
        <a href="{{route('profile')}}" class="btn btn-primary">
            Chỉnh sửa thông tin 
        </a>
    </form>

    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
