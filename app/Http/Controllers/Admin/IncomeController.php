<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use App\Services\IncomeServices;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.incomes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request, IncomeServices $incomeServices)
    {
        //
        $data = $request->all();

        $provider = auth()->user()->providers()->first();
        $data['provider_id'] = $provider->id;
        $incomeServices->createIncome($data);



        session()->flash('swal', [
            'icon'  => 'success', // ojo: tenías 'sucess'
            'title' => 'Ingreso registrado correctamente',
            'text'  => 'El Ingreso fue creado',
        ]);

        return redirect()->route('admin.incomes.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
        return view('admin.incomes.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income, IncomeServices $incomeServices)
    {
        //
        $data = $request->all();
        $provider = auth()->user()->providers()->first();
        $data['provider_id'] = $provider->id;
        $incomeServices->updateIncome($data, $income);

         session()->flash('swal', [
            'icon'  => 'success', // ojo: tenías 'sucess'
            'title' => 'Ingreso Actualizada correctamente',
            'text'  => 'Ingreso fue actualizado',
        ]);


        return redirect()->route('admin.incomes.edit', $income->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
         $income->delete();

          session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Ingreso eliminado correctamente',
            'text'  => 'El Ingreso fue eliminado',
          ]);

          return redirect()->route('admin.incomes.index');
    }
}
