{{-- resources/views/posts/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit </h1>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content', $comment->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection
