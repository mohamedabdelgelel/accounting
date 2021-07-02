<?php


namespace App\Http\Controllers;

use App\Account;
use App\BranchAccount;
use App\Branches;
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
class RevenuesController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Revenues::find($id);
        $slider->delete();
        return redirect()
            ->route("revenues.index")
            ->with("success", "revenues  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $branches = Branches::all();

        return view('admin.revenues.create',compact('branches'));
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Revenues::where('company_id',$user->company_id)->get();
        return view('admin.revenues.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Revenues();
        $admin->branch_id= $request->branch_id;
        $admin->account_id=$request->account_id;
        $admin->company_id=$user->company_id;
        $admin->date=$request->date;
        $admin->net_sales=$request->net_sales;
        $admin->vat=$request->vat;
        $admin->total_sales=$request->total_sales;
        $admin->master_card=$request->master_card;
        $admin->span=$request->span;
        $admin->visa=$request->visa;
        $admin->stc=$request->stc;
        $admin->wassel=$request->wassel;
        $admin->to_you=$request->to_you;
        $admin->hunger=$request->hunger;
        $admin->total_atm=$request->total_atm;
        $admin->fee=$request->fee;
        $admin->markiting=$request->markiting;
        $admin->total_fee=$request->total_fee;
        $admin->advansed=$request->advansed;
        $admin->cash_day=$request->cash_day;

        $admin->save();

        return redirect()
            ->route("revenues.index")
            ->with("success", "revenues created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $selected=[];
        $branches=Branches::all();
        $driver = Revenues::find($id);
        $accounts=BranchAccount::where('branch_id',$driver->branch_id)->get();
        foreach ($accounts as $province) {
            $account = Account::find($province->id);
            if ($account) {
                array_push($selected, $account);
            }
        }
        return view('admin.revenues.edit', compact('driver','branches','selected'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Revenues::find($id);
        $admin->branch_id= $request->branch_id;
        $admin->account_id=$request->account_id;
        $admin->date=$request->date;
        $admin->net_sales=$request->net_sales;
        $admin->vat=$request->vat;
        $admin->total_sales=$request->total_sales;
        $admin->master_card=$request->master_card;
        $admin->span=$request->span;
        $admin->visa=$request->visa;
        $admin->stc=$request->stc;
        $admin->wassel=$request->wassel;
        $admin->to_you=$request->to_you;
        $admin->hunger=$request->hunger;
        $admin->total_atm=$request->total_atm;
        $admin->fee=$request->fee;
        $admin->markiting=$request->markiting;
        $admin->total_fee=$request->total_fee;
        $admin->advansed=$request->advansed;
        $admin->cash_day=$request->cash_day;
        $admin->save();
        return redirect()
            ->route("revenues.index")
            ->with("success", "revenues updated successfully");
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
