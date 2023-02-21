@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-5">
            <div class="card-header text-center">
                <h5 class="card-title">{{ $project->title }}</h5>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <p class="card-text text-center">{{ $project->content }}</p>
                <hr>
                <p class="card-text text-center">
                    <small class="text-muted">Author: {{ $project->author }}</small><br>
                    <small class="text-muted">Posted on: {{ $project->project_date }}</small>
                </p>
                <a href="" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
