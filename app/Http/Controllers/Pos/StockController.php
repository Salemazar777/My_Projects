<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;

class StockController extends Controller
{
    public function StockReport()
    {
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock_report',compact('allData'));
    }

    public function StockReportPdf()
    {
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData'));
    }

    public function StockSupplierWise()
    {
        $suppliers = Supplier::all();
        $category = category::all();
        return view('backend.stock.supplier_product_wise_report',compact('suppliers','category'));
    }

    public function SupplierWisePdf(Request $request)
    {
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        return view('backend.pdf.supplier_wise_report_pdf',compact('allData'));
    }

    public function ProductWisePdf(Request $request)
    {
        $product = Product::where('id',$request->product_id)->where('category_id',$request->category_id)->first();
        return view('backend.pdf.product_wise_report_pdf',compact('product'));
    }
}
