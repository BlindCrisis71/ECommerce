@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">E-Commerce Shop</p>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="post-title">{{ $post->title }}</h1>
                <p><b>Price:</b> ${{ $post->price }}</p>
                <p><b>Description:</b> {{ $post->description }}</p>
                <p><a href="{{ route('blog.post', ['id' => $post->id]) }}">Buy Now</a></p>
                <br><hr>
            </div>
        </div>
        <hr>
        @endforeach
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

