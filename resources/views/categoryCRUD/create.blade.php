@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Create New Category</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('categories.index') }}">Back</a>
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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <strong>User ID:</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="Category Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>  
    </form>
</div>
@endsection