<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
class PortfolioController extends Controller
{
    //
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required',
        ]);

        $image = $request->file('portfolio_image');
        $file = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('image/portfolio/', $file);
            Portfolio::create([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' =>  $file,
            ]);
            return redirect()->route('all.portfolio');
    }

    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required',
        ]);

        $portfolio_id = $request->id;
        $image = $request->file('portfolio_image');
        $file = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('image/portfolio/', $file);
            Portfolio::find( $portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' =>  $file,
            ]);
            return redirect()->route('all.portfolio');
    }

    public function DeletePortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $img = $portfolio->portfolio_image;
        unlink('image/portfolio/' . $img);
        Portfolio::find($id)->delete();
        return back();
    }

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::find($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

}
