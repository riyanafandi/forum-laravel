@extends('templates.admin')

@section('title', 'Tugas Kelas')
@section('content')
<div class="container">
    <h1>Form Tambah tugas kelas</h1>

    <div class="card">
        <div class="card-header">
            Tambah Tugas
        </div>
        <form action="{{url('/admin/tambahTugas')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="guru_id" value="{{ Auth::user()->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="mapel">Mapel</label>
                    <select class="form-control @error('mapel') is-invalid @enderror" name="mapel" id="mapel">
                        <option value="">Pilih Pelajaran</option>
                        @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                        @endforeach
                    </select>
                    @error('mapel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas_id">
                        <option value="">Pilih kelas</option>
                        @foreach($kelass as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                    @error('kelas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Tugas</label>
                    <textarea placeholder="deskripsi tugas" name="deskripsi" id="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">Lampirkan File</label>
                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file">
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <a href="" class="btn btn-sm btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection