<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('admin.categorie');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.shocat', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.catedit', compact('category'));
    }
    


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }

   

}
