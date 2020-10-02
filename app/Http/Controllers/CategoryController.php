<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Faker\Factory;

class CategoryController extends Controller
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

        return view('Categories.index', compact(['categories']));
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

        return view('Categories.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category' => 'nullable|integer',
        ]);

        Category::create([
            'name' => request('name'),
            'parent_id' => request('category')
        ]);

        return redirect()
            ->back()
            ->with('message', 'Category successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::whereNotDescendantOf($id)
            ->get()
            ->toTree();

        $category = Category::select(['id', 'name', 'parent_id'])
            ->find($id);

        if (!isset($category->id)) {
            abort(404);
        }

        return view('Categories.edit', compact(['categories', 'category']));
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
            'id' => 'required|exists:categories',
            'name' => 'required|max:255',
            'category' => 'nullable|integer',
        ]);

        Category::find(request('id'))
            ->update([
            'name' => request('name'),
            'parent_id' => request('category')
        ]);

        return redirect()
            ->back()
            ->with('message', 'Category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)
            ->delete();

        return redirect()
            ->back()
            ->with('message', 'Category successfully deleted!');;
    }
}
