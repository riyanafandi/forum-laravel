@extends('templates.admin')

@section('title', 'Mapel')
@section('content')
<div class="container">
    <h1>Halaman Management Mapel</h1>
    <div class="card">
        <div class="card-header">
            <h3>Semua Mapel</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapels as $mapel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mapel->mapel }}</td>
                        <td>
                            <a href="/admin/mapel/{{ $mapel->id }}" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $mapels->links() }}
        </div>
    </div>
</div>
@endsection