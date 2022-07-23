@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Edit Article</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('articles.index')}}">Back</a>
        </div>
    </div>    
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update',$articles->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value={{$articles->title}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Content</strong>
                    <input type="text" name="content" class="form-control" placeholder="Content" value={{$articles->content}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Image</strong>
                    <input type="file" name="image" class="form-control" placeholder="Image" value={{$articles->image}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>User ID</strong>
                    <input type="input" name="user_id" class="form-control" placeholder="User ID" value={{$articles->user_id}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Category</strong>
                    <input type="input" name="category_id" class="form-control" placeholder="Category" value={{$articles->category_id}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection