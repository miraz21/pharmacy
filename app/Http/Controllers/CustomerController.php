<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
  public function index()
  {
    $customers = Customer::orderBy('id', 'desc')->paginate(20);
    return view('customer.index', compact('customers'));
  }
  public function create()
  {
    $customer = Customer::all();
    return view('customer.create', compact('customer'));
  }

  public function store(Request $request)
  {
    try {
      $request->validate([
        'name' => 'required',
        'age' => 'required',
      ]);

      $data = [
        'name' => $request->input('name'),
        'age' => $request->input('age'),
      ];
      Customer::create($data);

      if ($request->input('modal')) {
        return redirect()->back();
      } else {

        return redirect()->route('customer.index');
      }
    } catch (\Exception $exception) {

      return redirect()->back()->withErrors($exception->getMessage());
    }
  }

  public function edit($id)
  {
    $customer = Customer::find($id);
    return view('customer.edit', compact('customer'));
  }

  public function update(Request $request, $id)
  {
    try {
      $request->validate([
        'name' => 'required',
        'age' => 'required',
      ]);

      $data = [
        'name' => $request->input('name'),
        'age' => $request->input('age'),
      ];
      $customer = Customer::findOrFail($id);
      $customer->update($data);

      return redirect()->route('customer.index');
    } catch (\Exception $exception) {

      return redirect()->back()->withErrors($exception->getMessage());
    }
  }
}
