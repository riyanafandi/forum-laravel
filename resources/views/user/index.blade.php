@extends('templates.main')

@section('title')
Profile {{ Auth::user()->name }}
@endsection

@section('profile', 'selected')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Hello {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            your Email : {{ Auth::user()->email }}
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
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