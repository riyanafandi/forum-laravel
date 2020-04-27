@extends('templates.admin')

@section('title')
Detail {{ $guru->nama }}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $guru->nama }}</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Tempat Tanggal Lahir : {{ $guru->ttl }}</li>
                        <li>Alamat : {{ $guru->alamat }}</li>
                        <li>Mengajar pelajaran : {{ $guru->mapel->mapel }}</li>
                        @foreach( $guru->kelas as $kelas )
                        <li>Mengajar di kelas : {{ $kelas->nama }}, jam ke-{{ $kelas->pivot->jam_ke }}</li>
                        @endforeach

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