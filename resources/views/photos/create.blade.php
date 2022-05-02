<x-app-layout>
    <h1>写真投稿画面</h1>

    <form action="{{ route('photos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>ファイル<input type="file" name="filename" value="{{ old('filename') }}"></p>
        <p>
            @foreach($tags as $tag)
            <label>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
            </label>
            @endforeach
        </p>
        <input type="submit" value="登録する">
    </form>
</x-app-layout>