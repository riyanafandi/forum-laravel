@extends('templates.main')

@section('title', 'Halaman Beranda')

@section('beranda', 'selected')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Halaman Beranda</h2>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            nama pengirim
                        </div>
                        <div class="card-body">
                            content
                        </div>
                        <div class="card-footer">
                            <a href="" class="mr-5 text-danger"><i class="fa fa-thumbs-up"></i> like</a>
                            <a href="" class="mr-5 text-dark"><i class="fa fa-reply"></i> balas</a>
                            <a href="" class="mr-5 text-primary"><i class="fa fa-paper-plane"></i> bagikan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection