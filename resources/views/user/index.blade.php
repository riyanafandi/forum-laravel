@extends('templates.main')

@section('title')
Profile {{ Auth::user()->name }}
@endsection

@section('profile', 'selected')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
            <div class="accordion" id="accordion">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" id="satu">
                        <a class="h2" href="" data-toggle="collapse" data-target="#collapse">
                            Profile {{ Auth::user()->name }}
                        </a>
                    </div>
                    <div id="collapse" class="collapse show">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nama : {{ Auth::user()->name }}</li>
                                <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                                <li class="list-group-item">Kelas : {{ Auth::user()->kelas->nama }}</li>
                                <li class="list-group-item">Wali Kelas : {{ Auth::user()->kelas->wali }}</li>
                                @if(empty(Auth::user()->siswa))
                                <li class="list-group-item">Alamat : ...</li>
                                <li class="list-group-item">NIS: ...</li>
                                <li class="list-group-item">Jenis Kelamin: ...</li>
                                <li class="list-group-item">Agama: ...</li>
                                <li class="list-group-item">TTL: ...</li>
                                <a href="" data-target="#lengkapiProfile" data-toggle="modal"
                                    class="btn btn-sm btn-primary">Lengkapi Profile</a>
                                @else
                                <li class="list-group-item">Alamat : {{ Auth::user()->siswa->alamat }}</li>
                                <li class="list-group-item">NIS: {{ Auth::user()->siswa->nis }}</li>
                                <li class="list-group-item">Jenis Kelamin: {{ Auth::user()->siswa->jenis_kelamin }}</li>
                                <li class="list-group-item">Agama: {{ Auth::user()->siswa->agama }}</li>
                                <li class="list-group-item">TTL: {{ Auth::user()->siswa->ttl }}</li>\
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Daftar Nilai</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( Auth::user()->mapel as $mapel )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mapel->mapel }}</td>
                        <td>{{ $mapel->guru->nama }}</td>
                        <td>{{ $mapel->pivot->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
@endsection


<div class="modal fade" id="lengkapiProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Lengkapi Profile {{ Auth::user()->name }}
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-primary">Lengkapi</button>
                </div>
            </form>
        </div>
    </div>
</div>