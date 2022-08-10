<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));

    }

    public function SupplierAdd()
    {
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        Supplier::create([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            
        ]);
        return redirect()->route('supplier.all');

    }

    public function SupplierEdit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));   
    }

    public function SupplierUpdate(Request $request)
    {
        $supplier_id = $request->id;
        $request->validate([
            'name' => 'required|string',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);
        Supplier::find($supplier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            
        ]);
        return redirect()->route('supplier.all');
    }

    public function SupplierDelete($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('supplier.all');
    }
}
