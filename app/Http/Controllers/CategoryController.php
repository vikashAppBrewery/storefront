<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this ->middleware('auth');
    }

    public function AllCat(){
        // $categories = DB::table('categories')
        // ->join('users', 'categories.user_id', 'users.id')
        // ->select('categories.*', 'users.name')
        // ->latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories', 'trachCat'));
    }


    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:25',
            
        ],
        [
            'category_name.required' => 'please input category name',
            
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' =>Auth::user()->id,
            'created_at' =>Carbon::now(),

        ]);
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user() -> id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user() -> id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category inserted succsfully');
    }

    public function Edit($id) {
        // $categories = Category::find($id);
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        // equilant variant
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        // ]);

        // query variant
        $data = array();
        $data['category_name']=$request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id', $id)->update($data);
        return Redirect()->route('all.category')->with('success', 'Category updated succsfully');
    }


    public function softDelete($id){
        $delete =Category::find($id)->delete();
        return Redirect()->back()->with('success', 'category in trash now');
    }


    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'category is restored now');

    }


    public function Pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'category is permanently delete now');
    }
}
