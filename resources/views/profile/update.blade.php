{{-- resources/views/posts/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="name" id="title" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

      
        <div class="form-group">
            <label for="image">avatar</label>
            @if ($user->image)
                <div>
                    <img src="{{ asset('storage/' . $user->image) }}"  style="width: 100px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
