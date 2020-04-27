@extends('templates.admin')

@section('title')
kelas {{ $kelas->nama }}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Forum Kelas {{ $kelas->nama }}</h6>
                </div>
                <div class="card-body">
                    @foreach( $kelas->forum as $forum )
                    <p><a href="">{{ $forum->user->name }}</a> {{ $forum->content }}</p>
                    <small class="small text-danger">Komentar</small>
                    @foreach( $forum->komentar as $komen )
                    <div class="container mt-2 border-left-danger">
                        <p><a href="">{{ $forum->user->name }}</a> {{ $komen->isi }}</p>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Anggota Kelas</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                    <div class="card-body">
                        <ul>
                            @foreach($kelas->user as $siswa)
                            <li>{{ $siswa->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection