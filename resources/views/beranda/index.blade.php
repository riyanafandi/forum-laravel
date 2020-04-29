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
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="/beranda" method="post">
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="form-group">
                            <textarea name="content" placeholder="Apa  Yang anda pikirkan"
                                class="form-control @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn mt-2 btn-primary" type="submit">Kirim</button>
                        </div>
                    </form>
                    @foreach( $berandas as $beranda )
                    <div class="card my-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="">{{ $beranda->user->name }}</a>
                            <div class="dropdown">
                                <a href="" class="dropdown-toggle" id="dropdown" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right" aria-labelledby="dropdown">
                                    <a href="" class="dropdown-item">Report</a>
                                    <a href="" class="dropdown-item">Sembunyikan</a>
                                    <a href="" class="dropdown-item">bisukan {{ $beranda->user->name }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <small>{{ $beranda->created_at->diffForHumans() }}</small>
                            <br class="pb-3">
                            {{ $beranda->content }}
                            <br><br>
                            <div class="form-check d-inline">
                                <input type="checkbox" class="form-check-input" name="like" id="like"
                                    data-user="{{ Auth::user()->id }}" data-beranda="{{$beranda->id}}"><i
                                    class="mr-5 fa fa-thumbs-up"></i>
                            </div>
                            <a href="" class="mr-5 text-dark"><i class="fa fa-reply"></i> </a>
                            <a href="" class="mr-5 text-primary"><i class="fa fa-paper-plane"></i> bagikan</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('.form-check-input').on('click', function(){
        // alert('oke');
        const user = $(this).data('user');
        const beranda = $(this).data('beranda');

        $.ajax({
            url : "{{ url('/like') }}",
            type : "post",
            data : {
                user_id : user,
                beranda_id : beranda
            },
            success: function(){
                document.location.href = "{{url('/beranda')}}";
            }
        });
    });
</script>
@endsection