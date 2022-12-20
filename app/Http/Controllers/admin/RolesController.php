<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use App\model\role;
use Carbon\Carbon;
class RolesController extends Controller
{
    public function index()
    {
        $roles = role::get(); // use pagination and  add custom pagination on index.blade
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function saveRole(RolesRequest $request)
    {
        
        

        try {

            $role = $this->process(new role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => trans('messages.success')]);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'رساله الخطا']);
        } catch (\Exception $ex) {
            return $ex;
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'رساله الخطا']);
        }
    }

    public function edit($id)
    {
          $role = role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
    }

    public function update($id,RolesRequest $request)
    {
        try {
            $role = role::findOrFail($id);
            $role = $this->process($role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => trans('messages.Update')]);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'رساله الخطا']);
        } catch (\Exception $ex) {
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'رساله الخطا']);
        }
    }

    protected function process(role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permission = json_encode($r->permission);
        $role->save();
        return $role;
    }


}
