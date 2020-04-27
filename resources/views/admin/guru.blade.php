@extends('templates.admin')

@section('title', 'Guru')
@section('content')
<div class="container">
    <h1>Halaman Management Guru</h1>
    <div class="card">
        <div class="card-header">
            Daftar Semua Guru
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $gurus as $guru )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guru->nama }}</td>
                        <td>{{ $guru->alamat }}</td>
                        <td>
                            <a href="/admin/guru/{{ $guru->id }}" class="btn btn-sm btn-info">detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $gurus->links() }}
        </div>
    </div>
</div>
@endsection