@extends('templates.main')

@section('title')
Tugas {{ Auth::user()->name }}
@endsection

@section('tugas', 'selected')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Daftar Tugas</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Pelajaran</th>
                        <th>Guru</th>
                        <th>Deskripsi</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->kelas->tugas as $tugas)
                    <tr>
                        <td>{{ $tugas->mapel->mapel }}</td>
                        <td>{{ $tugas->guru->nama }}</td>
                        <td>{{ substr($tugas->deskripsi, 0, 100) }}...</td>
                        <td>
                            <a href="/tugas/{{ $tugas->id }}" class="btn btn-sm btn-info">detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection