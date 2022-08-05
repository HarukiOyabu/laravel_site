@extends('layouts.logged_in')

@section('title',$title)

@section('content')

<main>
    <form method="POST"  action="{{route('post.store')}}" enctype="multipart/form-data" class="post_create">
        @csrf


        <div>
             <label>Title<br>
                 <input type="text" name = "title" >
            </label>
        </div>

        <div>
             <label>Description<br>
                <textarea name="description" class="post_description"></textarea>
                
            </label>
        </div>


         <div>
            <label>画像を選択<br>
                <input type="file" name="image">
             </label>
        </div>
        <input type="submit" value="post" >
        <a href="{{route('auth.index')}}" class="back">Back</a>

    </form>

    <section class="posts_list">
        @forelse($posts as $post)
        <section>
            <div class="post_list_photo">
                @if($post->image !== '')
                <img src="{{asset('storage/'. $post->image)}}">
                @else
                @endforelse
            </div>
            <div class="post_list_info">
                <div class="post_list_text">
                    <p>{{$post->title}}</p>
                    <p>{{$post->description}}</p>
                </div>
                <div class="post_list_form">
                    <form method="post" action="{{route('post.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="投稿を削除">
                    </form>
                    <a href="{{route('post.edit', $post->id)}}" class="edit">編集</a>
                </div>

            </div>

        </section>
        @empty
        <p>投稿はありません</p>
        @endforelse
</section>



</main>

@endsection