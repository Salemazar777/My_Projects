<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
class ProductController extends Controller
{
    public function ProductAll()
    {
        $product = Product::latest()->get();
        return view('backend.product.product_all',compact('product'));
    }

    public function ProductAdd()
    {
        $unit     = Unit::all();
        $category = Category::all();
        $supplier  = Supplier::all();
        return view('backend.product.product_add',compact('unit','category','supplier'));
    }

    public function ProductStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'supplier' => 'required',
            'unit' => 'required',
            'category' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'supplier_id' => $request->supplier,
            'unit_id' => $request->unit,
            'category_id' => $request->category,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('product.all');
    }

    public function ProductEdit($id)
    {
        $unit     = Unit::all();
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::find($id);
        return view('backend.product.product_edit',compact('product','unit','category','supplier'));
    }

    public function ProductUpdate(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'supplier' => 'required',
            'unit' => 'required',
            'category' => 'required|string',
        ]);
        $product_id = $request->id;
        Product::find($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier,
            'unit_id' => $request->unit,
            'category_id' => $request->category,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect()->route('product.all');
    }

    public function ProductDelete($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.all');
    }
}
