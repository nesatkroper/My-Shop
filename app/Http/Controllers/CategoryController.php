<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cate = Category::all();
        return view('category', compact(['cate']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'code' => 'cate00' . $request->code
        ]);

        return redirect()->back();
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        $cate = Category::findOrFail($id);
        $cate->update([
            'name' => $request->name,
            'code' => $request->code
        ]);
        return redirect()->back()->with('success', 'Category update successfully');
    }

    public function destroy(string $id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->back()->with('success', 'Category destroy successfully');
    }
}
