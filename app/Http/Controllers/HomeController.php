<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Carbon;
use Auth;


class HomeController extends Controller
{
    //
    public function HomeSlider(){
        $sliders = slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){
        $slider_image = $request->file('image');
       
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

        $last_img='image/slider/'.$name_gen;



        slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('home.slider')->with('success', 'slider Inserted successfully');

    }

    public function Delete($id){
        $image = slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        slider::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand deleted successfully');    
    }
}
