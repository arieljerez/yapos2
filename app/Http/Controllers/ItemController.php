<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  Item::all();
        return view('items.index',compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = Item::find($id);
      return view('items.show',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        return view('items.create',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     * @param in $id
     * @return \Illuminate\Http\Response
     */
    public function copy($id)
    {
        $item = Item::findOrFail($id);
        return view('items.create',compact('item'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'upc_ean_isbn' => 'required|unique:items,upc_ean_isbn',
           'name' => 'required'
        ]);
        $request->name = strtoupper($request->name);
        $input = $request->all();
        $item = Item::create($input);
        return redirect('/items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Item::findOrFail($id);

      if (empty($item)) {
          return redirect(route('items.index'));
      }

      return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
         'upc_ean_isbn' => 'required',
         'name' => 'required'
      ]);

      $item = Item::findOrFail($id);

      if (empty($item)) {

          return redirect(route('items.index'));
      }

      $item = $item->update($request->all(), ['id' => $id]);

      return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $item = Item::findOrFail($id);

      if (empty($item)) {
        return redirect(route('items.index'));
      }

      $item->delete($id);

      return redirect(route('items.index'));
    }
}
