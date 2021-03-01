@extends('layouts.app')

@section('content')
<div class="container">
        <h1>modifica post</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="paragraph">Testo del post</label>
                <textarea class="form-control " name="paragraph" id="paragraph" name="paragraph" value="{{$post->paragraph}}" rows="20"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Immagine del post</label>
                <input class="form-control" type="file" name="image_path" id="image_path" accept="image/*" value="{{$post->image_path}}">           
             </div>
            <input class="form-control" type="submit" class="btn btn-primary">
        </form>
        </div>
@endsection
