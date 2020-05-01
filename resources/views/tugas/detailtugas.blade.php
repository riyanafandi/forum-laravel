@extends('templates.main')

@section('title')
Tugas {{ Auth::user()->name }}
@endsection

@section('tugas', 'selected')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Detail Tugas</h3>
                </div>
                <div class="card-body">
                    <p>Pelajaran : {{ $tugas->mapel->mapel }}</p>
                    <p>Guru : {{ $tugas->mapel->guru->nama }}</p>
                    <p>Tugas : {{ $tugas->file }}</p>
                    <p>Deskripsi Soal : {{ $tugas->deskripsi }} </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            @if(session('berhasil'))
            <div class="alert alert-success">
                {{ session('berhasil') }}
                <a href="/tugas">kembali</a>
            </div>
            @endif
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Kirim Jawaban</h3>
                </div>
                <form action="{{url('/jawaban')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Jawaban</label>
                            <textarea name="jawaban" placeholder="tulis jawaban anda"
                                class="form-control @error('jawaban') is-invalid @enderror">{{ old('jawaban') }}</textarea>
                            @error('jawaban')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar <small>optional</small></label>
                            <input type="file" name="gambar" id="gambar"
                                class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection