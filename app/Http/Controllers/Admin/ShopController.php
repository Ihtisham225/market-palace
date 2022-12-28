<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\ShopType;
// use PDF;
use Barryvdh\DomPDF\Facade\PDF;

class ShopController extends Controller
{
    //show all records
    public function index()
    {
        $rows = Shop::where('user_id', auth()->user()->id)->latest()->paginate(10);
        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));
        $shop_types = ShopType::where('status', '1')->get();
        $title = "Shops";
        $badge = "all";

        return view('admin.shop.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'shop_types' => $shop_types,
            'title' => $title,
            'badge' => $badge
        ]);
    }


    //show record details
    public function record_detail($id)
    {
        $info = Shop::find($id);

        $title = "Shop Details";

        return view('admin.shop.detail', [
            'info' => $info,
            'title' => $title
        ]);
    }

    //save record
    public function add_record()
    {
       
        $title = "Add Shop";
        $shop_types = ShopType::where('status', '1')->get();

        return view('admin.shop.add', [
            'title' => $title,
            'shop_types' => $shop_types
        ]);
    }


    //save record
    public function save_record(ShopRequest $request)
    {
        dd($request->file('avatar'));
        $info = new Shop();
        $info->name = $request->name;
        $info->user_id = auth()->user()->id;
        $info->email = $request->email;
        $phone = substr($request->phone, 1);
        $info->phone = '92'.$phone;
        $info->address = $request->address;
        $info->shop_type_id = $request->shop_type;
        $info->status = 1;

        // code for image 
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = $request->name . "-" . $file->getClientOriginalName();
            $file->move(public_path('assets/media/images/shops/'), $filename);
            $info->image = $filename;
        } else
            $info->image = 'shop_default.png';

        if ($info->save())
            return redirect()->back()->with('success', 'Record Saved Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Saved');
    }



    //edit Record
    public function edit_record($id)
    {
        $info = Shop::find($id);
        $shop_types = ShopType::where('status', '1')->get();
        $title = "Edit Shop";
        return view('admin.shop.edit', [
            'info' => $info, 
            'shop_types' => $shop_types,
            'title' => $title,
        ]);
    }



    //update record
    public function update_record(ShopRequest $request, $id)
    {
        $info = Shop::find($id);
        $info->name = $request->name;
        $info->user_id = auth()->user()->id;
        $info->email = $request->email;
        if($request->phone != $info->phone)
        {
            $phone = substr($request->phone, 1);
            $info->phone = '92'.$phone;
        }
        else
        {
            $info->phone = $request->phone;
        } 
        $info->address = $request->address;
        $info->shop_type_id = $request->shop_type;
        if($request->status == null)
            $info->status = 0;
        else
            $info->status = $request->status;

        // code for image 
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = $request->name . "-" . $file->getClientOriginalName();
            $file->move(public_path('assets/media/images/shops/'), $filename);
            $info->image = $filename;
        }

        if ($info->update())
            return redirect()->back()->with('success', 'Record Updated Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Updated');
    }


    //delete record
    public function delete_record($id)
    {
        $info = Shop::find($id);

        if ($info->delete()){   
            return redirect()->back()->with('error', 'Record Moved To Trash Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Trashed');
    }

    //show deleted records
    public function trashed_records()
    {
        $rows = Shop::onlyTrashed()->where('user_id', auth()->user()->id)->latest()->paginate(10);
        $total = count(Shop::withTrashed()->where('deleted_at', '!=', null)->where('user_id', auth()->user()->id)->get());
        $shop_types = ShopType::where('status', '1')->get();
        $title = "Shops";
        $badge = "trashed";

        return view('admin.shop.trashed', [
            'rows' => $rows,
            'total' => $total,
            'shop_types' => $shop_types,
            'title' => $title,
            'badge' => $badge,
        ]);
    }


    //delete record permanent
    public function delete_record_permanent($id)
    {
        $info = Shop::onlyTrashed()->find($id);

        if ($info->forceDelete()){
            return redirect()->back()->with('success', 'Record Deleted Permanently');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }


    //restore record
    public function restore_record($id)
    {
        $info = Shop::onlyTrashed()->find($id);
        
        if ($info->restore()){
            return redirect()->back()->with('success', 'Record Restored Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }

    //generate report to pdf
    public function generate_report()
    {
        $rows = Shop::where('user_id', auth()->user()->id)->get();

        $pdf = PDF::loadView('admin.shop.generate_report', compact('rows'));
        // download PDF file with download method
        return $pdf->download('report.pdf');
    }




    /*****************************************************************************************************************
     * *****Filters and search Starts*********************************************
     */

    

    //search record by name
    public function search_record(Request $request)
    {

        $rows = Shop::where('name', 'LIKE', "%{$request->search}%")->where('user_id', auth()->user()->id)->latest()->paginate(10);

        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));

        $title = "Shops";
        $badge = "all";
        $shop_types = ShopType::where('status', '1')->get();

        return view('admin.shop.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'title' => $title,
            'badge' => $badge,
            'shop_types' => $shop_types,
        ]);
    }


    //fiter status
    public function filter_status(Request $request)
    {
        if($request->status == 1)
        {
            $rows = Shop::where('user_id', auth()->user()->id)->where('status', 1)->latest()->paginate(10);
            $title = "Shops | Active";
            $badge = "Active";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        else
        {
            $rows = Shop::where('user_id', auth()->user()->id)->where('status', 0)->latest()->paginate(10);
            $title = "Shops | Inactive";
            $badge = "Inactive";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        $shop_types = ShopType::where('status', '1')->get();
        return view('admin.shop.index', [
            'title' => $title,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'badge' => $badge,
            'rows' => $rows,
            'shop_types' => $shop_types,
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
