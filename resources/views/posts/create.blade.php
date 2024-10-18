@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Create Post</h1>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter The Title" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="desc">Description</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="title" name="description" placeholder="Enter The Title" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="mb-3 text-center">
        <a class="btn btn-primary" href="{{ route('posts.index') }}">View All Posts</a>
        <a class="btn btn-secondary" href="{{ route('posts.create') }}">Create New Post</a>
    </div>
</div>
@endsection
