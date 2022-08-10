<?php

namespace App\Http\Controllers\Home;
use App\models\HomeSlide;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    //
    public function HomeSlider()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }

    public function UpdateSlider(Request $request)
    {
        
        $slide_id = $request->id;
        $data = HomeSlide::find($slide_id);
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->video_url = $request->video_url; 
        $file = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('image/homeslide/', $file);
        $data->home_slide = $file;
        $data->save();
        return back();
    }
}
