@extends('layouts.projects')

@section('title', "Aggiungi un projects")

@section('content')

<form action="{{ route('projects.store') }}" method="POST" class="container mt-4 p-4 border rounded shadow-sm bg-light">
    {{-- token di protezione che identifica che la chiamata post avvenga tramite un form del sito stesso --}}
    @csrf

    {{-- titolo --}}
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    {{-- cliente --}}
    <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" name="client" id="client" class="form-control" required>
    </div>

    {{-- start date --}}
    <div class="mb-3">
        <label for="start_date" class="form-label">Data Inizio</label>
        <input type="date" name="start_date" id="start_date" class="form-control">
    </div>

    {{-- end date --}}
    <div class="mb-3">
        <label for="end_date" class="form-label">Data Fine</label>
        <input type="date" name="end_date" id="end_date" class="form-control">
    </div>

    {{-- stato progetto --}}
    <div class="mb-3">
        <label for="state" class="form-label">Stato Progetto</label>
        <select id="state" name="state" class="form-select">
            <option value="completed">Completato</option>
            <option value="in_progress">In Corso</option>
        </select>
    </div>
    @dump($types)
    

    {{-- tipo di progetto --}}
    <div class="mb-3">
        <label for="type" class="form-label">Progetto utilizzato</label>
        <select id="type" name="type" class="form-select">
            @foreach ($types as $type)
                <option value={{$type->id}}>{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    {{-- descrizione --}}
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" class="form-control" rows="5"></textarea> 
    </div>

    {{-- pulsante per inviare il progetto --}}
    <div class="text-end">
        <input type="submit" value="Salva" class="btn btn-primary"></button>
    </div>
</form>

@endsection