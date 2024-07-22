@extends('layouts.app')

@section('content')
@foreach($comments as $comment)
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> {{-- Збільшуємо ширину колонки до 8 --}}
                <div class="card mb-4"> {{-- Додаємо відступ між картками з класом mb-4 --}}
                    <div class="card-body text-center">
                        <div class="comment-avatar">
                            @if ($comment->user->avatar == null)
                                <img src="{{ asset('storage/images/default_avatar.png') }}" alt="Default User Avatar" class="rounded-circle" style="width: 25px;">
                            @else
                                <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="User Avatar" class="rounded-circle" style="width: 25px;">
                            @endif
                        </div>
                        <h5 class="card-title text-black">{{ $comment->user->name }}:</h5>
                        <p class="card-text text-black">{{ $comment->content }}</p>
                        
                        <div>
                        <div class="d-flex">
                            <a href="#" class="btn btn-outline-dark mr-2">Like</a>
                            @can('update', $comment)
                            
                            <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-outline-dark mr-2">Edit</a>
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-dark mr-2" onclick="return confirm('Ви впевнені, що хочете видалити цей пост?');">Видалити</button>
                                </form>
                                </div>
                            @endcan
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
