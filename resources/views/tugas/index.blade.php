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

        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
@endsection