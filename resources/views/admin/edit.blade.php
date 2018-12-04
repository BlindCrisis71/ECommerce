@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $post['title'] }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input
                            type="text"
                            class="form-control"
                            id="price"
                            name="price"
                            value="{{ $post['price'] }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input
                            type="text"
                            class="form-control"
                            id="description"
                            name="description"
                            value="{{ $post['description'] }}">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $postId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection