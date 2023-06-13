<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders= Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function AddSlider(){
        return view('admin.slider.create');
    }
    public function StoreSlider(Request $request){
        // Retrieve the uploaded image file
        $imageFile = $request->file('image');

        // Store the uploaded image file in the storage disk
        $path = $imageFile->store('sliders', 'public');


        // //By ORM
        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image' =>$path,
            'created_at'=>Carbon::now()
        ]);
        

        return redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully!');

    }

    public function EditSlider($id){
        // $brands= DB::table('brands')->where('id',$id)->first();
        $sliders= Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    public function UpdateSlider(Request $request, $sliderId){
        // Retrieve the uploaded image file
        $imageFile = $request->file('image');

        // Retrieve the slider by its ID
        $sliders = Slider::findOrFail($sliderId);

        // Update the slider properties
        $sliders->title = $request->title;
        $sliders->description = $request->description;

        // Check if a new image was uploaded
        if ($imageFile) {
            // Store the uploaded image file in the storage disk
            $path = $imageFile->store('sliders', 'public');
            $sliders->image = $path;
        }

        $sliders->updated_at = Carbon::now();

        // Save the changes to the database
        $sliders->save();

        return redirect()->route('home.slider')->with('success', 'Slider Updated Successfully!');
    }
    public function DeleteSlider($id){
       
        Slider::find($id)->delete();
        // $sliders=DB::table('sliders')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Slider Permanently Deleted');
    }


}
