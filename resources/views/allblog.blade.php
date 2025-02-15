@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"> {{ __('Blog - Welcome, ') }}{{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-3 d-flex justify-content-between">
                        <a href="{{ route('allblog') }}" class="btn btn-success">All Blogs</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Your Blog</a>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
