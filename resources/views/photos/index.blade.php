<x-app-layout>
    <h1>写真一覧画面</h1>
    <p><a href="{{ route('photos.create') }}">新規追加</a></p>

    @if ($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <table border="1">
        <tr>
            <th>title</th>
            <th>tag</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($photos as $photo)
        <tr>
            <td>{{ $photo->title }}</td>
            <td>
                @foreach ($photo->tags as $tag)
                <a href="{{ route('tag.show',$tag->id)}}">{{ $tag->name }}</a>
                @endforeach
            </td>
            <td><a href="{{ route('photos.edit',$photo->id)}}">編集</a></td>
            <td>
                <form action="{{ route('photos.destroy', $photo->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="" value="削除">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>