<?php

namespace App\Http\Controllers;

use App\AccountingEntry;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $payments_amount = 0;
        $items  = Item::paginate(15);
        foreach ($items as $item) {
            $entries =  AccountingEntry::where('item_id', 'like', $item->id)->get();
            foreach ($entries as $entry) {
                $payments_amount +=  $entry->payment_amount;
            }
           
            $rest_amount =  $item->total_amount - $payments_amount;
            $item->rest_amount =$rest_amount ;
        }




        return $items;
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

        $payments_amount = 0;
        $items  = Item::where('customer_id', 'like', $CustomerId)->paginate(15);
        foreach ($items as $item) {
            $entries =  AccountingEntry::where('item_id', 'like', $item->id)->get();
            foreach ($entries as $entry) {
                $payments_amount +=  $entry->payment_amount;
            }
           
            $rest_amount =  $item->total_amount - $payments_amount;
            $item->rest_amount =$rest_amount ;
        }

        return $items;
    }

    public function restAmount($id)
    {
        $item =  Item::findOrFail($id);
        $totalAmount = $item->total_amount;
        $entries =  AccountingEntry::where('item_id', 'like', $id)->get();
        $payments_amount = 0;
        foreach ($entries as $entry) {
            $payments_amount +=  $entry->payment_amount;
        }
        return $totalAmount - $payments_amount;
    }
}
