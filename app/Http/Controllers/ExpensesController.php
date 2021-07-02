<?php


namespace App\Http\Controllers;

use App\Account;
use App\BranchAccount;
use App\Branches;
use App\Expenses;
use App\MainAccount;
use App\Permission;
use App\Revenues;
use App\Store;
use App\Suppliers;
use App\Transaction;
use App\User;
use App\Years;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;
class ExpensesController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Expenses::find($id);
        $slider->delete();
        return redirect()
            ->route("expenses.index")
            ->with("success", "expenses  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $branches = Expenses::all();

        return view('admin.expenses.create',compact('branches'));
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Expenses::where('company_id',$user->company_id)->get();
        return view('admin.expenses.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Expenses();
        $admin->branch_id= $request->branch_id;
        $admin->account_id=$request->account_id;
        $admin->company_id=$user->company_id;
        $admin->date=$request->date;
        $admin->number=$request->number;
        $admin->description=$request->description;
        $admin->amount=$request->amount;
        $admin->tax=$request->tax;
        $admin->total=$request->amount*$request->total;


        $admin->save();

        return redirect()
            ->route("expenses.index")
            ->with("success", "expenses created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $selected=[];
        $branches=Branches::all();
        $driver = Expenses::find($id);
        $accounts=BranchAccount::where('branch_id',$driver->branch_id)->get();
        foreach ($accounts as $province) {
            $account = Account::find($province->id);
            if ($account) {
                array_push($selected, $account);
            }
        }
        return view('admin.expenses.edit', compact('driver','branches','selected'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Expenses::find($id);
        $admin->branch_id= $request->branch_id;
        $admin->account_id=$request->account_id;
        $admin->date=$request->date;
        $admin->number=$request->number;
        $admin->description=$request->description;
        $admin->amount=$request->amount;
        $admin->tax=$request->tax;
        $admin->total=$request->amount*$request->total;
        $admin->save();
        return redirect()
            ->route("expenses.index")
            ->with("success", "expenses updated successfully");
    }
    public function updateSelectCountry($id)
    {
        $selected=[];
        $provinces = BranchAccount::where('branch_id', $id)->get();
        if (count($provinces) > 0) {
            foreach ($provinces as $province) {
                $account = Account::find($province->id);
                if ($account) {
                    array_push($selected, $account);
                }
            }
            return $selected;
        }else{
            return  0;
        }
   }
}
