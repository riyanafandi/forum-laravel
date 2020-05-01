@extends('templates.admin')

@section('title')
kelas {{ $kelas->nama }}
@stop
@section('content')
<div class="container">
    @if(session('berhasil'))
    <div class="alert alert-success">
        {{ session('berhasil') }}
    </div>
    @endif
    <div class="row mb-4">
        <div class="col-sm-4">
            <div class="card border-left-warning shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1"><a href=""> Jumlah
                                    Forum Kelas</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas->forum->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-left-warning shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1"><a href=""> Jumlah
                                    Anggota Kelas</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas->user->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-left-warning shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1"><a href=""> Tugas
                                    Kelas</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-code fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 my-4">
            <div class="card shadow mb-4" id="anggota">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Anggota Kelas</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas->user as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->name }}</td>
                                <td>{{ $anggota->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 my-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold">Tugas Kelas</h6>
                    <a href="{{url('/admin/tambahTugas')}}" class="btn btn-sm btn-primary">Tambahkan Tugas
                        Kelas</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($kelas->tugas as $tugas)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <embed src="{{ asset($tugas->fiel) }}" type="document/pdf">
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection