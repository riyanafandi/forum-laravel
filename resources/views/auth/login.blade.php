@extends('templates.auth')
@section('title', 'Halaman Login')

@section('content')
<div class="row">
    <div class="col-lg-8 col-sm-12 mx-auto">
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="text-center">Halaman Login</h2>
                @if(session('logout'))
                <div class="alert alert-success">
                    {{ session('logout') }}
                </div>
                @endif
            </div>
            <form action="/postlogin" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Masukan Email" name="email" value="{{ old('email') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Masukan Password" class="form-control" name="password">
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <div class="card-footer text-center">
                    <a href="{{url('/register')}}">Belum punya akun ? register</a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection