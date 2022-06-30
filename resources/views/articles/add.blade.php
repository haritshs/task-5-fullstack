@extends('master')
 
@section('title', 'Menambah Artikel')
 
@section('main')
<div class="col-md-8 col-sm-12 bg-white p-4">
    <form method="post" action="/add_process">
    @csrf
        <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" class="form-control" name="title" placeholder="Judul artikel">
        </div>
        <div class="form-group">
            <label>Isi Artikel</label>
            <textarea class="form-control" name="content" rows="15"></textarea>
        </div>
        <div class="form-group">
            <label>Upload Gambar</label>
            <input type="file" name="image" class="file-hidden" accept="image/*" class="form-control-file">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Pilih Kategori</option>
                <option value="1">Kesehatan</option>
                <option value="2">Ekonomi</option>
                <option value="3">Teknologi</option>
            </select>
        </div>
        <div class="col-md-3 ml-md-5 col-sm-12 bg-white" style="height:120px !important">
            <div class="form-group">
                <label>Upload</label>
                <input type="submit" class="form-control btn btn-primary" value="Upload">
            </div>
        </div>
    </form>
</div>
@endsection