@extends('layouts.wrapper', ['title' => 'Bülent Çakmak'])

@section('content')
    <div class="container-lg">

        @include('post.index.latest_posts')
        @include('post.index.liked_posts')

    </div>
@endsection
