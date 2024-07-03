@extends('layouts.app')

@section('content')


<body class=" justify-content-center align-items-center vh-100">
    <div class="container bg-white p-4 rounded shadow">
        <h1 class="text-center">Create a New Post</h1>
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
           @csrf   
        <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div>

            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="image">
            </div>
            <button type="submit" class="btn btn-outline-dark btn-block">Create Post</button>
        </form>
    </div>
</body>

@endsection

