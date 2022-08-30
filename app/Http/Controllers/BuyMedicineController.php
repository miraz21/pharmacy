<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BuyMedicine;

use App\Models\Medicine;

use Illuminate\Support\Facades\Auth;

class BuyMedicineController extends Controller
{
      public function index()
    {
    if(Auth::id())
    {
    if(Auth::user()->usertype==1)
    {
      $buymedicines=BuyMedicine::orderBy('id','desc')->paginate(15);
      return view('addbuymedicine.index', compact('buymedicines'));
    }
    if(Auth::user()->usertype==3)
    {
      $buymedicines=BuyMedicine::orderBy('id','desc')->paginate(15);
      return view('addbuymedicine.index', compact('buymedicines'));
    }
    else{
        return redirect()->back();
    }
    }
    else{
    return redirect('login');
    }
    }
      public function create()
      {
          $medicines=Medicine::all();
          $buymedicine=BuyMedicine::all();
          return view('addbuymedicine.create', compact('medicines'));
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'medicine_id'=>'required',
          'quantity'=>'required',
          'amount'=>'required',
           ]);

           $count = count($request->medicine_id);

           for ($i=0; $i < $count ; $i++) { 
             $items = new BuyMedicine();
             $items->medicine_id = $request->medicine_id[$i];
             $items->quantity = $request->quantity[$i];
             $items->amount = $request->amount[$i];
             $items->save();
             Medicine::where('id',$request->medicine_id[$i])->increment('quantity', $request->quantity[$i]);
           }
  
          
          return redirect()->route('buymedicine.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        
      }

      public function edit($id)
      {
          $buymedicine=BuyMedicine::find($id);
          $medicines=Medicine::find($id);
          return view('addbuymedicine.edit', compact('buymedicine','medicines'));
      }
      public function update(Request $request, $id)
      {
  
          try{
           $request->validate([
          'quantity'=>'required',
          'amount'=>'required',
           ]);
  
          $data=[
          'quantity'=>$request->input('quantity'),
          'amount'=>$request->input('amount'),
          ];
  
          $buymedicine = BuyMedicine::find($id);
          $buymedicine ->update($data);
          return redirect()->route('buymedicine.index');
  
          }catch(\Exception $exception){
          
           return redirect()->back()->withErrors($exception->getMessage());
          
          }
          
      }
          public function delete($id)
      {
          $buymedicine=BuyMedicine::find($id);
  
          $buymedicine->delete();
          return redirect()->back();
      }
}
