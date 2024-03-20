<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use Carbon\Carbon;

class InstallmentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('installments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstallmentRequest $request)
    {
        $installment = Installment::create($request->validated());
        return to_route('loans.show', ['loan' => $installment->loan])->with('success', 'La cuota ha sido creada con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        return view('installments.edit', ['installment' => $installment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstallmentRequest $request, Installment $installment)
    {
        $installment->update($request->validated());
        return to_route('loans.show', ['loan' => $installment->loan])->with('success', 'Los datos se han actualizado con éxito.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
    {
        $installment->delete();
        return back()->with('success', 'El registro se ha eliminado con éxito.');
    }
    
    public function updateStatus(Installment $installment)
    {
        $newData = [];
    
        if ($installment->status == 'Pendiente') {
            $newData['status'] = 'Pagada';
            $newData['paid_at'] = Carbon::now();
            $installment->update($newData);
            return back()->with('success', 'La cuota ha sido pagada.');
        } else {
            $newData['status'] = 'Pendiente';
            $newData['paid_at'] = null;
            $installment->update($newData);
            return back()->with('warning', 'Se ha anulado el pago de la cuota.');
        }

    }

}
