@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Username</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->active ? 'Kích hoạt' : 'Vô hiệu' }}</td>
                <td>
                    <form action="/admin/users/{{ $user->id }}/toggle-active" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('Xác nhận đổi trạng thái từ {{ $user->active ? 'Vô hiệu' : 'Kích hoạt' }} -> {{ $user->active ? 'Kích hoạt' : 'Vô hiệu' }}')" class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}">
                            {{ $user->active ? 'Vô hiệu' : 'Kích hoạt' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
