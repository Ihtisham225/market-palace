<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\ShopType;

class CategoryController extends Controller
{

    //show all records
    public function index()
    {
        $rows = Category::where('user_id', auth()->user()->id)->latest()->paginate(10);
        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));

        $shop_types = ShopType::where('status', '1')->get();
        $title = "Categories";
        $badge = "all";

        return view('admin.category.index', [
            'rows' => $rows,
            'total' => $total,
            'active' => $total_active,
            'inactive' => $total_inactive,
            'shop_types' => $shop_types,
            'title' => $title,
            'badge' => $badge,
        ]);
    }


    //save record
    public function add_record()
    {
       
        $title = "Add Category";
        $shop_types = ShopType::where('status', '1')->get();

        return view('admin.category.add', [
            'title' => $title,
            'shop_types' => $shop_types
        ]);
    }


    //save record
    public function save_record(CategoryRequest $request)
    {
        $info = new Category();
        $info->user_id = auth()->user()->id;
        $info->title = $request->name;
        $info->shop_type_id = $request->shop_type;
        $info->status = 1;

        if ($info->save())
            return redirect()->back()->with('success', 'Record Saved Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Saved');
    }



    //edit Record
    public function edit_record($id)
    {
        $info = Category::find($id);
        $shop_types = ShopType::where('status', '1')->get();
        $title = "Edit Category";
        return view('admin.category.edit', [
            'info' => $info, 
            'shop_types' => $shop_types,
            'title' => $title,
        ]);
    }



    //update record
    public function update_record(CategoryRequest $request, $id)
    {
        $info = Category::find($id);
        $info->user_id = auth()->user()->id;
        $info->title = $request->name;
        $info->shop_type_id = $request->shop_type;
        $info->status = $request->status;

        if ($info->update())
            return redirect()->back()->with('success', 'Record Updated Successfully');
        else
            return redirect()->back()->with('error', 'Record Not Updated');
    }


    //delete record
    public function delete_record($id)
    {
        $info = Category::find($id);

        if ($info->delete()){   
            return redirect()->back()->with('error', 'Record Moved To Trash Successfully');
        }
        else
            return redirect()->back()->with('error', 'Record Not Trashed');
    }

    //show deleted records
    public function trashed_records()
    {
        $rows = Category::onlyTrashed()->where('user_id', auth()->user()->id)->latest()->paginate(10);
        $total = count(Category::withTrashed()->where('deleted_at', '!=', null)->where('user_id', auth()->user()->id)->get());
        $shop_types = ShopType::where('status', '1')->get();
        $title = "Categories";
        $badge = "trashed";

        return view('admin.category.trashed', [
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
        $info = Category::onlyTrashed()->find($id);

        if ($info->forceDelete()){
            return redirect()->back()->with('success', 'Record Deleted Permanently');
        }
        else
            return redirect()->back()->with('error', 'Record Not Deleted');
    }


    //restore record
    public function restore_record($id)
    {
        $info = Category::onlyTrashed()->find($id);
        
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

        $rows = Category::where('title', 'LIKE', "%{$request->search}%")->where('user_id', auth()->user()->id)->latest()->paginate(10);

        $total = count($rows);
        $total_active = count($rows->where('status', 1));
        $total_inactive = count($rows->where('status', 0));
        $title = "Categories";
        $badge = "all";
        $shop_types = ShopType::where('status', '1')->get();

        return view('admin.category.index', [
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
            $rows = Category::where('user_id', auth()->user()->id)->where('status', 1)->latest()->paginate(10);
            $title = "Categories | Active";
            $badge = "Active";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        else
        {
            $rows = Category::where('user_id', auth()->user()->id)->where('status', 0)->latest()->paginate(10);
            $title = "Categories | Inactive";
            $badge = "Inactive";

            $total = count($rows);
            $total_active = count($rows->where('status', 1));
            $total_inactive = count($rows->where('status', 0));
        }
        $shop_types = ShopType::where('status', '1')->get();
        return view('admin.category.index', [
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