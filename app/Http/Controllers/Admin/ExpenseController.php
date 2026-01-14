<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Services\ExpenseServices;
use Illuminate\Http\Request;
use LaravelLang\Publisher\Console\Update;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         return view('admin.expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request, ExpenseServices $expenseServices)
    {
        //
       $data = $request->all();

        $provider = auth()->user()->providers()->first();
        $data['provider_id'] = $provider->id;
        $expenseServices->createIncome($data);
        
          session()->flash('swal', [
            'icon'  => 'success', // ojo: tenías 'sucess'
            'title' => 'Gasto registrado correctamente',
            'text'  => 'El Gasto fue creado',
        ]);

        return redirect()->route('admin.expenses.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
         return view('admin.expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense, ExpenseServices $expenseServices)
    {
        //
        $data = $request->all();
        $provider = auth()->user()->providers()->first();
        $data['provider_id'] = $provider->id;
        $expenseServices->updateIncome($data, $expense);
         session()->flash('swal', [
            'icon'  => 'success', // ojo: tenías 'sucess'
            'title' => 'Gasto Actualizada correctamente',
            'text'  => 'Gasto fue actualizado',
        ]);

        return redirect()->route('admin.incomes.edit', $expense->id); 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        session()->flash('swal', [
            'icon'  => 'success', // ojo: tenías 'sucess'
            'title' => 'Gasto eliminada correctamente',
            'text'  => 'Gasto fue eliminada',
        ]);

        return redirect()->route('admin.expenses.index');
    }
}
