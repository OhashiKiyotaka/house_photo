<x-app-layout>

    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <x-button type="submit">アップロード</x-button>
    </form>
    <ul class="">
        @foreach ($photos as $photo)
        <li class="">
            <a href="{{ $photo->photo_url }}">
                <img src="{{ $photo->photo_url }}" alt="Photo by {{ $photo->user->name }}" class="" />
            </a>
        </li>
        @endforeach
    </ul>


</x-app-layout>