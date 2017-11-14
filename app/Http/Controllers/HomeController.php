<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\ItemCat;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $categories = ItemCat::all();

        $data = [
            'items_count' => $items->count(),
            'categories_count' => $categories->count(),
            'dashboard_active' => 'active'
        ];
        return view('admin.dashboard', $data);

        //return view('home');
    }
}
