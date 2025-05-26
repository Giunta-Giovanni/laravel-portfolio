@php
$allUri = [];
    foreach ($routes as $route) {
      foreach ($route as $uri) {
         $methods = implode(', ', $route->methods());
           if ($methods === "GET, HEAD") {   
            if (is_string($uri)) {
             array_push($allUri, $uri);
            }
         }
        
      }
   }
@endphp


@extends('layouts.projects')

@section('content')
<div class="container py-5 d-flex justify-content-center">
   <div style="width: 300px;"> 
      <h1 class="mb-4 text-center text-primary">Questa è la Home</h1>

      <ul class="list-group shadow text-center">
         @foreach ($allUri as $uri)
            <li class="list-group-item">
               <a href="{{ $uri }}" class="text-decoration-none text-dark d-block">
                  {{ $uri }}
               </a>
            </li>
         @endforeach
      </ul>
   </div>
</div>
@endsection