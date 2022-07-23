@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Create New Article</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('articles.index') }}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <strong>Content:</strong>
                    <input type="text" name="content" class="form-control" placeholder="Content">
                </div>
                <div class="form-group">
                    <strong><label for="exampleFormControlFile1">Image</label></strong>
                    <input type="file" class="form-control" name="image" placeholder="Image">
                  </div>
                <div class="form-group">
                    <strong>User ID:</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="User ID">
                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    <select type="text" name="category_id" class="form-control" placeholder="Category">
                        <option value=""></option>
                        @foreach ($articles as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>  
    </form>
</div>
@endsection