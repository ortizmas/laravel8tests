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
</div>
@endsection
