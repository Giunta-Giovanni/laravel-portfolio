@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center g-3">

            @foreach ($projects as $project)

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$project->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$project->client}}</h6>
                            <p class="card-text">
                            <strong>Start:</strong> {{$project->start_date}} <br>
                            <strong>End:</strong> {{$project->end_date}}
                            </p>
                            <div class="badge bg-info text-dark">{{$project->state}}</div>
                            <span><a href={{route("projects.show", $project->id)}}>clicca qui</a></span>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection



