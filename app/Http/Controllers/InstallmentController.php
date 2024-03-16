<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use Carbon\Carbon;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
        return to_route('loans.show', ['loan' => $installment->loan]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstallmentRequest $request, Installment $installment)
    {
        $newData = [];

        if ($installment->status == 'Pendiente') {
            $newData['status'] = 'Pagada';
            $newData['paid_at'] = Carbon::now();
        } else {
            $newData['status'] = 'Pendiente';
            $newData['paid_at'] = null;
        }
        
        $installment->update($newData);

        return to_route('loans.show', ['loan' => $installment->loan]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
    {
        //
    }
}
