<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Store;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class StoreController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Store::find($id);
        $slider->delete();
        return redirect()
            ->route("store.index")
            ->with("success", "store  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.store.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Store::where('company_id',$user->company_id)->get();
        return view('admin.store.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Store();
        $admin->name = $request->name;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("store.index")
            ->with("success", "store created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Store::find($id);

        return view('admin.store.edit', compact('driver'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Store::find($id);
        $admin->name = $request->name;

        $admin->save();
        return redirect()
            ->route("store.index")
            ->with("success", "store updated successfully");


    }

}
