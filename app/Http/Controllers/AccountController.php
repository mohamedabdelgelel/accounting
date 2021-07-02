<?php


namespace App\Http\Controllers;

use App\Account;
use App\Branches;
use App\MainAccount;
use App\Purchase;
use App\Suppliers;
use App\Transaction;
use App\User;
use App\Years;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class AccountController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }

    }

    public function import(Request $request)
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }
        $this->validate($request, [
            'select_file' => 'required|mimes:xlsx,csv'
        ]);
        $user=User::find($_SESSION['admin_id']);

        $path = $request->file('select_file')->getRealPath();
//        $selectedAccount=Account::find($request->name);
//        if (!$selectedAccount)
//        {
//            return back()->with('error', $request->name. 'لايوجد  حساب باسم ');
//
//        }
        //dd($path);
        $collections = (new FastExcel)->import($path);
        $total = 0;
//        $accounts = Account::all();
//        foreach ($accounts as $account) {
//            $account->balance = 0;
//            $account->save();
//        }
        //  dd($collections);
        foreach ($collections as $collection) {
            try {

                //    dd($collection);
                $account = Account::where('number', $collection['رقم الحساب'])->where('company_id', $user->company_id)->first();
                if (!$account)
                    return back()->with('error', $collection['رقم الحساب'] . '  لايوجد رقم حساب ب ');
                //    dd($request->date_from);


                $transaction = new Transaction();
                $transaction->account_id = $account->id;
                $transaction->details = $collection['تفاصيل'];
                if (isset($collection['رقم الفرع'])) {

                    $transaction->branch = $collection['رقم الفرع'];
                }
                if (isset($collection['رقم القيد'])) {
                    $transaction->registration_number = $collection['رقم القيد'];
                }
                if (isset($collection['مركز التكلفة'])) {
                    $transaction->center = $collection['مركز التكلفة'];
                }
                $transaction->date = date('Y-m-d', strtotime($collection['التاريخ']));
                if (isset($collection['رقم السنة المالية'])) {

                    $year = Years::where('name', $collection['رقم السنة المالية'])->where('company_id', $user->company_id)->first();
                    $transaction->year_id = $year->id;
                }


                if ($collection['دائن'] != null && $collection['دائن'] != '') {
                    $account->balance += $collection['دائن'];
                    $transaction->amount = $collection['دائن'];

                }
                if ($collection['مدين'] != null && $collection['مدين'] != '') {
                    $account->balance -= $collection['مدين'];
                    $transaction->amount = -$collection['مدين'];

                }

                $account->save();
                $user=User::find($_SESSION['admin_id']);

                $transaction->company_id=$user->company_id;
                $transaction->save();

            } catch (\Exception $E) {
                return $E;

            }
        }
        //dd($collection);
        return back()->with('success', 'تم ادخال ملف اكسيل بنجاح');
    }

    public function get()
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $accounts = Account::where('name', '!=', 'الصندوق')->where('company_id',$user->company_id)->get();
        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.catch', compact('accounts','transaction'));
    }
    public function entry()
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $branches=Branches::where('company_id',$user->company_id)->get();
        $accounts = Account::where('company_id',$user->company_id)->get();
        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.entry', compact('accounts','transaction','branches'));
    }

    public function storeGet(Request $request)
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }

        $user=User::find($_SESSION['admin_id']);

        $transaction = new Transaction();
        $transaction->company_id=$user->company_id;

        $transaction->account_id = $request->account_id;
        $account = Account::find($request->account_id);
        $transaction->details = 'سند قبض';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->registration_number=$request->statement;

        $account->balance += $request->money;
        $transaction->amount = $request->money;
        $transaction->notes = $request->notes;

        $account->save();
        $transaction->save();

        $transaction = new Transaction();
        $user=User::find($_SESSION['admin_id']);

        $transaction->company_id=$user->company_id;
        $secondAccount = Account::where('name', '=', 'الصندوق')->first();

        $secondAccount->balance -= $request->money;
        $transaction->amount = -$request->money;

        $transaction->notes = $request->notes;


        $transaction->account_id = $secondAccount->id;
        $transaction->details = 'سند قبض';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->registration_number=$request->statement;


        $secondAccount->save();
        $transaction->save();
        return back()->with('success', 'تم اضافة سند قبض بنجاح');


    }

    public function postentry(Request $request)
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }
        $d=0;
        for ($i=0; $i<count($request->debtor); $i++)
        {
            $d+=$request->debtor[$i];
        }
        $c=0;
        for ($i=0; $i<count($request->creditor); $i++)
        {
            $c+=$request->creditor[$i];
        }

        if ($d != $c){
            return  redirect()->back()->with('error','مجموع المدين يجب ان يساوي الدائن');
        }else {
            $user = User::find($_SESSION['admin_id']);
            for ($i = 0; $i < count($request->names); $i++) {
                $transaction = new Transaction();
                $transaction->company_id = $user->company_id;
                $transaction->registration_number = $request->registration_number;
                $transaction->account_id = $request->names[$i];
                $account = Account::find($request->names[$i]);
                $transaction->notes = $request->type;
                $transaction->branch = $request->branch;
                // $transaction->center=$collection['مركز التكلفة'];
                $transaction->date = date('Y-m-d', strtotime($request->date));
                $year = Years::where('company_id', $user->company_id)->where('year', date('Y'))->first();
                if ($year) {
                    $transaction->year_id = $year->id;
                }
                if ($request->debtor[$i]) {
                    $account->balance -= $request->debtor[$i];
                    $transaction->amount = -$request->debtor[$i];
                    $transaction->details = $request->statement[$i];

                    $account->save();
                    $transaction->save();
                }
                if ($request->creditor[$i]) {
                    $account->balance += $request->creditor[$i];
                    $transaction->amount = $request->creditor[$i];
                    $transaction->details = $request->statement[$i];

                    $account->save();
                    $transaction->save();
                }

            }
        }
        return back()->with('success', 'تم اضافة قيد يومي بنجاح');


    }


    public function cashing()
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $accounts = Account::where('name', '!=', 'الصندوق')->where('company_id',$user->company_id)->get();  
        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.cache', compact('accounts','transaction'));
    }

    public function storeCashing(Request $request)
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }

        $user=User::find($_SESSION['admin_id']);

        $transaction = new Transaction();
        $transaction->company_id=$user->company_id;

        $transaction->account_id = $request->account_id;
        $account = Account::find($request->account_id);
        $transaction->details = 'سند صرف';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));

        $transaction->registration_number=$request->statement;

        $account->balance -= $request->money;
        $transaction->amount = -$request->money;
        $transaction->notes = $request->notes;

        $account->save();
        $transaction->save();
        $transaction = new Transaction();
        $transaction->account_id = $request->account_id;

        $secondAccount = Account::where('name', '=', 'الصندوق')->first();

        $secondAccount->balance += $request->money;
        $transaction->amount = $request->money;

        $transaction->notes = $request->notes;


        $transaction->account_id = $secondAccount->id;
        $transaction->details = 'سند صرف';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));

        $transaction->registration_number=$request->statement;

        $secondAccount->save();
        $transaction->save();
        return back()->with('success', 'تم اضافة سند صرف بنجاح');


    }

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id']))
        {
            return redirect('admin/login');
        }

        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Account::find($id);
        $slider->delete();

        return redirect()
            ->route("account.index")
            ->with("success", "account  deleted successfully");
    }

    public function deleteStatement($id)
    {


        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Transaction::find($id);
        $account = Account::find($slider->account_id);
        if ($slider->amount > 0) {
            $account->balance-=$slider->amount;



        } else {
            $account->balance+=-$slider->amount;

        }
        $account->save();
        $sliders=Transaction::where('registration_number',$slider->registration_number)->get();
        foreach ($sliders as $s){
            $s->delete();
        }
        $slider->delete();

          return back()
            ->with("success", "تم حذف القيد بنجاح");
    }

    public function upload()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $accounts = Account::all();
        return view('account.upload', compact('accounts'));

    }

    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $mains=MainAccount::where('company_id',$user->company_id)->get();
        return view('admin.account.create',compact('mains'));
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $drivers = Account::where('company_id',$user->company_id)->get();
        $mains=MainAccount::where('company_id',$user->company_id)->get();
     //   dd($mains);

        return view('admin.account.index', compact('drivers','mains'));

    }

    public function review(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $branches=Branches::where('company_id',$user->company_id)->get();
        $years=Years::where('company_id',$user->company_id)->get();
        $drivers = Account::where('company_id',$user->company_id)->get();
        foreach ($drivers as $driver) {
            $driver->credit = 0;
            $driver->depit = 0;
            
            if ($request->get('branch') && $request->get('from') && $request->get('to') && $request->get('year_id')) {
                $credits = Transaction::where('branch',$request->get('branch'))->where('year_id',$request->get('year_id'))->where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('branch',$request->get('branch'))->where('year_id',$request->get('year_id'))->where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }
            elseif ($request->get('from') && $request->get('to') && $request->get('year_id')) {
                $credits = Transaction::where('date','>=',$request->get('from'))->where('year_id',$request->get('year_id'))
                    ->where('date','<=',$request->get('to'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))->where('year_id',$request->get('year_id'))
                    ->where('date','<=',$request->get('to'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ($request->get('from') && $request->get('year_id')) {
                $credits = Transaction::where('date','>=',$request->get('from'))->where('year_id',$request->get('year_id'))
                    ->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))->where('year_id',$request->get('year_id'))
                    ->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ( $request->get('to') && $request->get('year_id')) {
                $credits = Transaction::where('date','<=',$request->get('to'))->where('year_id',$request->get('year_id'))
                    ->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','<=',$request->get('to'))->where('year_id',$request->get('year_id'))
                    ->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ($request->get('branch') && $request->get('year_id')) {
                $credits = Transaction::where('branch', $request->get('branch'))->where('year_id',$request->get('year_id'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('branch', $request->get('branch'))->where('year_id',$request->get('year_id'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }         elseif ($request->get('from') && $request->get('to')) {
                $credits = Transaction::where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ($request->get('from')) {
                $credits = Transaction::where('date','>=',$request->get('from'))
                    ->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))
                    ->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ( $request->get('to') ) {
                $credits = Transaction::where('date','<=',$request->get('to'))
                    ->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('date','<=',$request->get('to'))
                    ->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ($request->get('branch') ) {
                $credits = Transaction::where('branch', $request->get('branch'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('branch', $request->get('branch'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }elseif ($request->get('year_id')){
                $credits = Transaction::where('year_id',$request->get('year_id'))->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('year_id',$request->get('year_id'))->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }
            else {
                $credits = Transaction::where('account_id', $driver->id)->where('amount', '<', 0)->where('company_id',$user->company_id)->get();
                $depits = Transaction::where('account_id', $driver->id)->where('amount', '>', 0)->where('company_id',$user->company_id)->get();
            }
            foreach ($credits as $credit) {
                $driver->credit += $credit->amount;
            }
            foreach ($depits as $credit) {
                $driver->depit += $credit->amount;
            }

        }
        return view('account.review', compact('drivers','years','branches'));

    }

    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Account();
        $admin->number = $request->number;
        $admin->name = $request->name;
        $admin->date = $request->date;

        $admin->debit_salary = $request->debit;
        $admin->credit_salary = $request->credit;
        $admin->main_id = $request->main_id;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("account.index")
            ->with("success", "account created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $driver = Account::find($id);
        $mains=MainAccount::where('company_id',$user->company_id)->get();

        return view('admin.account.edit', compact('driver','mains'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Account::find($id);
        $admin->number = $request->number;
        $admin->name = $request->name;
        $admin->debit_salary = $request->debit;
        $admin->credit_salary = $request->credit;
        $admin->main_id = $request->main_id;
        $admin->date = $request->date;

        $admin->save();
        return redirect()
            ->route("account.index")
            ->with("success", "account updated successfully");


    }

    public function show($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $trip = Account::find($id);
        return view('admin.account.show', compact('trip'));

    }

    public function search(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        if ($request->account_id && $request->from && $request->to && $request->year_id)
        {
        $drivers = Transaction::where('year_id', $request->year_id)->where('account_id', $request->account_id)->where('date', '>=', $request->from)->where('date', '<', $request->to)->where('company_id',$user->company_id)->get();
        }elseif ($request->year_id && $request->from && $request->to){
            $drivers = Transaction::where('year_id', $request->year_id)->where('date', '>=', $request->from)->where('date', '<', $request->to)->where('company_id',$user->company_id)->get();
        }elseif ($request->account_id && $request->from && $request->to)
        {
            $drivers = Transaction::where('account_id', $request->account_id)->where('date', '>=', $request->from)->where('date', '<', $request->to)->where('company_id',$user->company_id)->get();
        }
        elseif ($request->year_id && $request->account_id)
        {
            $drivers = Transaction::where('year_id', $request->year_id)->where('account_id', $request->account_id)->where('company_id',$user->company_id)->get();
        }
        elseif ($request->account_id)
        {
            $drivers = Transaction::where('account_id', $request->account_id)->where('company_id',$user->company_id)->get();
        }elseif ($request->from && $request->to)
        {
            $drivers = Transaction::where('date', '>=', $request->from)->where('date', '<', $request->to)->where('company_id',$user->company_id)->get();
        }elseif ($request->year_id)
        {
            $drivers = Transaction::where('year_id', $request->year_id)->where('company_id',$user->company_id)->get();

        }else{
            $drivers = Transaction::where('company_id',$user->company_id)->get();
        }
        $accounts = Account::where('company_id',$user->company_id)->get();
        $years=Years::where('company_id',$user->company_id)->get();
        $branches=Branches::where('company_id',$user->company_id)->get();

        return view('account.statement', compact('accounts', 'drivers','years','branches'));
    }
    public function daily()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Transaction::where('company_id',$user->company_id)->get();

        return view('account.daily', compact( 'drivers'));
    }
    public function userTransaction($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $drivers = Transaction::where('account_id',$id)->get();

        return view('account.userTransaction', compact( 'drivers'));
    }
    public function transaction($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $drivers = Transaction::where('registration_number',$id)->get();

        return view('account.transactions', compact( 'drivers'));

    }
    public function statement()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $years=Years::where('company_id',$user->company_id)->get();
        $accounts = Account::where('company_id',$user->company_id)->get();
        $branches=Branches::where('company_id',$user->company_id)->get();

        return view('account.statement', compact('accounts','years','branches'));
    }
    public function report(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
    if ($request->from && $request->to && $request->supplier){
    $accounts=Purchase::where('date','<=',$request->from)->where('date','>=',$request->to)
        ->where('supplier_id',$request->supplier)->get();
    }
    elseif ($request->from && $request->to){
            $accounts=Purchase::where('date','<=',$request->from)->where('date','>=',$request->to)->get();
        }elseif ($request->supplier){
            $accounts=Purchase::where('supplier_id',$request->supplier)->get();
        }else{
            $accounts = array();
        }
        $user=User::find($_SESSION['admin_id']);
    return $user;
        $suppliers=Suppliers::where('company_id',$user->company_id)->get();

        return view('account.report', compact('accounts','suppliers'));
    }
    public function catch_view()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $drivers = Transaction::where('details','سند قبض')->get();

        return view('account.catchView', compact( 'drivers'));
    }
    public function cashing_view()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $drivers = Transaction::where('details','سند صرف')->get();

        return view('account.cashingView', compact( 'drivers'));
    }
}
