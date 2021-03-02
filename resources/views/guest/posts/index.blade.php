@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Il mio blog</h1>
    <div class="card-deck">
        @foreach ($posts as $post)
         <div class="card mt-5 mb-5">
             <div class="card-header ">
                <h5 class="card-title"  ">{{$post->title}}</h2>
                
             </div>
             <div class="card-body">
                 <img class="" src="{{ asset('storage/' . $post->image_path)}}" alt="" style="width: 150px; height: 150px">
            </div>
            <a href="{{ route('posts.show',$post->slug) }}" class="btn btn-primary justify-content-center" style="width: 50%"> Leggi </a>
         </div>
         @endforeach
    </div>
</div>
@endsection
