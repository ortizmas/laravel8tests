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
            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <th>Nome</th>
                        <th>Arquivo</th>
                    </thead>
                    <tbody>
                        @foreach ($uploads as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{ route('uploads.download', $item->file) }}" target="_blank"
                                    rel="noopener noreferrer">{{$item->file}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Lista de Videos
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($uploads as $item)
                <div class="col-md-4 mb-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        {{-- <iframe src="https://player.vimeo.com/video/261874912?color=ff9933" width="100%" height="250"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}
                        {{-- <iframe src="/uploads/{{$item->file}}" width="100%" height="250" frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}
                        {{-- pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4' --}}
                        @if ($item->type == 'video')
                        <video width="100%" poster="" controls>
                            <source src="/uploads/{{$item->file}}" type="video/mp4">
                            <source src="/uploads/{{$item->file}}" type="video/webm">
                            <source src="/uploads/{{$item->file}}" type="video/ogg">
                            <p>Seu navegador não têm compatibilidade com reprodução de vídeos.</p>
                        </video>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
