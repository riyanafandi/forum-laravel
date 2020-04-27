@extends('templates.admin')

@section('title', 'Kelas')
@section('content')
<div class="container">
    <h1>Halaman Manajemen Kelas</h1>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Semua Kelas
            <button data-target="#modal" data-toggle="modal" class="btn btn-primary">Tambah Kelas</button>
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
                        <th>Wali Kelas</th>
                        <th>Ketua Kelas</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelass as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kelas->nama }}</td>
                        <td>{{ $kelas->wali }}</td>
                        <td>{{ $kelas->ketua }}</td>
                        <td>
                            <a href="/admin/kelas/detail/{{ $kelas->id }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $kelass->links() }}
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Data Kelas</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/admin/kelas" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Kelas" id="nama"
                            class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="wali">Wali Kelas</label>
                        <input type="text" name="wali" value="{{ old('wali') }}" id="wali" placeholder="Nama Wali Kelas"
                            class="form-control @error('wali') is-invalid @enderror">
                        @error('wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ketua">Ketua Kelas</label>
                        <input type="text" name="ketua" value="{{ old('ketua') }}" id="ketua"
                            placeholder="Nama Ketua Kelas" class="form-control @error('ketua') is-invalid @enderror">
                        @error('ketua')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Kelas</label>
                        <input type="text" name="kode" value="{{ old('kode') }}" id="kode" placeholder="Kode Kelas"
                            class="form-control @error('kode') is-invalid @enderror">
                        @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>