<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function AllCat(){
        // $categories=DB::table('categories')
        //         ->join('users','categories.user_id','users.id')
        //         ->select('categories.*','users.name',"users.email","users.id","users.password")
        //         ->latest()->paginate(4);

        $categories= Category::latest()->paginate(4);   //by ORM
        // $categories= DB::table('categories')->latest()->paginate(4);
        $trashCat= Category::onlyTrashed()->latest()->paginate(4);

        return view('admin.category.index',compact('categories','trashCat'));
    }
    function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required'=>'Please input Category Name.',
            'category_name.max'=>'Category Less Then 255Chars.',

        ]);
        //By ORM
        Category::insert([
            'category_name' =>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()

        ]);

        // //By object base
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->created_at = Carbon::now();
        // $category->save();
        
        //By Query Builder
        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']= Auth::user()->id;
        // $data['created_at']=Carbon::now();
        // DB::table('categories')->insert($data);


        return redirect()->back()->with('success', 'Category Inserted Successfully!');
    }

    function EditCat($id){
        // $categories= Category::find($id);
        $categories=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }
    function UpdateCat(Request $request,$id){
        // $update= Category::find($id)->update([
        // 'category_name'=>$request->category_name,
        // 'user_id'=>Auth::user()->id
        // ]);
        $data=array();
        $data['category_name']= $request->category_name;
        $data['updated_at']= $request->updated_at;
        $data['user_id']=Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return redirect()->route('all.category')->with('success', 'Category Updated Successfully!');

    }
    function SoftDeleteCat($id){
        $delete= Category::find($id)->delete();
        // $categories=DB::table('categories')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Category Soft Delete Successfully!');
    }
    function RestoreCat($id){
        $delete= Category::withTrashed()->find($id)->restore();
        // $categories=DB::table('categories')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Category Restore Successfully!');
    }
    function PdeleteCat($id){
        $delete= Category::onlyTrashed()->find($id)->forceDelete();
        // $categories=DB::table('categories')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Category Permanently Deleted');
    }
}
