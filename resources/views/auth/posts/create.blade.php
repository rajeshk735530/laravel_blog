@extends('layouts.auth')

@section('title', 'Creater Post | Admin Dashboard')

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
                    <h2>Create Post</h2>
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

                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Is Publish</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Choose Option</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" class="form-control">

                                <option value="" disabled selected>Choose Option</option>
                                
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select id="tags" name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                                
                                <option value="" disabled selected>Choose Option</option>
                                
                                @if (count($tags) > 0)
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="">Image</label>
                            <input type="file" name="file" value="{{ old('file') }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-2" >Submit</button>

                    </form>
                </div>
            </div>

        </div>

    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/js/multi_droupdown.js') }}"></script>
@endsection