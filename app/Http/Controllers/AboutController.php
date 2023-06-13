<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->paginate(10);
        return view('admin.home.index',compact('homeabout'));
    }
    public function AddAbout(){
        // $homeabout= HomeAbout::latest()->get();
        return view('admin.home.create');
    }
    public function StoreAbout(Request $request){
        
        // //By ORM
        HomeAbout::insert([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis' =>$request->long_dis,
            'created_at'=>Carbon::now()
        ]);
        

        return redirect()->route('home.about')->with('success', 'Home About Inserted Successfully!');

    }
    public function EditAbout($id){
        // $brands= DB::table('brands')->where('id',$id)->first();
        $homeabout= HomeAbout::find($id);
        return view('admin.home.edit',compact('homeabout'));
    }

    // public function updateAbout(Request $request, $id){
    //     // Find the record by ID
    //     $about = HomeAbout::find($id);
    
    //     // Update the fields with new values
    //     $about->title = $request->title;
    //     $about->short_dis = $request->short_dis;
    //     $about->long_dis = $request->long_dis;
    //     $about->updated_at = Carbon::now();
    
    //     // Save the changes to the database
    //     $about->save();
    
    //     return redirect()->route('home.about')->with('success', 'Home About Updated Successfully!');
    // }

    public function UpdateAbout(Request $request, $id){
        // Update the record using Eloquent ORM
        HomeAbout::where('id', $id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'updated_at' => Carbon::now()
        ]);
    
        return redirect()->route('home.about')->with('success', 'Home About Updated Successfully!');
    }
    
    
    function DeleteAbout($id){
       
        HomeAbout::find($id)->delete();
        // $homeabout=DB::table('home_abouts')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Home About Permanently Deleted');
    }
}
