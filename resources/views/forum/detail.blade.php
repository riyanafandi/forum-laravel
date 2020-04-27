@extends('templates.main')
@section('title', 'Detail Forum')
@section('group', 'selected')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $forum->user->name }}</h2>
                    <a href="/forum" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    {{ $forum->content }}
                    <hr>

                    <div class="card">
                        <div class="card-header">
                            <h5>Komentar</h5>
                        </div>
                        <div class="card-body">
                            @foreach( $forum->komentar as $komentar )
                            <p><a href="">{{ $forum->user->name }}</a> {{ $komentar->isi }}</p>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection