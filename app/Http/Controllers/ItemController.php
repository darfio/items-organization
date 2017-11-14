<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemCat;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
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
        $items = Item::All();
        $data = [
            'items' => $items,
            'items_active' => 'active'
        ];

        return view('admin.items.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_cats = ItemCat::All();
        $data = [
            'item_cats' => $item_cats,
            'items_active' => 'active'
        ];        
        return view('admin.items.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = new Item;
        $item->title = $request->title;
        $item->count = $request->count;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->cat_id = $request->cat_id;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $item_cats = ItemCat::All();
        $data = [
            'item' => $item,
            'item_cats' => $item_cats,
            'items_active' => 'active'
        ];  
        return view('admin.items.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->title = $request->title;
        $item->count = $request->count;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->cat_id = $request->cat_id;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('items.index');
    }
    
}
