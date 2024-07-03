@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($posts as $post)
                        <!-- Post 1 -->
                        <div class="post mb-4 p-3 bg-light d-flex flex-column flex-md-row">
                            <div class="post-details flex-grow-1">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="user-avatar">
                                        @if ($post->user->avatar == null)
                                            <img src="{{ asset('storage/images/default_avatar.png') }}" alt="Default User Avatar" class="rounded-circle" style="width: 40px;">
                                        @else
                                            <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="User Avatar" class="rounded-circle" style="width: 40px;">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="mb-0">{{ $post->user->name }}</h5> <!-- Assuming you have a relationship to get user's name -->
                                    </div>
                                </div>
                                <h4>{{ $post->title }}</h4>
                                @if ($post->image)
                                    <div>
                                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Post Image">
                                    </div>
                                @endif
                                <p>{{ $post->content }}</p>
                            </div>
                            <div class="col-md-auto mt-3 mt-md-0 ml-md-auto">
                                <div class="mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary mb-2">Like</button>
                                    <button class="btn btn-sm btn-secondary">Comment</button>
                                </div>
                                <!-- Comments Section -->
                                <div class="rounded bg-light p-3 mt-3">
                                    <div class="comment mb-3 border-bottom">
                                        <p>Comment 1</p>
                                    </div>
                                    <div class="comment mb-3 border-bottom">
                                        <p>Comment 2</p>
                                    </div>
                                </div>
                                <!-- End Comments Section -->
                            </div>
                        </div>
                        <!-- End Post 1 -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
