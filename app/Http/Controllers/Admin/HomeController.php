<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }


    public function select_shop()
    {
        $shops = Shop::where('user_id', auth()->user()->id)->get();
        $shop_types = ShopType::where('status', 1)->get();
        return view('admin.select_shop', compact('shops', 'shop_types'));
    }


    public function shop_session($id)
    {
        session(['shop_id' => $id]);
        $shops = Shop::where('user_id', auth()->user()->id)->get();
        return redirect(route('home'));
    }
}
