@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    @includeWhen($errors->any(), 'Elements.form_errors', compact($errors))

    <form method="post" action="{{ route('product.store') }}" class=" col-md-12" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Product Category</label>
            <x-TreeBuilder :categories="$categories" type="selectbox"/>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Product name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
