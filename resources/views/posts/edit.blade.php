@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<h1>Edit Post</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Title</td>
            <td>
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}">
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <input class="form-control" type="text" name="description" value="{{ $post->description }}">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<div class="mb-3 text-center">
    <a class="btn btn-primary" href="{{ route('posts.index') }}">View All Posts</a>
    <a class="btn btn-secondary" href="{{ route('posts.create') }}">Create New Post</a>
  </div>
@endsection
