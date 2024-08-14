@extends('layouts.auth')

@section('title', 'Edit Post | Admin Dashboard')

@section ('style')
<link rel="stylesheet" href="{{ asset('assets/auth/css/multi_droupdown.css') }}style.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Select CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <!-- Masked Input -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Post</h2>
            </div>

            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="3" placeholder="Description">{{old('description', $post->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Is Publish</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1" @selected(old('status', $post->status) == 1)>Publish</option>
                            <option value="0" @selected(old('status', $post->status) == 0)>Draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" disabled {{ old('category', $post->category_id ?? '') === '' ? 'selected' : '' }}>Choose Option</option>

                            @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select id="tags" name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                            <option value="" disabled {{ empty(old('tags')) ? 'selected' : '' }}>Choose Option</option>

                            @if ($tags->isNotEmpty())
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>


                    <div class="form-group mb-2">
                        <label for="">Image</label>
                        <input type="file" name="file" value="{{ old('file') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>

                </form>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/auth/js/multi_droupdown.js') }}"></script>
@endsection
