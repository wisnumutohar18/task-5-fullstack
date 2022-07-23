@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Category</h2>
        </div>
        <div>
            <a class="btn btn-warning" href="{{ route('categories.create') }}"> Create a New Category</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Category</th>
            <th width="200px" class="text-center">Action</th>
        </tr>
        @if(count($categories))
        @foreach ($categories as $category)
        <tr>
            <td class="text-center">{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td class="text-center">
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('categories.show',$category->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td align="center" colspan="3">Empty Data!! Have a nice day :)</td>
        </tr>
        @endif
    </table>
</div>
@endsection