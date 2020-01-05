@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Category Create</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.edit-form', $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
