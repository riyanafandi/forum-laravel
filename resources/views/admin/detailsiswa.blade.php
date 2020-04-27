@extends('templates.admin')

@section('title')
Profile {{ $siswa->name }}
@stop
@section('style')
<style>
    .ulang {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $siswa->name }}</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Email : {{ $siswa->email }}</li>
                        <li>Kelas : {{ $siswa->kelas->nama }}</li>
                        <li>Chat di Forum Kelas : {{ count($siswa->forum) }} Kali</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{url('/admin/siswa')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    <a href="" class="btn btn-sm btn-danger">Blokir</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Mapel Siswa</h4>
                    <button class="btn btn-sm btn-primary" data-target="#tambahnilai" data-toggle="modal">Tambah Nilai
                        Untuk {{ $siswa->name }}</button>

                </div>
                <div class="card-body">
                    @if(session('addnilai'))
                    <div class="alert alert-success">
                        {{ session('addnilai') }}
                    </div>
                    @endif
                    @if(session('nilaiSudahAda'))
                    <div class="alert alert-danger">
                        {{ session('nilaiSudahAda') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $siswa->mapel as $mapel )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mapel->mapel }}</td>
                                <td>{{ $mapel->pivot->nilai }}</td>
                                <td>
                                    @if($mapel->pivot->nilai > 89)
                                    <p>baik </p>
                                    @else
                                    <p>cukup </p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="tambahnilai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Nilai</h4>
                <button data-dismiss="modal" class="close">&times;</button>
            </div>
            <form action="/admin/siswa/{{ $siswa->id }}/addnilai" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" max="100" placeholder="masukan nilai" name="nilai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <select name="mapel_id" id="mapel" class="form-control">
                            <option value="">Pilih Pelajaran</option>
                            @foreach( $mapels as $mapel )
                            <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>