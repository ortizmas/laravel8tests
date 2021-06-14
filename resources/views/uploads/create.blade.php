@extends('layouts.default')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Uploads
        </div>
        <div class="card-body">
            <form action="{{ route('uploads.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Subir arquivos</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="file">Subir arquivos</label>
                    <input id="file" class="form-control" type="file" name="file">
                </div>

                <button class="btn btn-success mt-2 btn-md" type="submit">Subir</button>
            </form>
        </div>
    </div>
</div>
@endsection
