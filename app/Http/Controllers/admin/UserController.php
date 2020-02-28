<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $user = $this->user->getAll();

        return view('admin.user.index', compact('user'));
    }

    public function create()
    {

    }

    public function store(UserRequest $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try
        {
            $user = $this->user->find($id);
            $roles = $this->role->getAll();
            return view('admin.user.edit', compact('user', 'roles'));
        }
        catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function update(UserRequest $request, $id)
    {
        try
        {
            $data = $request->all();
            if ($request->avatar != null) {
                $data['avatar'] = $this->user->uploadImage($data['avatar']);
                $updated = $this->user->update($id, $data);
            } else {
                $updated = $this->user->update($id, $data);
                if (!$updated) {
                    return redirect()->back()->withErrors($updated);
                }
            }

            return redirect(route('user.index'))->with('message', trans('setting.edit_success'));
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try
        {
            $user = $this->user->delete($id);

            return redirect(route('user.index'))->with('message', trans('setting.delete_success'));
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }
}

