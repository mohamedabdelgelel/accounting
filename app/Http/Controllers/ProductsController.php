<?php


namespace App\Http\Controllers;

use App\Account;
use App\Baku;
use App\Box;
use App\Carton;
use App\Classification;
use App\MainAccount;
use App\Products;
use App\Purchase;
use App\Store;
use App\Suppliers;
use App\Transaction;
use App\User;
use App\Years;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductsController extends Controller
{
    public function upload()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.products.upload');

    }
    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xlsx,csv'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $collections = (new FastExcel)->import($path);
        foreach ($collections as $collection) {
            try {

                $transaction = new Products();
                $transaction->name= $collection['الاسم'];
                $user=User::find($_SESSION['admin_id']);
                $supplier=Suppliers::where('name', $collection['المورد'])->where('company_id',$user->company_id)->first();
                $store=Store::where('name', $collection['الفرع'])->where('company_id',$user->company_id)->first();
                $class=Classification::where('name', $collection['التصنيف'])->where('company_id',$user->company_id)->first();
                if ($collection['المورد'] == null) {
                    continue;
                }
                $transaction->supplier_id= $supplier->id;

                if ($collection['الفرع'] == null) {
                    $transaction->store_id = $store->id;
                }
                $transaction->store_id = $store->id;

                if ($collection['التصنيف'] == null) {
                }
                $transaction->classificaiton_id = $class->id;

                $transaction->min_price = $collection['الحد الادني'];
                $transaction->max_price = $collection['الحد الاقصي'];
                $transaction->price_system = $collection['نظام التسعير'];
                $transaction->company_id=$user->company_id;
                $transaction->save();
                $baku=new Baku();
                $baku->type=$collection['نوع الباكو'];
                $baku->price=$collection['سعر شراء الباكو'];
                $baku->order=$collection['حد طلب الباكو'];
                $baku->bacode1=$collection['باكود الباكو'];
                $baku->bacode2=$collection['سعر البيع الباكو'];
                $baku->current_price=$collection['الرصيد الحالى الباكو'];
                $baku->dicount=$collection['نسبة الخصم المسموح به الباكو'];
                $baku->unit=$collection['وحدة الباكو'];
                $baku->product_id=$transaction->id;
                $baku->save();
                $box=new Box();
                $box->type_2=$collection['نوع العلبة'];
                $box->price_2=$collection['سعر شراء العلبة'];
                $box->order_2=$collection['حد طلب العلبة'];
                $box->bacode1_2=$collection['باكود العلبة'];
                $box->bacode2_2=$collection['سعر البيع العلبة'];
                $box->current_price_2=$collection['الرصيد الحالى العلبة'];
                $box->dicount_2=$collection['نسبة الخصم المسموح به العلبة'];
                $box->unit_2=$collection['وحدة العلبة'];
                $box->product_id=$transaction->id;
                $box->save();
                $carton=new Carton();
                $carton->type_3=$collection['نوع الكارتونه'];
                $carton->price_3=$collection['سعر شراء الكارتونه'];
                $carton->order_3=$collection['حد طلب الكارتونه'];
                $carton->bacode1_3=$collection['باكود الكارتونه'];
                $carton->bacode2_3=$collection['سعر البيع الكارتونه'];
                $carton->current_price_3=$collection['الرصيد الحالى الكارتونه'];
                $carton->dicount_3=$collection['نسبة الخصم المسموح به الكارتونه'];
                $carton->unit_3=$collection['وحدة الكارتونه'];
                $carton->product_id=$transaction->id;
                $carton->save();

            } catch (\Exception $E) {
                return $E;

            }
        }
        //dd($collection);
        return back()->with('success', 'تم ادخال ملف اكسيل بنجاح');
    }
    public function getPrice(Request $request)
    {
        $price=0;
        if ($request->type=='وحدة')
        {
            $product=Baku::where('product_id',$request->id)->first();
            if ($product)
            $price=$product->price;
        }
       else if ($request->type=='علبة')
        {
            $product=Box::where('product_id',$request->id)->first();
            if ($product)

                $price=$product->price_2;

        }
       else if ($request->type=='كارتونة')
        {
            $product=Carton::where('product_id',$request->id)->first();
            if ($product)

                $price=$product->price_3;

        }
       return $price;


    }
    public function getSell(Request $request)
    {
        $price=0;
        if ($request->type=='وحدة')
        {
            $product=Baku::where('product_id',$request->id)->first();
            if ($product)
                $price=$product->bacode2;
        }
        else if ($request->type=='علبة')
        {
            $product=Box::where('product_id',$request->id)->first();
            if ($product)

                $price=$product->bacode2_2;

        }
        else if ($request->type=='كارتونة')
        {
            $product=Carton::where('product_id',$request->id)->first();
            if ($product)

                $price=$product->bacode2_3;

        }
        return $price;


    }

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Products::find($id);
        $slider->delete();
        $baku=Baku::where('product_id',$id)->first();
        if ($baku) {
            $baku->delete();
        }
        $box=Box::where('product_id',$id)->first();
        if ($box) {
            $box->delete();
        }
        $carton=Carton::where('product_id',$id)->first();
        if ($carton) {
            $carton->delete();
        }
        return redirect()
            ->route("products.index")
            ->with("success", "products  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $classifications=Classification::where('company_id',$user->company_id)->get();
        $stores=Store::where('company_id',$user->company_id)->get();
        $suppliers=Suppliers::where('company_id',$user->company_id)->get();
        return view('admin.products.create',compact('stores','classifications','suppliers'));
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $drivers = Products::where('company_id',$user->company_id)->get();
        foreach ($drivers as $driver)
        {
            $baku=Baku::where('product_id',$driver->id)->first();
            $box=Box::where('product_id',$driver->id)->first();
            $carton=Carton::where('product_id',$driver->id)->first();
            if ($baku)
                 $driver->baku=$baku->current_price;
            if ($box)
                $driver->box=$box->current_price_2;
            if ($carton)
                $driver->carton=$carton->current_price_3;
        }
        return view('admin.products.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $user=User::find($_SESSION['admin_id']);

        $admin = new Products();
        $admin->name = $request->name;
        $admin->supplier_id = $request->supplier_id;
        $admin->store_id = $request->store_id;
        $admin->classificaiton_id = $request->classificaiton_id;
        $admin->min_price = $request->min_price;
        $admin->max_price = $request->max_price;
        $admin->company_id=$user->company_id;
        $admin->price_system = $request->price_system;
        $admin->save();
        $baku=new Baku();
        $baku->type=$request->type_0;
        $baku->price=$request->price_0;
        $baku->order=$request->order_0;
        $baku->bacode1=$request->bacode1_0;
        $baku->bacode2=$request->bacode2_0;
        $baku->current_price=$request->current_price_0;
        $baku->dicount=$request->dicount_0;
        $baku->unit=$request->unit_0;
        $baku->product_id=$admin->id;
        $baku->save();
        $box=new Box();
        $box->type_2=$request->type_2;
        $box->price_2=$request->price_2;
        $box->order_2=$request->order_2;
        $box->bacode1_2=$request->bacode1_2;
        $box->bacode2_2=$request->bacode2_2;
        $box->current_price_2=$request->current_price_2;
        $box->dicount_2=$request->dicount_2;
        $box->unit_2=$request->unit_2;
        $box->product_id=$admin->id;
        $box->save();
        $carton=new Carton();
        $carton->type_3=$request->type_3;
        $carton->price_3=$request->price_3;
        $carton->order_3=$request->order_3;
        $carton->bacode1_3=$request->bacode1_3;
        $carton->bacode2_3=$request->bacode2_3;
        $carton->current_price_3=$request->current_price_3;
        $carton->dicount_3=$request->dicount_3;
        $carton->unit_3=$request->unit_3;
        $carton->product_id=$admin->id;
        $carton->save();
        return redirect()
            ->route("products.index")
            ->with("success", "products created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Products::find($id);
        $baku=Baku::where('product_id',$id)->first();
        $box=Box::where('product_id',$id)->first();
        $carton=Carton::where('product_id',$id)->first();
        $user=User::find($_SESSION['admin_id']);

        $classifications=Classification::where('company_id',$user->company_id)->get();
        $stores=Store::where('company_id',$user->company_id)->get();
        $suppliers=Suppliers::where('company_id',$user->company_id)->get();
        return view('admin.products.edit', compact('driver','baku','box','carton','stores','suppliers','classifications'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Products::find($id);
        $admin->name = $request->name;
        $admin->supplier_id = $request->supplier_id;
        $admin->store_id = $request->store_id;
        $admin->classificaiton_id = $request->classificaiton_id;
        $admin->min_price = $request->min_price;
        $admin->max_price = $request->max_price;
        $admin->price_system = $request->price_system;
        $admin->save();
        $baku=Baku::where('product_id',$id)->first();
        $baku->type=$request->type;
        $baku->price=$request->price;
        $baku->order=$request->order;
        $baku->bacode1=$request->bacode1;
        $baku->bacode2=$request->bacode2;
        $baku->current_price=$request->current_price;
        $baku->dicount=$request->dicount;
        $baku->unit=$request->unit;
        $box=Box::where('product_id',$id)->first();
        $box->type_2=$request->type_2;
        $box->price_2=$request->price_2;
        $box->order_2=$request->order_2;
        $box->bacode1_2=$request->bacode1_2;
        $box->bacode2_2=$request->bacode2_2;
        $box->current_price_2=$request->current_price_2;
        $box->dicount_2=$request->dicount_2;
        $box->unit_2=$request->unit_2;
        $box->save();
        $carton=Carton::where('product_id',$id)->first();
        $carton->type_3=$request->type_3;
        $carton->price_3=$request->price_3;
        $carton->order_3=$request->order_3;
        $carton->bacode1_3=$request->bacode1_3;
        $carton->bacode2_3=$request->bacode2_3;
        $carton->current_price_3=$request->current_price_3;
        $carton->dicount_3=$request->dicount_3;
        $carton->unit_3=$request->unit_3;
        $carton->save();
        return redirect()
            ->route("products.index")
            ->with("success", "products updated successfully");


    }

}
