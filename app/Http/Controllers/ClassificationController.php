<?php


namespace App\Http\Controllers;

use App\Account;
use App\Classification;
use App\MainAccount;
use App\Store;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ClassificationController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Classification::find($id);
        $slider->delete();
        return redirect()
            ->route("classification.index")
            ->with("success", "classification  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.classification.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Classification::where('company_id',$user->company_id)->get();
        return view('admin.classification.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Classification();
        $admin->name = $request->name;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("classification.index")
            ->with("success", "classification created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Classification::find($id);

        return view('admin.classification.edit', compact('driver'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Classification::find($id);
        $admin->name = $request->name;

        $admin->save();
        return redirect()
            ->route("classification.index")
            ->with("success", "classification updated successfully");


    }

}
