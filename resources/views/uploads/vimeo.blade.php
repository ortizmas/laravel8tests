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
            <a class="btn btn-info btn-sm float-right" href="{{ route('uploads.create') }}">Create</a>
        </div>
        <div class="card-body">

            <form action="{{ route('vimeo.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Subir arquivos</label>
                    <input id="file" class="form-control" type="file" name="file">
                </div>

                <button class="btn btn-success mt-2 btn-md" type="submit">Subir</button>
            </form>

            {{-- <div class="row">
                @foreach ($videos['body']['data'] as $video)
                <div class="col-md-6">
                    <div class="card text-left">
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $video['embed']['html'] !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $video['name']}}</h4>
        </div>
    </div>
    @endforeach
</div> --}}
</div>
</div>
</div>
@endsection
