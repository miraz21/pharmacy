<?php

namespace App\Http\Controllers;

use App\Models\BuyMedicine;
use App\Models\Order;
use App\Models\ReturnMedicineItem;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function showReport()
  {
    return view('report.dailylist');
  }

  public function saleReport(Request $request)
  {

    // $farmecy = Customer::whereDate('created_at',$request->date)->get();
    $order = Order::whereDate('created_at', $request->date)->select('subtotal', 'discount', 'grandtotal')->get();
    $buy_medicine = BuyMedicine::whereDate('created_at', $request->date)->with(['medicine' => function($q){
      $q->select('id','name');
    }])->get();


    $return_medicine = ReturnMedicineItem::whereDate('created_at', $request->date)->with(['medicine' => function($q){
      $q->select('id','name');
    }])->get();


  //   public function view(){

  //     $departments = Salary::select('department')
  //                            ->groupBy('department')
  //                            ->get();
  //     return view('view_department', compact('departments'));        
  // }

    // return $return_medicine;
    // $orderTotal = $order->sum('subtotal');
    // return $buy_medicine;
    return view('report.report',compact('order','buy_medicine','return_medicine'));
  }
}
