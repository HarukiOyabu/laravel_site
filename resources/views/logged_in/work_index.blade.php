@extends('layouts.logged_in')

@section('title',$title)

@section('content')
<main>
    <form method="POST" action="" enctype="multipart/form-data" class="work_create">
        @csrf

        <div>
            <label>Title<br>
                <input type="text" name="title">
            </label>
        </div>

        <div>
            <label>Description<br>
                <textarea name="description" class="work_description"></textarea>
            </label>
        </div>

        <div>
            <label>URL<br>
                <input type="text" name="url">
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


    <section class="works_list">
        @forelse($works as $work)
        <section>
            <div class="work_list_photo">
                @if($work->image !== '')
                <a href="{{$work->url}}"><img src="{{asset('storage/'. $work->image)}}"></a>
                @else
                @endforelse
            </div>
            <div class="work_list_info">
                <div class="work_list_text">
                    <p>{{$work->title}}</p>
                    <p>{{$work->description}}</p>
                </div>
                <div class="work_list_form">
                    <form method="post" action="{{route('work.destroy', $work->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="投稿を削除">
                    </form>
                    <a href="{{route('work.edit', $work->id)}}" class="edit">編集</a>
                </div>

            </div>

        </section>
        @empty
        <p>制作物はありません</p>
        @endforelse
</section>






</main>



@endsection