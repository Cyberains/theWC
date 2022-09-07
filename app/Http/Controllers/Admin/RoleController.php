<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roledata = Role::orderBy('id','DESC')->get();
        $module = Module::groupBy('name')->get('name');
        return view('admin.customer.role',compact('module','roledata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([

            'role_name'=>'required|unique:roles,name'

        ]);
    
        for($i=0;$i<count($request->module);$i++){

            if ($request->has('view')) {
                
                if (array_key_exists($i,$request->view)) {
                
                    $view = 1;
                }
                else{

                    $view = 0;
                }
            }
            else{

                $view =0;
            }

            if ($request->has('add')) {
                
                if (array_key_exists($i,$request->add)) {
                
                    $add = 1;
                }
                else{

                    $add = 0;
                }

            }
            else{

                    $add = 0;

            }

            if ($request->has('edit')) {
                
                if (array_key_exists($i,$request->edit)) {
                
                    $edit = 1;
                }
                else{

                    $edit = 0;
                }

            }else{

                $edit = 0;

            }

            if ($request->has('delete()')) {
                
                if (array_key_exists($i,$request->delete)) {
                
                    $delete = 1;
                }
                else{

                    $delete = 0;
                }
            }
            else{

                    $delete = 0;
            }



            $form_data = [

                'name'=>$request->role_name,
                'modules'=>$request->module[$i],
                'sub_modules'=>$request->sub_module[$i],
                'is_view'=>$view,
                'is_add'=>$add,
                'is_edit'=>$edit,
                'is_delete'=>$delete,

            ];

            Role::create($form_data);
            
        }

        Session::flash('message','Role successfully added');

        return redirect()->route('admin.role');



    }

    public function get_submodule(Request $request){

        $submodule = Module::where('name',$request->module_name)->get();

        return response()->json([

                'submodule'=>$submodule

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Role::find($id)->delete();
        Session::flash('message','Role deleted successfully.');
        return redirect()->route('admin.role');

    }
}
