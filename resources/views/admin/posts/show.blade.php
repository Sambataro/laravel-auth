@extends('layouts.app')

@section('content')
<div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif
        <div class="container col-6">
            <h1>dettaglio del post: {{$post->title }}</h1>
            <img src="{{asset('storage/' . $post->image_path)}}" alt="">
            <p>{{$post->paragraph}}</p>
            <small>creato il: {{$post->created_at->format('d-m-Y')}}</small>
            <small>autore: {{$post->user->name}}</small>
        </div>
        </div>
@endsection
