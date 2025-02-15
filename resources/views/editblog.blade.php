@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Blog') }}</div>
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Laravel requires PUT for updates --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id" required>
                                <option selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $blog->content }}</textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{ route('home') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Repost</button>
                        </div>
                        
                    </form>                    
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
