<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Form;

class FormController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        
    //     $request->validate([
    //         'item_name' => 'required|max:255',
    //         'sku_no' => 'required|alpha_num',
    //         'price' => 'required|numeric',
    //     ]);
    //     $validatedData = $request->all();

    //     // $validatedData = Validator::make($request->all(), [
    //     //     'item_name' => 'required',
    //     //     'sku_no' => 'required',
    //     // ])->validate();
        
    //     Form::create($validatedData);

    //    // return response()->json('Form is successfully validated and data has been saved');
    //    return redirect()->route('form.create');

  
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'sku_no' => 'required|alpha_num',
            'price' => 'required|numeric',
        ]);

        if (!$validator->fails())
        {
            Form::create($validatedData);
            return redirect()->route('form.create');
        } 
        else
           $errors = $validator->errors();
           return view('create',compact('errors'));
           // return view('create',['errors'=>$validator->errors()]);
          

    }
}
