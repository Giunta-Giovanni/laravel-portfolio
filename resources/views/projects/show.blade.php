@extends('layouts.app')

@section('content')
<div class="container pt-5">

    <div class="card shadow-sm p-4 mb-4 ">
        <h1 class="mb-3 text-primary">{{ $project->title }}</h1>
        <span><a href={{route("projects.index")}}>torna indietro</a></span>

        <div class="mb-3 ">
            <span class="badge bg-info text-dark me-2">{{ ucfirst($project->state) }}</span>
            <span class="fw-semibold">Cliente:</span> {{ $project->client }}
        </div>

        <div class="d-flex flex-wrap gap-3 mb-4">
            <div>
                <strong>Data di inizio:</strong>
                <time datetime="{{ $project->start_date }}">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</time>
            </div>
            <div>
                <strong>Data di fine:</strong>
                <time datetime="{{ $project->end_date }}">{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</time>
            </div>
        </div>

        <h3 class="mb-3">Descrizione progetto</h3>
        <p class="text-muted">{{ $project->description }}</p>
    </div>
</div>
@endsection