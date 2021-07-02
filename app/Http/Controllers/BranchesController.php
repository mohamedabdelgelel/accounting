<?php


namespace App\Http\Controllers;

use App\Account;
use App\BranchAccount;
use App\Branches;
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
class BranchesController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Branches::find($id);
        $slider->delete();
        return redirect()
            ->route("branches.index")
            ->with("success", "branches  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $accounts = Account::all();

        return view('admin.branches.create',compact('accounts'));
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $drivers = Branches::where('company_id',$user->company_id)->get();
        return view('admin.branches.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Branches();
        $admin->name= $request->name;
        $admin->code=$request->code;
        $admin->company_id=$user->company_id;
        $admin->save();
        for($i=0;$i<count($request->names);$i++) {
            $transaction = new BranchAccount();
            $transaction->account_id = $request->names[$i];
            $transaction->branch_id = $admin->id;
            $transaction->code=$request->codes[$i];
            $transaction->save();
        }
        return redirect()
            ->route("branches.index")
            ->with("success", "branches created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $accounts = Account::all();
        $checked=BranchAccount::where('branch_id',$id)->get();

        $driver = Branches::find($id);
        return view('admin.branches.edit', compact('driver','accounts','checked'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Branches::find($id);
        $admin->code= $request->code;
        $admin->name=$request->name;
        $admin->save();
        if ($request->names) {
            $check=BranchAccount::where('branch_id',$id)->get();
            foreach ($check as $c)
            {
                $c->delete();
            }
            for ($i = 0; $i < count($request->names); $i++) {
                $transaction = new BranchAccount();
                $transaction->account_id = $request->names[$i];
                $transaction->branch_id = $admin->id;
                $transaction->code = $request->codes[$i];
                $transaction->save();
            }
        }
        return redirect()
            ->route("branches.index")
            ->with("success", "years updated successfully");
    }

}
