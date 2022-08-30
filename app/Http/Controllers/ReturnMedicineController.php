<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

use App\Models\Customer;

use App\Models\ReturnMedicine;

use App\Models\ReturnMedicineItem;

use Illuminate\Support\Facades\Auth;

class ReturnMedicineController extends Controller
{
    public function index()
    {
        $returnmedicines=ReturnMedicine::with('customer','user')->orderBy('id','desc')->paginate(10);

        return view('returnmedicine.index', compact('returnmedicines'));
    }

    public function details($returnmedicine_id){
        // return $returnmedicine_id;
        $returnmedicine = ReturnMedicine::where('id',$returnmedicine_id)->first();
        
        $returnmedicineitems =  $returnmedicine->returnmedicineitems()->with('medicine')->get();

        return view('returnmedicine.details', compact('returnmedicineitems'));
    }
    public function create()
    {
        $customers=Customer::all();
        $medicines=Medicine::all();
    //    return $medicines;
        return view('returnmedicine.create', compact('customers','medicines'));
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        try{

         $returnmedicine = ReturnMedicine::create([
            'customer_id' => $request->input('customer_id'),
            'subtotal' => $request->input('subtotal'),
            'discount' => $request->input('discount'),
            'grandtotal' => $request->input('grandtotal'),
            'user_id' => Auth::id(),
         ]);

         $count = count($request->medicine_id);

         for ($i=0; $i < $count ; $i++) { 
           $items = new ReturnMedicineItem();
           $items->return_medicine_id = $returnmedicine->id;
           $items->medicine_id = $request->medicine_id[$i];
           $items->price = $request->price[$i];
           $items->quantity = $request->quantity[$i];
           $items->total = $request->total[$i];
           $items->save();

           Medicine::where('id',$request->medicine_id[$i])->increment('quantity', $request->quantity[$i]);
         }

         
        return redirect()->route('returnmedicine.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }

    }

        public function print(ReturnMedicine $returnmedicine)
        {
            $returnmedicine=ReturnMedicine::all();
            return view('returnmedicine.print', compact('returnmedicine'));
        }
}
