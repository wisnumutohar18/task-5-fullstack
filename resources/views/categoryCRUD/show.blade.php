@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Show Category</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('categories.index')}}">Back</a>
        </div>
    </div>    
    

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category ID:</strong>
                {{ $categories->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                {{ $categories->name }}
            </div>
        </div>
    </div>
</div>
@endsection