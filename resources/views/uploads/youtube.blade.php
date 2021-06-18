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
            @if (session('success'))
            <div class="alert alert-success">
                {{ $success }}
            </div>
            @endif

            <form action="{{ route('youtube.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="file">Subir arquivos</label>
                    <input id="file" class="form-control" type="file" name="video">
                </div>

                <button class="btn btn-success mt-2 btn-md" type="submit">Subir</button>
            </form>

            <div class="row">
                <div class="col-md-6">
                    <div class="card text-left">
                        <div class="embed-responsive embed-responsive-16by9">
                            {{-- allownetworking="internal" --}}
                            {{-- <iframe width="100%" height="300"
                                src="https://www.youtube.com/embed/TCeyIwFGkYo?list=RDCMUCrWvhVmt0Qac3HgsjQK62FQ"
                                title="YouTube video player" allownetworking="internal" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe> --}}
                            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/3hng-hmSv2Y"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen allownetworking="internal"></iframe>

                            <br>
                            <iframe src="https://player.vimeo.com/video/261874912?color=ff9933" width="560" height="315"
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Nome do Video</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script>
    addEvent(window,"load",inicializarEventos,false);

    function inicializarEventos() {
        var obj = document.getElementById("tutube");
        addEvent(obj,"click",evento,false);
    }

    function evento(e) {
    if(window.event) {
        return false;
    }
    else
        if(e) {
            e.preventDefault();
        }
    }
</script> --}}
@endsection
