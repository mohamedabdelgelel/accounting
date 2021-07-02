<?php


namespace App\Http\Controllers;

use App\Account;
use App\Additional;
use App\Attendance;
use App\Branches;
use App\Classification;
use App\Employee;
use App\Holiday;
use App\MainAccount;
use App\Oncount;
use App\Store;
use App\Transaction;
use App\User;
use App\Warning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class EmployeeController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Employee::find($id);
        $slider->delete();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.employees.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $drivers = Employee::where('company_id',$user->company_id)->get();
        return view('admin.employees.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);
        $admin = new Employee();
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->mobile = $request->mobile;
        $admin->national_id = $request->national_id;
        $admin->working_hours = $request->working_hours;
        $admin->birthdate = $request->birthdate;
        $admin->national = $request->national;
        $admin->email = $request->email;
        $admin->salary = $request->salary;
        $admin->branch = $request->branch;
        $admin->social_status = $request->social_status;
        $admin->manges = $request->manges;
        $admin->education_status = $request->education_status;
        $admin->job = $request->job;
        $admin->graduation_date = $request->graduation_date;
        $admin->head_manger = $request->head_manger;
        $admin->company_id=$user->company_id;
        $admin->save();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Employee::find($id);

        return view('admin.employees.edit', compact('driver'));

    }
    public function show($id)
    {
        $driver = Employee::find($id);

        return view('admin.employees.show', compact('driver'));
    }
    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Employee::find($id);
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->mobile = $request->mobile;
        $admin->national_id = $request->national_id;
        $admin->working_hours = $request->working_hours;
        $admin->birthdate = $request->birthdate;
        $admin->national = $request->national;
        $admin->email = $request->email;
        $admin->salary = $request->salary;
        $admin->branch = $request->branch;
        $admin->social_status = $request->social_status;
        $admin->manges = $request->manges;
        $admin->education_status = $request->education_status;
        $admin->job = $request->job;
        $admin->graduation_date = $request->graduation_date;
        $admin->head_manger = $request->head_manger;
        $admin->save();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees updated successfully");
    }

    public function createAttendance()
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();
        return view('admin.attendance.create',compact('employees'));
    }
    public function storeAttendance(Request $request)
    {
        $user=User::find($_SESSION['admin_id']);

        $att=new Attendance();
        $att->employee_id=$request->employee_id;
        $att->num_days=$request->num_days;
        $att->day_value=$request->day_value;
        $att->company_id=$user->company_id;
        $att->notes=$request->notes;
        $att->basic_salary=$request->basic_salary;

        $att->total=$request->num_days*$request->day_value;
        $att->save();
        return redirect('admin/attendance');
    }
    public function editAttendance($id)
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();

        $attendance=Attendance::find($id);
        return view('admin.attendance.edit',compact('attendance','employees'));
    }
    public function updateAttendance(Request $request,$id)
    {
        $att=Attendance::find($id);
        $att->num_days=$request->num_days;
        $att->day_value=$request->day_value;
        $att->total=$request->num_days*$request->day_value;
        $att->notes=$request->notes;
        $att->basic_salary=$request->basic_salary;
        $att->save();
        return redirect('admin/attendance');
    }
    public function deleteAttendance($id)
    {
        $att=Attendance::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function attendance()
    {
        $user=User::find($_SESSION['admin_id']);

        $attendance=Attendance::where('company_id',$user->company_id)->get();
       return view('admin.attendance.index',compact('attendance'));
    }
    public function createHoliday()
    {
        $user=User::find($_SESSION['admin_id']);
        $employees=Employee::where('company_id',$user->company_id)->get();
        return view('admin.holiday.create',compact('employees'));
    }
    public function storeHoliday(Request $request)
    {
        $user=User::find($_SESSION['admin_id']);
        $att=new Holiday();
        $att->employee_id=$request->employee_id;
        $att->from=$request->from;
        $att->to=$request->to;
        $att->type=$request->type;
        $att->reason=$request->reason;
        $att->ahead_manger=$request->ahead_manger;

        $att->company_id=$user->company_id;
        $att->save();
        return redirect('admin/holiday');
    }
    public function editHoliday($id)
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();

        $attendance=Holiday::find($id);
        return view('admin.holiday.edit',compact('attendance','employees'));
    }
    public function updateHoliday(Request $request,$id)
    {
        $att=Holiday::find($id);
        $att->employee_id=$request->employee_id;
        $att->from=$request->from;
        $att->to=$request->to;
        $att->type=$request->type;
        $att->reason=$request->reason;
        $att->ahead_manger=$request->ahead_manger;

        $att->save();
        return redirect('admin/holiday');
    }
    public function deleteHoliday($id)
    {
        $att=Holiday::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function holiday()
    {
        $user=User::find($_SESSION['admin_id']);
        $attendance=Holiday::where('company_id',$user->company_id)->get();
        return view('admin.holiday.index',compact('attendance'));
    }
    public function createCount()
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();
        return view('admin.count.create',compact('employees'));
    }
    public function storeCount(Request $request)
    {
        $user=User::find($_SESSION['admin_id']);

        $att=new Oncount();
        $att->employee_id=$request->employee_id;
        $att->money=$request->money;
        $att->num_of_months=$request->num_of_months;
        $att->reason=$request->reason;
        $att->company_id=$user->company_id;
        $att->discount_date=$request->discount_date;
        $att->head_manger=$request->head_manger;

        $att->save();
        return redirect('admin/count');
    }
    public function editCount($id)
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();

        $attendance=Oncount::find($id);
        return view('admin.count.edit',compact('attendance','employees'));
    }
    public function updateCount(Request $request,$id)
    {
        $att=Oncount::find($id);
        $att->employee_id=$request->employee_id;
        $att->money=$request->money;
        $att->num_of_months=$request->num_of_months;
        $att->reason=$request->reason;
        $att->discount_date=$request->discount_date;
        $att->head_manger=$request->head_manger;
        $att->save();
        return redirect('admin/count');
    }
    public function deleteCount($id)
    {
        $att=Oncount::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function count()
    {
        $user=User::find($_SESSION['admin_id']);

        $attendance=Oncount::where('company_id',$user->company_id)->get();
        return view('admin.count.index',compact('attendance'));
    }
    public function createWarning()
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();
        return view('admin.warning.create',compact('employees'));
    }
    public function storeWarning(Request $request)
    {
        $user=User::find($_SESSION['admin_id']);

        $att=new Warning();
        $att->employee_id=$request->employee_id;
        $att->reason=$request->reason;
        $att->company_id=$user->company_id;
        $att->date=$request->date;
        $att->warning_no=$request->warning_no;
        $att->head_manger=$request->head_manger;

        $att->save();
        return redirect('admin/warning');
    }
    public function editWarning($id)
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();

        $attendance=Warning::find($id);
        return view('admin.warning.edit',compact('attendance','employees'));
    }
    public function updateWarning(Request $request,$id)
    {
        $att=Warning::find($id);
        $att->employee_id=$request->employee_id;
        $att->date=$request->date;
        $att->warning_no=$request->warning_no;
        $att->head_manger=$request->head_manger;
        $att->reason=$request->reason;
        $att->save();
        return redirect('admin/warning');
    }
    public function deleteWarning($id)
    {
        $att=Warning::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function warning()
    {
        $user=User::find($_SESSION['admin_id']);

        $attendance=Warning::where('company_id',$user->company_id)->get();
        return view('admin.warning.index',compact('attendance'));
    }
    public function createadditional()
    {
        $user=User::find($_SESSION['admin_id']);
        $employees=Employee::where('company_id',$user->company_id)->get();
        return view('admin.additional.create',compact('employees'));
    }
    public function storeadditional(Request $request)
    {
        $user=User::find($_SESSION['admin_id']);

        $att=new Additional();
        $att->employee_id=$request->employee_id;
        $att->value=$request->value;
        $att->hours=$request->hours;
        $att->total=$request->value*$request->hours;
        $att->company_id=$user->company_id;
        $att->save();
        return redirect('admin/additional');
    }
    public function editadditional($id)
    {
        $user=User::find($_SESSION['admin_id']);

        $employees=Employee::where('company_id',$user->company_id)->get();

        $attendance=Additional::find($id);
        return view('admin.additional.edit',compact('attendance','employees'));
    }
    public function updateadditional(Request $request,$id)
    {
        $att=Additional::find($id);
        $att->employee_id=$request->employee_id;
        $att->value=$request->value;
        $att->hours=$request->hours;
        $att->total=$request->value*$request->hours;
        $att->save();
        return redirect('admin/additional');
    }
    public function deletecadditional($id)
    {
        $att=Additional::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function additional()
    {
        $user=User::find($_SESSION['admin_id']);

        $attendance=Additional::where('company_id',$user->company_id)->get();
        return view('admin.additional.index',compact('attendance'));
    }
}
