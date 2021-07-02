<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Permission;
use App\Store;
use App\Suppliers;
use App\Transaction;
use App\User;
use App\Years;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;
class YearsController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Years::find($id);
        $slider->delete();
        return redirect()
            ->route("years.index")
            ->with("success", "years  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.years.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $drivers = Years::where('company_id',$user->company_id)->get();

        return view('admin.years.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Years();
        $admin->year= $request->year;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("years.index")
            ->with("success", "years created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Years::find($id);
        return view('admin.years.edit', compact('driver'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Years::find($id);
        $admin->year= $request->year;
        $admin->save();
        return redirect()
            ->route("years.index")
            ->with("success", "years updated successfully");
    }

}
