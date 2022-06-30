
@extends('master')
 
@section('title', 'Blog Sederhana')
 
@section('header')
    <center>
        <h2>Blog Sederhana</h2>
        <a href="/add"><button class="btn btn-success">Tambah Artikel</button></a>
    </center>
@endsection

@section('main')
    @foreach ($article as $art)
    <div class="col-md-4 col-sm-12 mt-4">
        <div class="card">
            <img src="{{ asset('assets/images/'.$art->image) }}" class="card-img-top" alt="gambar" style="width:400px;height:300px;">
            <div class="card-body">
                <h5 class="card-title">{{ $art->title }}</h5>
                <a href="/detail/{{ $art->id }}" class="btn btn-primary">Baca Artikel</a>
            </div>
        </div>
    </div>
   @endforeach
@endsection