@extends('layouts.app')

@section('content')
<div class="container">
        <h1>crea nuovo post</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title')}}">
            </div>
            <div class="form-group">
                <label for="paragraph">Titolo</label>
                <textarea class="form-control " name="paragraph" id="paragraph" value="{{ old('paragraph')}}" rows="20"></textarea>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
        </div>
@endsection
