<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyPaymentRequest;
use App\Models\Company;
use App\Models\CompanyPayment;

class CompanyPaymentController extends Controller
{
    //show all records
    public function index()
    {
        $rows = Company::where('user_id', auth()->user()->id)->get();
        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));
        $title = "Company Payments";
        $badge = "all";

        return view('admin.company_payment.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'title' => $title,
            'badge' => $badge,
        ]);
    }

    //add record
    public function add_record()
    {
       
        $title = "Add Company Payment";

        return view('admin.company_payment.add', [
            'title' => $title,
        ]);
    }


    //save record
    public function save_record(CompanyPaymentRequest $request)
    {
        $info = new CompanyPayment();
        $info->payment = $request->payment;
        $balance = $info->balance;
        $info->balance = $balance - $info->payment;
        $info->shop_id = session()->get('shop_id');
        $info->status = 1;

        
        if ($info->save())
            return redirect()->back()->with('success', 'Record Saved Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Saved');
    }



    //edit Record
    public function edit_record($id)
    {
        $info = CompanyPayment::find($id);
        $title = "Edit Company Payment";
        return view('admin.company_payment.edit', [
            'info' => $info, 
            'title' => $title,
        ]);
    }



    //update record
    public function update_record(CompanyPaymentRequest $request, $id)
    {
        $info = CompanyPayment::find($id);
        $info->payment = $request->payment;
        $balance = $info->balance;
        $info->balance = $balance - $info->payment;
        $info->shop_id = session()->get('shop_id');
        if($request->status == null)
            $info->status = 0;
        else
            $info->status = $request->status;


        if ($info->update())
            return redirect()->back()->with('success', 'Record Updated Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Updated');
    }


    //delete record
    public function delete_record($id)
    {
        $info = CompanyPayment::find($id);

        if ($info->delete()){   
            return redirect()->back()->with('error', 'Record Moved To Trash Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Trashed');
    }

    //show deleted records
    public function trashed_records()
    {
        $rows = CompanyPayment::onlyTrashed()->where('shop_id', session()->get('shop_id'))->latest()->paginate(10);
        $total = count(CompanyPayment::withTrashed()->where('deleted_at', '!=', null)->where('shop_id', session()->get('shop_id'))->get());
        $title = "Company Payments";
        $badge = "trashed";

        return view('admin.company_payment.trashed', [
            'rows' => $rows,
            'total' => $total,
            'title' => $title,
            'badge' => $badge,
        ]);
    }


    //delete record permanent
    public function delete_record_permanent($id)
    {
        $info = CompanyPayment::onlyTrashed()->find($id);

        if ($info->forceDelete()){
            return redirect()->back()->with('success', 'Record Deleted Permanently');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }


    //restore record
    public function restore_record($id)
    {
        $info = CompanyPayment::onlyTrashed()->find($id);
        
        if ($info->restore()){
            return redirect()->back()->with('success', 'Record Restored Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }




    /*****************************************************************************************************************
     * *****Filters and search Starts*********************************************
     */

    

    //search record by name
    public function search_record(Request $request)
    {

        $rows = CompanyPayment::where('name', 'LIKE', "%{$request->search}%")->where('shop_id', 'shop_id', session()->get('shop_id'))->latest()->paginate(10);

        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));

        $title = "Company Payment";
        $badge = "all";
        $shops = CompanyPayment::where('shop_id', 'shop_id', session()->get('shop_id'))->where('status', '1')->get();

        return view('admin.company_payment.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'title' => $title,
            'badge' => $badge,
            'shops' => $shops,
        ]);
    }


    //fiter status
    public function filter_status(Request $request)
    {
        if($request->status == 1)
        {
            $rows = CompanyPayment::where('shop_id', session()->get('shop_id'))->where('status', 1)->latest()->paginate(10);
            $title = "Company Payment | Active";
            $badge = "Active";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        else
        {
            $rows = CompanyPayment::where('shop_id', 'shop_id', session()->get('shop_id'))->where('status', 0)->latest()->paginate(10);
            $title = "Company Payment | Inactive";
            $badge = "Inactive";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }

        $shops = CompanyPayment::where('shop_id', 'shop_id', session()->get('shop_id'))->where('status', '1')->get();

        return view('admin.company_payment.index', [
            'title' => $title,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'badge' => $badge,
            'rows' => $rows,
            'shops' => $shops,
        ]);
    }


    // //fiter today
    // public function filter_today()
    // {
    //     $categories = Category::whereDate('created_at', Carbon::today())->orWhereDate('updated_at', Carbon::today())->latest()->paginate(10);


    //     $title = "Categories | Today";
    //     $badge = "today";
    //     return view('admin.categories.index', [
    //         'title' => $title,
    //         'badge' => $badge,
    //         'categories' => $categories
    //     ]);
    // }


    // //fiter this week
    // public function filter_week()
    // {
    //     $categories = Category::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orWhereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(10);

    //     $title = "Categories | This Week";
    //     $badge = "week";
    //     return view('admin.categories.index', [
    //         'title' => $title,
    //         'badge' => $badge,
    //         'categories' => $categories,
    //     ]);
    // }


    // //filter this month
    // public function filter_month()
    // {
    //     $categories = Category::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->orWhereBetween('updated_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->paginate(10);

    //     $title = "Categories | This Month";
    //     $badge = "month";
    //     return view('admin.categories.index', [
    //         'title' => $title,
    //         'badge' => $badge,
    //         'categories' => $categories,
    //     ]);
    // }


    // //filter this year
    // public function filter_year()
    // {
    //     $categories = Category::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->orWhereBetween('updated_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->latest()->paginate(10);

    //     $title = "Categories | This Year";
    //     $badge = "year";
    //     return view('admin.categories.index', [
    //         'title' => $title,
    //         'badge' => $badge,
    //         'categories' => $categories,
    //     ]);
    // }


    /*****************************************************************************************************************
     * *****Filters Ends*********************************************
     */
}