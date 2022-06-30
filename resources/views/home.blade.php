@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <center>
                    <h2>Blog Sederhana</h2>
                    <a href="/add_articles"><button class="btn btn-success">Tambah Artikel</button></a>
                </center>

                <div class="card-body col-md-4 col-sm-12 mt-4">
                    <div class="card">
                        <img src="https://atlantictravelsusa.com/wp-content/uploads/2016/04/dummy-post-horisontal-thegem-blog-default.jpg" class="card-img-top" alt="gambar" >
                        <div class="card-body">
                            <h5 class="card-title">Judul</h5>
                            <a href="" class="btn btn-primary">Baca Artikel</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection