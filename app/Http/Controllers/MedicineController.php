<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
     public function index()
    {
        if(Auth::id())
        {
        if(Auth::user()->usertype==1)
        {
        $medicines=Medicine::orderBy('id','desc')->paginate(20);
        return view('medicine.index',compact('medicines'));
        }
        if(Auth::user()->usertype==3)
        {
        $medicines=Medicine::orderBy('id','desc')->paginate(20);
        return view('medicine.index',compact('medicines'));
        }
    else
    {
        return redirect()->back();
    }
    }
    else
    {
        return redirect('login');
    }
}
    
    

    public function create()
    {
        $medicine=Medicine::all();
        return view('medicine.create', compact('medicine'));
    }

    // public function search(Request $request)
    // {
    //     $medicinedetail=MedicineName::with('medicinedetail')->where('name','like','%'. $request->input('query').'%')->get();
    //     return view('search', compact('medicinedetail'));
    // }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'name'=>'required',
        'price'=>'required',
        'quantity'=>'required',
         ]);

         $count = count($request->quantity);

         for ($i=0; $i < $count ; $i++) { 
           $items = new Medicine();
           $items->name = $request->name[$i];
           $items->price = $request->price[$i];
           $items->quantity = $request->quantity[$i];
           $items->save();
       
         }
        
        return redirect()->route('medicine.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
        $medicine=Medicine::find($id);
        return view('medicine.edit', compact('medicine'));
    }
    public function update(Request $request, $id)
    {

        try{
         $request->validate([
        'name'=>'required',
        'price'=>'required',
        'quantity'=>'required',
         ]);

        $data=[
        'name'=>$request->input('name'),
        'price'=>$request->input('price'),
        'quantity'=>$request->input('quantity'),
        ];

        $medicine = Medicine::find($id);
        $medicine ->update($data);
        return redirect()->route('medicine.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
        $medicine=Medicine::find($id);

        $medicine->delete();
        return redirect()->back();
    }
}
