@extends('layouts.projects')

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

        <div class="d-flex py-4">
            {{-- pulsante modifica --}}
            <a href="{{route('projects.edit', $project)}}" class="btn btn-warning">Modifica</a>

            {{-- redirect camuffato mission impossible --}}
            {{-- inseriamo un modale per far respirare l'utente --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>

        </div>
    </div>
</div>
            <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare il Post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    
                    {{-- pulsante destroy --}}
                    <form action="{{route('projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Elimina progetto">
                    </form>
          
                </div>
                </div>
            </div>
        </div>
@endsection