<?php

namespace App\Http\Controllers;

use App\ItemCat;
use Illuminate\Http\Request;
use App\Http\Requests\ItemCatRequest;

class ItemCatController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_cats = ItemCat::All();

        $data = [
            'item_cats' => $item_cats,
            'item_cats_active' => 'active'
        ];
        return view('admin.item_cats.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'item_cats_active' => 'active'
        ];
        return view('admin.item_cats.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ItemCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCatRequest $request)
    {
        $item_cat = new ItemCat;
        $item_cat->title = $request->title;
        $item_cat->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \param  $cat_id
     * @return \Illuminate\Http\Response
     */
    public function show($cat_id)
    {
        $item_cat = ItemCat::find($cat_id);
        $items = $item_cat->items;
        //var_dump($items);
        //die;

        $data = [
            'items' => $items,
            'category_title' => $item_cat->title
        ];
        return view('admin.item_cats.show_items', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \param  $cat_id
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_id)
    {
        $item_cat = ItemCat::find($cat_id);
        $data = [
            'item_cat' => $item_cat,
            'items_active' => 'active'
        ];  
        return view('admin.item_cats.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \param $cat_id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemCatRequest $request, $cat_id)
    {
        $item_cat = ItemCat::find($cat_id);
        $item_cat->title = $request->title;
        $item_cat->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \param  $itemCat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ItemCat::find($id);
        $item->delete();
        return redirect()->route('categories.index');
    }
}
