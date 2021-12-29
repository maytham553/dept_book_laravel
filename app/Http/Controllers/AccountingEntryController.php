<?php

namespace App\Http\Controllers;

use App\AccountingEntry;
use Illuminate\Http\Request;

class AccountingEntryController extends Controller
{
    public function index(){
        return AccountingEntry::latest()->paginate(20);
    }


    public function store(Request $request){
        $request->validate([
            'item_id' => 'required',
            'payment_amount' => 'required',
            'payment_date' => 'required',
            'note' => ''
        ]) ;
        $newAccountingEntry = AccountingEntry::create($request->all());
        return  response()->json($newAccountingEntry , 201) ;
    }

    public function show($id)
    {
        return AccountingEntry::findOrFail($id);
    }

    public function update(Request $request, AccountingEntry $entry)
    {
        $request->validate([
            'item_id' => 'required',
            'payment_amount' => 'required',
            'payment_date' => 'required',
            'note' => ''
        ]);
        $entry->update($request->all());
        return $entry;
    }

    public function destroy(AccountingEntry $Entry)
    {
        $Entry->delete();
        return response()->json(['deleting'=>'true']);
    } 

    public function showByItemId($ItemId)
    {
        return AccountingEntry::where('item_id','like',$ItemId)->latest()->get();
    }

}
