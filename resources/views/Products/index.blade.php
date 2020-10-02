@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    <x-TreeBuilder :categories="$categories" type="listForProducts"/>
    <div class="col-md-8">
        <div class="alert alert-info" role="alert">
            <h5>Total Product: {{ $products->total() }}</h5>
            <h5>Total Page: {{ $products->lastPage() }}</h5>


        </div>
        <div class="row ">
        @foreach ($products as $item)
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://via.placeholder.com/250x220/FFB6C1/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                {{ $item->name }}
                            </a>
                        </h4>
                        <p class="price">{{ numberFormat($item->price) }} USD</p>
                        <p class="d-inline">
                            <a href="{{ route('product.edit', ['product' => $item->id]) }}" class="btn btn-sm btn-outline-primary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>

                            <form method="post" class="d-inline" action="{{ route('product.destroy', ['product' => $item->id]) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </button>
                            </form>
                        </p>
                    </div>
                </section>
            </div>
        @endforeach


        </div>
        @if (sizeof($products) <= 0)

            <div class="alert alert-warning col-md-12">
                Product not found!
            </div>
        @endif

        <div class="d-flex justify-content-center pt-5">
            {!! $products->links() !!}
        </div>

    </div>
@endsection


