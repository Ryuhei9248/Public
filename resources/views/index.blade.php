@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach($posts as $post)
      <div class="card">
        <div class="card-header">{{ $post->user->name }}</div>
        <div class="card-body">
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text"><a href="{{ route('posts.show', $post->id) }}">詳細を見る</a></p>
          
          @auth
            <?php $bookmarkingUsers = $post->bookmarkingUsers?>
              @forelse($bookmarkingUsers as $bookmarkingUser)
                <!-- ユーザーがブックマークしていたら解除ボタンを表示してbreak-->
                @if($bookmarkingUser->id === Auth::id())
                    <form method="POST" action="{{ route('bookmarks.remove', $post->id) }}">
                      @csrf
                      <button type="submit" class="btn btn-danger">ブックマークを解除する</button>
                    </form>
                    @break
                @elseif($loop->last)
                  <form method="POST" action="{{ route('bookmarks.add', $post->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">ブックマークする</button>
                  </form> 
                @endif

                @empty
                <form method="POST" action="{{ route('bookmarks.add', $post->id) }}">
                      @csrf
                      <button type="submit" class="btn btn-success">ブックマークする</button>
                </form> 
              @endforelse 
          @endauth

          @if(Auth::id() === $post->user_id)
          <form method="POST" action="{{ route('posts.delete', $post->id) }}">
            @csrf
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
          @endif
        </div>
      </div>
    @endforeach


  </div>
@endsection
