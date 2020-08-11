<?php

namespace App\Http\Controllers;

use App\DynamicField;
use App\Meal;
use Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
        return view('dynamic_field');
    }

    function insert()
    {

        
        if(request()->ajax()) {
            
            $meal = Meal::find(1);
        
            dd($meal);
            
            $rules = [
                'product_id.*'  => 'required',
                'quantity.*'  => 'required'
            ];
            
            $error = Validator::make(request()->all(), $rules);
            
            if($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $product_id = request()->product_id;
            $quantity = request()->quantity;
            
            for($i = 0; $i < count($product_id); $i++) {
                // $data = [
                //     'meal_id' => 1,
                //     'product_id' => $product_id[$i],
                //     'quantity'  => $quantity[$i]
                // ];
                
                // $insert_data[] = $data; 
                $meal->products()->attach(Product::find($product_id[$i]));
            }
            

            // DynamicField::insert($insert_data);
            
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }
}