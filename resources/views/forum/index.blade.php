@extends('templates.main')
@section('title', 'Halaman Forum')
@section('group', 'selected')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h1 class="my-3 text-center">Group Kelas {{ Auth::user()->kelas->nama }}</h1>
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @if( session('komentar') )
            <div class="alert alert-success">
                {{session('komentar')}}
            </div>
            @endif
            <form action="/forum" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="kelas_id" value="{{ Auth::user()->kelas->id }}">
                <div class="input-group">
                    <input type="text" class="form-control p-3" placeholder="Tanyakan Sesuatu" name="pertanyaan">
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>

            <hr>
            @foreach(Auth::user()->kelas->forum as $forum)
            <div class="card my-3">
                <div class="card-header">
                    <h3>{{ $forum->user->name }}</h3>
                </div>
                <div class="card-body">
                    <small>{{ $forum->created_at }} | {{ $forum->created_at->diffForHumans() }}</small>
                    <br>
                    {{ substr($forum->content, 0,300) }}... <a href="/forum/{{ $forum->id }}">selengkapnya</a>
                </div>
                <div class="card-footer">
                    <form action="/komentar" method="post">
                        @csrf
                        <input type="hidden" value="{{ $forum->id }}" name="forum_id">
                        <input type="hidden" value="{{ $forum->user->id }}" name="user_id">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tambahkan Komentar" name="komentar">
                            <button class="btn btn-warning" type="submit">Kirim</button>
                        </div>

                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card" style="margin-top:145px;">
                <div class="card-header">
                    <h3>Anggota Kelas</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach( Auth::user()->kelas->user as $anggota )
                        <li class="list-group-item">{{ $anggota->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection