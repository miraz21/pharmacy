<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SalePerson;

use Illuminate\Support\Facades\Auth;

class SalePersonController extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
      if(Auth::user()->usertype==1)
      {
      $salepersons=SalePerson::orderBy('id','desc')->paginate(10);
      return view('saleperson.index', compact('salepersons'));
    }
    if(Auth::user()->usertype==3)
    {
    $salepersons=SalePerson::orderBy('id','desc')->paginate(10);
    return view('saleperson.index', compact('salepersons'));
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
          $saleperson=SalePerson::all();
          return view('saleperson.create');
      }
  
      public function store(Request $request)
      {   
          try{
          $request->validate([
          'name'=>'required',
           ]);
  
           $data=[
          'name'=>$request->input('name'),
          ];
  
          SalePerson::create($data);
          
          return redirect()->route('saleperson.index');
  
          }catch(\Exception $exception){
           return redirect()->back()->withErrors($exception->getMessage());
  
          }
        }
          public function edit($id)
          {
              $saleperson=SalePerson::find($id);
              return view('saleperson.edit', compact('saleperson'));
          }
          public function update(Request $request, $id)
          {
      
              try{
               $request->validate([
              'name'=>'required',
               ]);
      
              $data=[
              'name'=>$request->input('name'),
              ];
      
              $saleperson = SalePerson::find($id);
              $saleperson ->update($data);
              return redirect()->route('saleperson.index');
      
              }catch(\Exception $exception){
              
               return redirect()->back()->withErrors($exception->getMessage());
              
              }
              
          }
        
    
     public function delete($id)
      {
          $saleperson=SalePerson::find($id);
  
          $saleperson->delete();
          return redirect()->back();
      }
}
