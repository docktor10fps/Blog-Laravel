@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center">
                
                @if ($user->image == null)
                    <img src="{{ asset('storage/images/default_avatar.png') }}" class="rounded-circle mr-3" alt="avatar" style="width: 100px; height: 100px;">
                @else
                    <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle mr-3" alt="avatar" style="width: 100px; height: 100px;">
                @endif

                <div>
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="card-text">Followers: 12 millions</p>

                    <!-- Контейнер для кнопок -->
                    <div class="d-flex">
                        @can('isOwner', $user)
                            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-outline-dark mr-2">Edit</a>
                            <button class="btn btn-outline-dark mr-2">Logout</button>
                            <form action="{{ route('profile.destroy', $user->id) }}" method="POST" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-dark mr-2" onclick="return confirm('Ви впевнені, що хочете видалити цей профіль?');">Delete</button>
                            </form>
                        @else
                            <button class="btn btn-outline-dark mr-2">Follow</button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="#">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="post image">
                    </a>
                    <div class="card-body">
                        <p class="card-text">title</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
