@extends('layouts.projects')

@section('title', "Modifica un projects")

@section('content')

<form action="{{ route('projects.update', $project) }}" method="POST" class="container mt-4 p-4 border rounded shadow-sm bg-light">
    {{-- token di protezione che identifica che la chiamata post avvenga tramite un form del sito stesso --}}
    @csrf

    {{-- identifichiamo il metodo put --}}
    @method('PUT')

    {{-- titolo --}}
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control" value={{$project->title}}   required>
    </div>

    {{-- cliente --}}
    <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" name="client" id="client" class="form-control"value={{$project->client}}  required>
    </div>

    {{-- start date --}}
    <div class="mb-3">
        <label for="start_date" class="form-label">Data Inizio</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value={{$project->start_date}} >
    </div>

    {{-- end date --}}
    <div class="mb-3">
        <label for="end_date" class="form-label">Data Fine</label>
        <input type="date" name="end_date" id="end_date" class="form-control" value={{$project->end_date}} >
    </div>

    {{-- stato progetto --}}
    <div class="mb-3">
        <label for="state" class="form-label">Stato Progetto</label>
        <select id="state" name="state" class="form-select" value={{$project->state}} >
            <option value="completed">Completato</option>
            <option value="in_progress">In Corso</option>
        </select>
    </div>

        {{-- tipo di progetto --}}
    <div class="mb-3">
        <label for="type" class="form-label">Tipo di progetto</label>
        <select id="type" name="type" class="form-select">
            @foreach ($types as $type)
                <option value={{$type->id}} {{$project->type_id == $type->id? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    {{-- descrizione --}}
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" class="form-control" rows="5">
            {{$project->description}}
        </textarea> 
    </div>

    {{-- pulsante per inviare il progetto --}}
    <div class="text-end">
        <input type="submit" value="Salva" class="btn btn-primary"></button>
    </div>
</form>

@endsection