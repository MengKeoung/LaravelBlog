@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">New Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
