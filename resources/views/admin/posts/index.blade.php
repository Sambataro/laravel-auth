@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>i miei post</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITOLO</th>
                    <th>IMMAGINE</th>
                    <th>DATA CREAZIONE</th>
                    <th colspan='3'></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id}}</th>
                        <th>{{ $post->title}}</th>
                        <th><img src="{{ asset('storage/' . $post->image_path)}}" alt="" width="10%"></th>
                        <th>{{ $post->created_at->format('d-m-Y')}}</th> 
                        
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
