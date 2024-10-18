@extends('layouts.app')

@section('title', 'sd')

@section('content')
<h1 class="text-center mb-4">Index Page</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>
                <div class="d-flex">
                    <a class="btn btn-success me-2" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">SoftDelete</button>
                    </form>
                </div>
            </td> 
        </tr>
        @endforeach        
    </tbody>
  </table>
  <div class="mb-3 text-center">
    <a class="btn btn-primary" href="{{ route('posts.show') }}">Archived</a>
    <a class="btn btn-secondary" href="{{ route('posts.create') }}">Create New Post</a>
  </div>
@endsection