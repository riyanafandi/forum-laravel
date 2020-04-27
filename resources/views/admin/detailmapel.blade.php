@extends('templates.admin')

@section('title', 'Kelas')

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
    <h1>Detail Mapel {{ $mapel->mapel }}</h1>
    <div class="ulang">
        @foreach($mapel->user as $user)
        <div class="card">
            <div class="card-header">
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Nama : {{ $user->name }}</li>
                    <li class="list-group-item">Kelas : {{ $user->kelas->nama }}</li>
                    <li class="list-group-item">Wali Kelas : {{ $user->kelas->wali }}</li>
                    <li class="list-group-item">Nilai : {{ $user->pivot->nilai }}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection