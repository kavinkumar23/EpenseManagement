<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/expense
class expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $expense = expense::all();
        return response()->json($expense);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "testshere";
        $expense = new expense([
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'description' => $request->get('description'),
      
        ]);
        $product->save();


        return response()->json('expense Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = laravel::find($id);
        return response()->json($expense);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = expense::find($id);
        $expense->name = $request->get('name');
        $expense->price = $request->get('price');
        $expense->description = $request->get('description');

        $expense->save();


        return response()->json('expense Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = expense::find($id);
         $expense->delete();


      return response()->json('expense Deleted Successfully.');
    }
}
