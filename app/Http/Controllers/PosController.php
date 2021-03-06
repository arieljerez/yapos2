<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Stock;
use App\Models\Price;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('pos.index',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->input();

        $sale = new Sale();
        $sale->amount = 0;
        $sale->customer_id = $items['customer'];

        $sale->save();
        $total = 0;

    		for($i=0; $i < $count=count($items['id']); $i++){

          $item = Item::find($items['id'][$i]);
          $saleitem = new SaleItem();
    			$saleitem->item_id = $items['id'][$i];
    			$saleitem->sale_id = $sale->id;
          $saleitem->quantity = $items['quantity'][$i];
          $saleitem->price = $items['price'][$i];
          $saleitem->subtotal = $items['price'][$i] * $items['quantity'][$i];
          $saleitem->cost_price = $item->cost_price;

          $total += $saleitem->subtotal;

        	$saleitem->save();

          $item->selling_price = $items['price'][$i];
          $item->quantity = $item->quantity - $items['quantity'][$i];
          $item->save();

          Price::create(
              [
                'price'=> $items['price'][$i],
                'sell_cost' => 'sell',
                'item_id' => $items['id'][$i],
                'user_id' => \Auth::user()->id,
                'remarks' => 'by sale Id:'. $sale->id
              ]);

          $this->decreaseStock($item->id,$items['quantity'][$i],'by Sale '. $sale->id,'out' );
    		}
        $sale->amount = $total;
        $sale->save();
        return redirect('pos');
    }

    public function decreaseStock($item_id, $quantity, $remarks,$in_out)
    {
          $stock = new Stock;
          $stock->item_id = $item_id;
          $stock->user_id = \Auth::user()->id;
          $stock->quantity = $in_out == 'in' ? $quantity: $quantity * -1;
          $stock->in_out = $in_out ;
          $stock->remarks = $remarks ? $remarks: 'Manual Edit of Quantity';
          $stock->save();
    }

}
