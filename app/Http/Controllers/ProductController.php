<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get()
            ->toTree();

        $products = Product::when(request('category_id'), function($q) {
                $descendantAndSelf = Category::whereDescendantOrSelf(request('category_id'))->pluck('id');
                $q->whereIn('category_id', $descendantAndSelf);
            })
            ->paginate(60);

        return view('Products.index', compact(['categories', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()
            ->toTree();
        return view('Products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'integer|exists:categories,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => request('category')
        ]);

        return redirect()
            ->back()
            ->with('message', 'Product successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get()
            ->toTree();
        $product = Product::select(['id', 'name', 'category_id', 'price'])
            ->find($id);

        if (!isset($product->id)) {
            abort(404);
        }
        return view('Products.edit', compact(['categories', 'product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:products',
            'category' => 'integer|exists:categories,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        Product::find(request('id'))
            ->update([
                'name' => request('name'),
                'price' => request('price'),
                'category_id' => request('category')
            ]);

        return redirect()
            ->back()
            ->with('message', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)
            ->delete();

        return redirect()
            ->back()
            ->with('message', 'Product successfully deleted!');;
    }
}
