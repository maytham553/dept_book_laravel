<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::paginate(15);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'total_amount' => 'required',
            'installment_amount' => 'required',
            'date_of_payment' => 'required',
            'note' => ''
        ]);

        $NewItem = Item::create($request->all());
        return  $NewItem;
    }


    public function show($id)
    {
        return Item::findOrFail($id);
    }
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'total_amount' => 'required',
            'installment_amount' => 'required',
            'date_of_payment' => 'required',
            'note' => ''
        ]);
        $item->update($request->all());
        return $item;
    }

    public function showByCustomerId($CustomerId)
    {
        return Item::where('customer_id','like',$CustomerId)->paginate(15);
    }

}
