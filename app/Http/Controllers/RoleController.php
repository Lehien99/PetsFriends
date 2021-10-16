<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getRole_List(){
        $role = Role::all();
        return view('admin.roles.roles_list', compact('role'));
    }
    public function getRole_Add(){
        return view('admin.roles.roles_add');
    }
    public function postRole_Add(Request $request){
        $this -> validate($request,
        [
            'Name'=> 'required|min:3|max:100'
        ],
        [
            'Name.required'=>'You have not entered Category',
            'Name.min'=>'The name Category must be between 3 and 50 characters long',
            'Name.max'=>'The name Category must be between 3 and 50 characters long',
        ]);

        $role = new Role;
        $role->Name = $request->Name;
        $role->save();
        return redirect('admin/roles/Add')->with('Message','Add data successfully');
        
    }
    public function getRole_edit($id){

        $role = Role::find($id);
        return view('admin.roles.roles_edit', compact('role'));
    }
    public function postRole_edit(Request $request,$id){
        $role = Role::find($id);
        $this->validate($request,
        [
            'Name'=> 'required|min:3|max:100'
        ],
        [
            'Name.required'=>'You have not entered Category',
            'Name.min'=>'The name Category must be between 3 and 50 characters long',
            'Name.max'=>'The name Category must be between 3 and 50 characters long',
        ]);

        $role->name = $request->Name;
        $role->save();

        return  redirect('admin/roles/edit/'.$id)->with('Message','Role edit successfully.');
        

    }



    public function destroy(Request $request,$id){
        $role = Role::find($id);
        $role->delete();

        return redirect('admin/roles/list')->with('Message','Role deleted successfully.');
    }
}
