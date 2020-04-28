@extends('templates.main')

@section('title', 'Halaman Beranda')

@section('beranda', 'selected')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Halaman Beranda</h2>
                </div>
                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="/beranda" method="post">
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="form-group">
                            <textarea name="content" placeholder="Apa  Yanga anda pikirkan"
                                class="form-control @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn mt-2 btn-primary" type="submit">Kirim</button>
                        </div>
                    </form>
                    @foreach( $berandas as $beranda )
                    <div class="card">
                        <div class="card-header">
                            <a href="">{{ $beranda->user->name }}</a> kelas
                            {{ $beranda->user->kelas->nama }}
                        </div>
                        <div class="card-body">
                            {{ $beranda->content }}
                        </div>
                        <div class="card-footer">
                            <a href="" class="mr-5 text-danger"><i class="fa fa-thumbs-up"></i> like</a>
                            <a href="" class="mr-5 text-dark"><i class="fa fa-reply"></i> balas</a>
                            <a href="" class="mr-5 text-primary"><i class="fa fa-paper-plane"></i> bagikan</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection