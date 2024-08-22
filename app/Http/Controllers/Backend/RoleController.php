<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all_permission',compact('permissions'));

    } // End Method

    public function AddPermission(){
        return view('admin.backend.pages.permission.add_permission');

    } // End Method

    public function StorePermission(Request $request){

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } // End Method

    public function EditPermission($id){

        $permission = Permission::find($id);
        return view('admin.backend.pages.permission.edit_permission',compact('permission'));

    } // End Method

    public function UpdatePermission(Request $request){

        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } // End Method

    public function DeletePermission($id){

        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function ImportPermission(){

        return view('admin.backend.pages.permission.import_permission');
    } // End Method

    public function Export(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    }// End Method

    public function Import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    ////////////All Roles Method ///////////


    public function AllRoles(){

        $roles = Role::all();
        return view('admin.backend.pages.role.all_role',compact('roles'));

    } // End Method

    public function AddRoles(){

        return view('admin.backend.pages.role.add_role');

    } // End Method

    public function StoreRoles(Request $request){

        Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    } // End Method

    public function editRoles($id){

        $roles = Role::find($id);
        return view('admin.backend.pages.role.edit_role',compact('roles'));
    } // End Method

    public function UpdateRole(Request $request){

        $role_id = $request->id;

        Role::find($role_id)->update([

            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Roles Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    } // End Method

    public function DeleteRoles($id){

        Role::find($id)->delete();

        $notification = array(
            'message' => 'Roles Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    /////////////// Role In Permission Mehtod ////////////////////////

    public function AddRolePermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getgermissionGroups();
        return view('admin.backend.pages.rolesetup.add_role_permission',compact('roles','permission_groups','permissions'));

    } // End Method

    public function RolePermissinStore(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {

            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        } // End Foreach

        $notification = array(
            'message' => 'Roles Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method

    public function AllRolePermission(){

        $roles = Role::all();
        return view('admin.backend.pages.rolesetup.all_role_permission',compact('roles'));

    } // End Method

    public function AdminEditRole($id){

        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getgermissionGroups();
        return view('admin.backend.pages.rolesetup.edit_role_permission',compact('role','permission_groups','permissions'));
    } // End Method

    public function AdminRoleUpdate(Request $request,$id){

        $role = Role::find($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Roles Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);

    } //End Method


    public function AdminDeleteRoles($id){

        $role = Role::find($id);

        if (!is_null($role)) {
           $role->delete();
        }

        $notification = array(
            'message' => 'Roles Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } // End Method

}





