@extends('layouts.app')

@section('content')
    <div class="posts-container">
        @foreach ($posts as $post)
            <div class="post">
                @can('update', $post)
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('posts.edit', $post->id) }}">Edit <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn " onclick="return confirm('Are you sure you want to delete this post?');">delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                @endcan

                <div class="post-header">
                    <div class="avatar">
                        @if ($post->user->image == null)
                         <a href="{{route('profile.index', $post->user_id) }}"><img src="{{ asset('storage/images/default_avatar.png') }}" alt="Default User Avatar" class="rounded-circle" style="width: 40px;"></a>   
                        @else
                        <a href="{{route('profile.index', $post->user_id)}}"><img src="{{ asset('storage/' . $post->user->image) }}" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px;"></a>
                        @endif
                    </div>
                    <div class="name">{{ $post->user->name }}</div>
                </div>
                <div class="main-content">
                    <div class="photo">
                        <h4>{{ $post->title }}</h4>
                        @if ($post->image)
                            <div>
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Post Image">
                            </div>
                        @endif
                    </div>
                    <div class="comments-section">
                        <div>Your comment:</div>
                        <form action="{{ route('comment.store', $post->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="write your comment...">
                            <button type="submit" class="btn btn-outline-dark btn-block">Send</button>
                        </form>
                        <div>Other comments:</div>
                        @foreach ($post->comments->take(-3) as $comment)
                            <div class="comment">
                                <div class="comment-avatar">
                                    @if ($comment->user->image == null)
                                    <a href="{{route('profile.index', $post->user_id) }}"><img src="{{asset('storage/images/default_avatar.png') }}" alt="Default User Avatar" class="rounded-circle" style="width: 25px;"></a>
                                    @else
                                    <a href="{{route('profile.index', $post->user_id) }}"><img src="{{ asset('storage/' . $comment->user->image) }}" alt="User Avatar" class="rounded-circle" style="width: 25px; height: 25px;"></a>
                                    @endif
                                </div>
                                <div class="comment-text">{{ $comment->user->name }}: {{ $comment->content }} </div>
                            </div>
                        @endforeach
                        <a href="{{ route('comment.show', $post->id) }}"><button type="submit" class="btn btn-outline-dark btn-block"> Show More</button></a>
                    </div>
                </div>
                <div class="content">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="tags">
               
                    @foreach ($post->tags as $tag )
                   
                     <a href= "{{route('tag.index', $tag->id)}}">#{{ $tag->title }} </a>
                  
                    @endforeach
              
                </div>
                <button type="submit" class="btn btn-outline-dark btn-block">Like</button>
            </div>
        @endforeach
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
@endsection
