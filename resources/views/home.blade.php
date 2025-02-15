@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">    {{ __('Blog - Welcome, ') }}{{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ route('addblog') }}" class="btn btn-primary">Add Blog</a>
                    </div>    
                </div>
            </div>

            <h1>Blog Posts</h1>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Post By</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key => $blog)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $blog->post_by }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->category->name }}</td>
                <td>{{ Str::limit($blog->content, 50) }}</td> 
                <td>{{ $blog->created_at}}</td>
                <td>{{ $blog->updated_at}}</td>
                <td>
                    <a href="{{ route('editblog', $blog->id) }}" class="btn btn-primary">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $blog->id }}">
                        Delete
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this blog post?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- Delete form -->
                                    <form action="{{ route('deleteblog', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
