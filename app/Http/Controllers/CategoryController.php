<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function getCate_List()
    {
        $category = Category::all();
        return view('admin.category.cate_list',['category'=>$category]);
     


    }
    public function getCate_Add()
    {
        return view('admin.category.cate_add');

        
    }
    public function postCate_Add(Request $request)
    {
        $this->validate($request,
        [
            'Name'=> 'required|min:3|max:100||unique:Category,Name'

        ],
        [
            'Name.required'=>'You have not entered Category',
            'Name.min'=>'The name Category must be between 3 and 50 characters long',
            'Name.max'=>'The name Category must be between 3 and 50 characters long',

        ]);

        $category = new Category;
        $category->Name = $request->Name;
        $category->save();
        return redirect('admin/category/add')->with('Message','Add data successfully');
        

    }
    public function getCate_Edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.cate_edit',['category'=> $category]);

    }

    public function postCate_edit(Request $request,$id ){
        $category = Category::find($id);

        $this->validate($request,
        [
            'Name'=> 'required|min:3|max:100||unique:Category,Name'

        ],
        [
            'Name.required'=>'You have not entered Category',
            'Name.min'=>'The name Category must be between 3 and 50 characters long',
            'Name.max'=>'The name Category must be between 3 and 50 characters long',

        ]);

        $category->Name = $request->Name;
        $category->save();

        return redirect('admin/category/edit/'.$id)->with('Message','Category edit successfully.');


    }

    public function destroy(Request $request,$id){
        $category =Category::find($id);
        $category->delete();

        return redirect('admin/category/list')->with('Message','Category deleted successfully.');
    }
}
