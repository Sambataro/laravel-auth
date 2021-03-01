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
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->title}}</td>
                        <td><img src="{{ asset('storage/' . $post->image_path)}}" alt="" width="10%"></td>
                        <td>{{ $post->created_at->format('d-m-Y')}}</td> 
                        <td>
                            <a href="{{ route('admin.posts.show',$post->id) }}" class="btn btn-primary"> <i class="fas fa-info-circle"></i> </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                        </td>
                        <td>
                    <form action="{{ route('admin.posts.destroy', $post->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                        
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
