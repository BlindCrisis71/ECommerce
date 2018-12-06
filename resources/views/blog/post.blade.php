@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $post->title }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><b>Price:</b> ${{ $post->price }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><b>Description:</b> {{ $post->description }}</p>
        </div>
    </div>
@endsection

