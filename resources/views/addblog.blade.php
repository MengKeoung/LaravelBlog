@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Blog') }}</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Categories</option>
                            <option value="1">Travel</option>
                            <option value="2">Food</option>
                            <option value="2">Lifestyle</option>
                            <option value="3">News</option>
                            <option value="3">Technology</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
