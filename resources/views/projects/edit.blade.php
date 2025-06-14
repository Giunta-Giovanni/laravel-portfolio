@extends('layouts.projects')

@section('title', "Modifica un projects")

@section('content')

<form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data"  class="container mt-4 p-4 border rounded shadow-sm bg-light">
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

    {{-- inserimento di un file --}}
    <div class="mb-3">
        <label for="file" class="form-label">Inserisci l'immagine di copertina</label>
        <input type="file" name="image" id="file" class="form-control">
                @if ($project->image)
                
            <img src="{{asset('storage/'.$project->image)}}" class="w-25" alt="">
        @endif
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

   {{-- tecnologie usate --}}
<div class="mb-3 form-control">
    <div class="row">

        @foreach ($technologies as $technology)
            <div class="col-md-3">
                <div class="form-check mb-2">

                    <input 
                        type="checkbox" 
                        name="technologies[]" 
                        value="{{ $technology->id }}" 
                        {{-- condizione per controllare se è attiva o no la checkbox --}}
                        {{$project->technologies->contains($technology->id)?'checked':''}}
                        id="technology-{{ $technology->id }}" 
                        class="form-check-input"
                    >

                    <label 
                        for="technology-{{ $technology->id }}" 
                        class="form-check-label"
                    >
                    {{$technology->name}}
                    </label>

                </div>
            </div>
        @endforeach
    </div>
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