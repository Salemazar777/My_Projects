<?php

namespace App\Http\Controllers\Home;
use App\models\About;
use App\models\Multiimage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function AboutPage()
    {
        $aboutpage = About::find(1);
    return view('admin.about_page.about_page_all',compact('aboutpage'));
    }

    public function UpdateAbout(Request $request)
    {
        
        $about_id = $request->id;
        $data = About::find($about_id);
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->short_description = $request->short_description;
        $data->long_description =  $request->long_description; 
        $file = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('image/homeabout/', $file);
        $data->about_image = $file;
        $data->save();
        return back();
    }

    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
    }

    public function AboutMultiImage()
    {
        return view('admin.about_page.multimage');
    }

    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('image');

        foreach ($image as $multi_image) {
            
            $file = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            $multi_image->move('image/multi/', $file);
            $data = Multiimage::insert([
                'multi_image' =>  $file,
            ]);
           
        }
        return back();
    }

    public function AllMultiImage()
    {
        $allmultiimage = Multiimage::all();
        return view('admin.about_page.all_multiimage',compact('allmultiimage'));

    }

    public function EditMultiImage($id)
    {
        $multi_image = Multiimage::find($id);
        return view('admin.about_page.edit_multi_image',compact('multi_image'));
    }

    public function UpdateMultiImage(Request $request)
    {
        $multi_image_id = $request->id;
        $image = $request->file('image');
        $file = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('image/multi/', $file);
            $data = Multiimage::find($multi_image_id)->update([
                'multi_image' =>  $file,
            ]);
            return back();
    }

    public function DeleteMultiImage($id)
    {
        $multi = Multiimage::find($id);
        $img = $multi->multi_image;
        unlink('image/multi/' . $img);
        Multiimage::find($id)->delete();
        return back();
    }
    
}
