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
        <div class="container col-6 d-flex flex-column justify-content-center alig-items-center">
            <h1>{{$post->title }}</h1>
            <img src="{{asset('storage/' . $post->image_path)}}" class="img-thumbnail mt-5 mb-5" style="height: 400px" alt="">
            <p>{{$post->paragraph}}</p>
            <small>creato il: {{$post->created_at->format('d-m-Y')}}</small>
            <small>autore: {{$post->user->name}}</small>
        </div>
        </div>
@endsection
