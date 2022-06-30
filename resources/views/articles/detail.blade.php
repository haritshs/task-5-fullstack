@extends('master')

@section('title')
{{ $article->title }}
@endsection

@section('main')
<div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
    <img src="{{ asset('assets/images/'.$article->image) }}"  class="card-img-top" alt="gambar" >
    <div class="p-4">
        <h2>{{ $article->title }}</h2>
        <p class="mt-5">{{ $article->content }}</p>
    </div>
</div>
@endsection

@section('sidebar')
<div class="col-md-4 offset-md-1 col-sm-12 bg-white p-4 h-100">
   <center> 
        <a href="/"> 
            <button class="btn btn-info text-white w-100">Kembali</button> 
        </a>
    </center>
</div>
@endsection