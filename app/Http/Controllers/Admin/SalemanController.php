<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SalemanRequest;
use App\Models\Saleman;
use App\Models\Shop;

class SalemanController extends Controller
{
    //show all records
    public function index()
    {
        $rows = Saleman::where('shop_id', session('shop_id'))->latest()->paginate(10);
        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));
        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();
        $title = "Shops";
        $badge = "all";

        return view('admin.saleman.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'shop' => $shops,
            'title' => $title,
            'badge' => $badge,
        ]);
    }

    //add record
    public function add_record()
    {
       
        $title = "Add Saleman";
        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();

        return view('admin.saleman.add', [
            'title' => $title,
            'shops' => $shops
        ]);
    }


    //save record
    public function save_record(SalemanRequest $request)
    {
        $info = new Saleman();
        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->address = $request->address;
        $info->shop_id = $request->shop;
        $info->status = 1;

        
        if ($info->save())
            return redirect()->back()->with('success', 'Record Saved Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Saved');
    }



    //edit Record
    public function edit_record($id)
    {
        $info = Saleman::find($id);
        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();
        $title = "Edit Saleman";
        return view('admin.saleman.edit', [
            'info' => $info, 
            'shops' => $shops,
            'title' => $title,
        ]);
    }



    //update record
    public function update_record(SalemanRequest $request, $id)
    {
        $info = Saleman::find($id);
        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->address = $request->address;
        $info->shop_id = $request->shop;
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
        $info = Saleman::find($id);

        if ($info->delete()){   
            return redirect()->back()->with('error', 'Record Moved To Trash Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Trashed');
    }

    //show deleted records
    public function trashed_records()
    {
        $rows = Saleman::onlyTrashed()->where('user_id', auth()->user()->id)->latest()->paginate(10);
        $total = count(Shop::withTrashed()->where('deleted_at', '!=', null)->where('user_id', auth()->user()->id)->get());
        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();
        $title = "Salamans";
        $badge = "trashed";

        return view('admin.saleman.trashed', [
            'rows' => $rows,
            'total' => $total,
            'shops' => $shops,
            'title' => $title,
            'badge' => $badge,
        ]);
    }


    //delete record permanent
    public function delete_record_permanent($id)
    {
        $info = Saleman::onlyTrashed()->find($id);

        if ($info->forceDelete()){
            return redirect()->back()->with('success', 'Record Deleted Permanently');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }


    //restore record
    public function restore_record($id)
    {
        $info = Saleman::onlyTrashed()->find($id);
        
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

        $rows = Saleman::where('name', 'LIKE', "%{$request->search}%")->where('user_id', auth()->user()->id)->latest()->paginate(10);

        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));

        $title = "Salamans";
        $badge = "all";
        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();

        return view('admin.saleman.index', [
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
            $rows = Shop::where('user_id', auth()->user()->id)->where('status', 1)->latest()->paginate(10);
            $title = "Salemans | Active";
            $badge = "Active";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        else
        {
            $rows = Shop::where('user_id', auth()->user()->id)->where('status', 0)->latest()->paginate(10);
            $title = "Salamans | Inactive";
            $badge = "Inactive";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }

        $shops = Shop::where('user_id', auth()->user()->id)->where('status', '1')->get();

        return view('admin.saleman.index', [
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