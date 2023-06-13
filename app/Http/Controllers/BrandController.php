<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpeg,jpg,png',
        ], [
            'brand_name.required' => 'Please input the Brand Name.',
            'brand_name.min' => 'Brand Name should be longer than 4 characters.',
            'brand_image.mimes' => 'Please upload a valid JPEG, JPG, or PNG image.',
        ]);
        
        // $brand_image= $request->file('brand_image');

        // $name_gen=hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name=$name_gen.'.'.$img_ext;
        // $up_location='image/brand/';
        // $last_img =$up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        

        // //By ORM
        // Brand::insert([
        //     'brand_name' =>$request->brand_name,
        //     'brand_image' =>$last_img,
        //     'created_at'=>Carbon::now()

        // ]);


            // Retrieve the uploaded image file
            $imageFile = $request->file('brand_image');

            // Store the uploaded image file in the storage disk
            $path = $imageFile->store('brands', 'public');


            // //By ORM
            Brand::insert([
                'brand_name' =>$request->brand_name,
                'brand_image' =>$path,
                'user_id'=>Auth::user()->id,
                'created_at'=>Carbon::now()
            ]);
            

            return redirect()->back()->with('success', 'Brand Inserted Successfully!');
        }

        function EditBrand($id){
            // $brands= DB::table('brands')->where('id',$id)->first();
            $brands= Brand::find($id);
            return view('admin.brand.edit',compact('brands'));
        }

        function UpdateBrand(Request $request, $id){

            $validatedData = $request->validate([
                'brand_name' => 'required|min:4',
                'brand_image' => 'mimes:jpeg,jpg,png',
            ], [
                'brand_name.required' => 'Please input the Brand Name.',
                'brand_name.min' => 'Brand Name should be longer than 4 characters.',
                'brand_image.mimes' => 'Please upload a valid JPEG, JPG, or PNG image.',
            ]);
            
            
            $old_image = $request->old_image;

            $brand_name = $request->brand_name;
            $brand_image = $request->file('brand_image');

            if($brand_image){
                // Store the uploaded image file in the storage disk
            $path = $brand_image->store('brands', 'public');
            // Update the brand using ORM
            $brand = Brand::find($id); // Replace $brandId with the actual ID of the brand you want to update
            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $path;
            $brand->user_id = Auth::user()->id;
            $brand->updated_at = Carbon::now();
            $brand->save();

            return redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!');

            }
            else if($brand_image){

                $brand_image = $request->file('brand_image');

                $path = $brand_image->store('brands', 'public');
                // Update the brand using ORM
                $brand = Brand::find($id); // Replace $brandId with the actual ID of the brand you want to update
                $brand->brand_image = $path;
                $brand->user_id = Auth::user()->id;
                $brand->updated_at = Carbon::now();
                $brand->save();
    
                return redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!');
            }
            
            else{
            
            // Update the brand using ORM
            $brand = Brand::find($id); // Replace $brandId with the actual ID of the brand you want to update
            $brand->brand_name = $request->brand_name;
            $brand->user_id = Auth::user()->id;
            $brand->updated_at = Carbon::now();
            $brand->save();

            return redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!');
            }
            
    
        }
        function DeleteBrand($id){
            // $image = Brand::find($id);
            // $old_image=$image->brand_image;
            // unlink($old_image);
            Brand::find($id)->delete();
            // $brands=DB::table('brands')->where('id',$id)->first();
            return redirect()->back()->with('success', 'Brand Permanently Deleted');
        }


        //This is for multipics all methods
        function MultiPics(){
            $images=MultiPic::all();
            return view('admin.multipic.index',compact('images'));
        }

        public function store(Request $request){
            // Retrieve the uploaded image files
            $imageFiles = $request->file('image');

            // Loop through each uploaded image file
            foreach ($imageFiles as $imageFile) {
                // Store the uploaded image file in the storage disk
                $path = $imageFile->store('brands', 'public');

                // Insert each image into the database
                MultiPic::create([
                    'image' => $path,
                    'created_at' => now()
                ]);
            }

            return redirect()->back()->with('success', 'Images Inserted Successfully!');
        }



}
