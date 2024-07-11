<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function deleteItem(Item $item){
        if(auth()->user()->id === $item['item_id']) {
            $item->delete();
        }
        return redirect('/');
    }

    public function updatedItem(Item $item, Request $request){
        if(auth()->user()->id !== $item['item_id']){
            return redirect('/');
    }

       $upcomingData = $request->validate([
           'name' => 'required',
           'description' => 'required',
           'category' => 'required',
           'quantity' => 'required',
           'price' => 'required'
       ]);

       $upcomingData['name'] = strip_tags($upcomingData['name']);
       $upcomingData['description'] = strip_tags($upcomingData['description']);
       $upcomingData['category'] = strip_tags($upcomingData['category']);
       $upcomingData['quantity'] = strip_tags($upcomingData['quantity']);
       $upcomingData['price'] = strip_tags($upcomingData['price']);    

       $item->update($upcomingData);
       return redirect('/');
    }

    public function editItem(Item $item){
      if(auth()->user()->id !== $item['item_id']){
         return redirect('/');
      }

       return view('edit-item', ['item' => $item]);
    }

    public function createItem(Request $request){
        $upcomingData = $request->validate([
           'name' => 'required',
           'description' => 'required',
           'category' => 'required',
           'quantity' => 'required',
           'price' => 'required'
        ]);
   
       $upcomingData['name'] = strip_tags($upcomingData['name']);
       $upcomingData['description'] = strip_tags($upcomingData['description']);
       $upcomingData['category'] = strip_tags($upcomingData['category']);
       $upcomingData['quantity'] = strip_tags($upcomingData['quantity']);
       $upcomingData['price'] = strip_tags($upcomingData['price']);
       
       $upcomingData['item_id'] = Auth::id();
       Item::create($upcomingData);
       return redirect('/');
     }
}
