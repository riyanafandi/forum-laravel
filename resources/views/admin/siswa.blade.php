@extends('templates.admin')

@section('title', 'Siswa')
@section('content')
<div class="container">
    <h1>Halaman Manajemen Siswa</h1>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Semua Siswa</h3>
        </div>
        <div class="card-body">
            @if(session('suksesinput'))
            <div class="alert alert-success">
                {{ session('suksesinput') }}
            </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>
                            <a href="/admin/siswa/detail/{{ $siswa->id }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $siswas->links() }}
        </div>
    </div>
</div>
@endsection