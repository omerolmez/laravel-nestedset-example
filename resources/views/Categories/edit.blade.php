@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    @includeWhen($errors->any(), 'Elements.form_errors', compact($errors))

    <form method="post" action="{{ route('category.update', ['category' => $category->id]) }}" class=" col-md-12">

        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ request()->segment(2) }}">
        <div class="form-group">
            <label for="name">Parent Category</label>
            <x-TreeBuilder :categories="$categories" type="selectbox" :parentId="$category->parent_id" :selected="$category->id" />
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

