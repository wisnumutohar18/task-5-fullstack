@extends('home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Article</h2>
        </div>
        <div>
            <a class="btn btn-warning" href="{{ route('articles.create') }}"> Create a New article</a>
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
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>User ID</th>
            <th>Category</th>
            <th width="200px" class="text-center">Action</th>
        </tr>
        @if(count($articles))
        @foreach ($articles as $article)
        <tr>
            <td class="text-center">{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->content}}</td>
            <td>{{$article->image}}</td>
            <td>{{$article->user_id}}</td>
            <td>{{$article->name}}</td>
            <td class="text-center">
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('articles.show',$article->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('articles.edit',$article->id) }}">Edit</a>

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