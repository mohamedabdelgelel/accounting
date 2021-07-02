<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Store;
use App\Suppliers;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SuppliersController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Suppliers::find($id);
        $slider->delete();
        return redirect()
            ->route("supplier.index")
            ->with("success", "supplier  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.supplier.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Suppliers::where('company_id',$user->company_id)->get();
        return view('admin.supplier.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $admin = new Suppliers();
        $admin->name = $request->name;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("supplier.index")
            ->with("success", "supplier created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Suppliers::find($id);

        return view('admin.supplier.edit', compact('driver'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Suppliers::find($id);
        $admin->name = $request->name;

        $admin->save();
        return redirect()
            ->route("supplier.index")
            ->with("success", "supplier updated successfully");


    }

}
