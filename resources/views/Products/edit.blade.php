@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    @includeWhen($errors->any(), 'Elements.form_errors', compact($errors))

    <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}" class=" col-md-12" novalidate>
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ request()->segment(2) }}">
        <div class="form-group">
            <label for="name">Product Category</label>
            <x-TreeBuilder :categories="$categories" type="selectbox" :parentId="$product->category_id"/>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Product name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" step="any" inputmode="decimal" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

