@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Il mio blog</h1>
        
         
        @foreach ($posts as $post)
         <div class="card">
             <div class="card-header">
                <h2>{{$post->title}}</h2>
             </div>

             <div class="card-body">
                <p>{{$post->paragraph}}</p>
             </div>
         </div>
             
         @endforeach
    </div>
</div>
@endsection
