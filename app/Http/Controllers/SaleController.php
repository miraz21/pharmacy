<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sale;

use App\Models\Customer;

use App\Models\Medicine;

use App\Models\Order;

use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $sales=Sale::orderBy('id','desc')->paginate(10);
        $orders=Order::with('customer','user')->orderBy('id','desc')->paginate(10);

        return view('sale.index', compact('sales','orders'));
    }

    public function details($order_id){
        $order = Order::where('id',$order_id)->first();
        $orderItems =  $order->orderitems()->with(['medicine' =>function($q){
            $q->select('id','name');
        }])->get();

        return view('sale.details', compact('orderItems'));
    }
    public function create()
    {
        $sales=Sale::all();
        $customers=Customer::all();
        $medicines=Medicine::all();
    //    return $medicines;
        return view('sale.create', compact('sales','customers','medicines'));
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        try{

         $order = Order::create([
            'customer_id' => $request->input('customer_id'),
            'subtotal' => $request->input('subtotal'),
            'discount' => $request->input('discount'),
            'grandtotal' => $request->input('grandtotal'),
            'user_id' => Auth::id(),
         ]);

         $count = count($request->medicine_id);

         for ($i=0; $i < $count ; $i++) { 
           $items = new OrderItem();
           $items->order_id = $order->id;
           $items->medicine_id = $request->medicine_id[$i];
           $items->price = $request->price[$i];
           $items->quantity = $request->quantity[$i];
           $items->total = $request->total[$i];
           $items->save();
           
           Medicine::where('id', $request->medicine_id[$i])->decrement('quantity', $request->quantity[$i]);
         }

         
        
        return redirect()->route('sale.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }

    }

        public function print(Order $order)
        {
            // return $order->customer()->first();
           $orderItems =  $order->orderitems()->with('medicine')->get();
        return view('sale.print', compact('order','orderItems'));
        }
      
}
