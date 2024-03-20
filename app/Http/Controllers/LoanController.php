<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->validated());
        return to_route('customers.show', ['customer' => $loan->customer])->with('success', 'El préstamo ha sido asignado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', ['loan' => $loan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        return view('loans.edit', ['loan' => $loan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->validated());
        return to_route('loans.show', ['loan' => $loan])->with('success', 'Los datos se han actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $customer = $loan->customer;
        $loan->delete();

        return to_route('customers.show', ['customer' => $customer])->with('success', 'El registro se ha eliminado con éxito.');
    }
}
