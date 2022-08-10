<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_all',compact('category'));
    }

    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('category.all');
    }

    public function CategoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $category_id = $request->id;
        Category::find($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect()->route('category.all');
    }

    public function CategoryDelete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.all');
    }
}
