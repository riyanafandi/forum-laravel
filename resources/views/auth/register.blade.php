@extends('templates.auth')
@section('title', 'Halaman Registrasi')

@section('content')
<div class="row">
    <div class="col-lg-8 col-sm-12 mx-auto">
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="text-center">Halaman Registrasi</h2>
            </div>
            <form action="/postregister" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Masukan Email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Pilih Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"
                            id="kelas_id">
                            <option value="">Pilih Kelas</option>
                            @foreach( $kelass as $kelas )
                            <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Masukan Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" placeholder="Masukan Konfirmasi Password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <div class="card-footer text-center">
                    <a href="{{url('/login')}}">Sudah punya akun ? Login</a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection