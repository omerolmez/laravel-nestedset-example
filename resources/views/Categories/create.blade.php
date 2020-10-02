@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    @includeWhen($errors->any(), 'Elements.form_errors', compact($errors))

    <form method="post" action="{{ route('category.store') }}" class=" col-md-12">
        @csrf
        <div class="form-group">
            <label for="name">Parent Category</label>
            <x-TreeBuilder :categories="$categories" type="selectbox"/>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

