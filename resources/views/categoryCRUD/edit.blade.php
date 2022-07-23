@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Edit Category</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('categories.index')}}">Back</a>
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

    <form action="{{ route('categories.update',$categories->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Category Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value={{$categories->name}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>User ID</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="User ID" value={{$categories->user_id}}>
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