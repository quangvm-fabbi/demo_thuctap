<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Permission\PermissionRepositoryInterface;

class RoleController extends Controller
{
    protected $role;
    protected $permission;

    public function __construct(RoleRepositoryInterface $role, PermissionRepositoryInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('admin.role.index')->with(array('roles' => $roles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->getAll();
        $permissions = $this->permission->getAll();

        return view('admin.role.add')->with(array('roles' => $roles, 'permissions' => $permissions));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id = $request->role_id;
        $role = $this->role->findOrFail($role_id);

        $role->permissions()->detach();

        $role->permissions()->attach($request->permissions);

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
