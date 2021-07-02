<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Permission;
use App\Store;
use App\Suppliers;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = User::find($id);
        $slider->delete();
        return redirect()
            ->route("users.index")
            ->with("success", "users  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.users.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = User::where('company_id',$user->company_id)->get();
        return view('admin.users.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $check=User::where('email',$request->email)->first();
        if ($check){
            return redirect()->back()->with('error','email exist');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->type=0;
        $admin->password = Hash::make($request->input('password'));
        $admin->company_id=$user->company_id;

        $admin->save();
        if ($request->per_name) {
            for ($x = 0; $x < count($request->per_name); $x++) {
                $permission = new Permission();
                $permission->name = $request->per_name[$x];
                $permission->user_id = $admin->id;
                $permission->save();
            }
        }
        return redirect()
            ->route("users.index")
            ->with("success", "users created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = User::find($id);
        $permissions=Permission::where('user_id',$id)->get();
        return view('admin.users.edit', compact('driver','permissions'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->save();
        if ($request->per_name) {
            $checks=Permission::where('user_id',$id)->get();
            foreach ($checks as $check){
                $check->delete();
            }
            for ($x = 0; $x < count($request->per_name); $x++) {
                $permission = new Permission();
                $permission->name = $request->per_name[$x];
                $permission->user_id = $admin->id;
                $permission->save();
            }
        }
        return redirect()
            ->route("users.index")
            ->with("success", "users updated successfully");
    }

}
