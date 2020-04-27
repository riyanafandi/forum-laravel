@extends('templates.admin')

@section('title')
Profile {{ $siswa->name }}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $siswa->name }}</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Email : {{ $siswa->email }}</li>
                        <li>Kelas : {{ $siswa->kelas->nama }}</li>
                        <li>Chat di Forum : {{ count($siswa->forum) }} Kali</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{url('/admin/siswa')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    <a href="" class="btn btn-sm btn-danger">Blokir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection