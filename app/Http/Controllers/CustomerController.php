<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', ['customer' => new Customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $request->validated();
        $customer['dni_frontpic'] = $request->file('dni_frontpic')->store('uploads', 'public');
        $customer['dni_backpic'] = $request->file('dni_backpic')->store('uploads', 'public');

        Customer::create($customer);
        return to_route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        if($request->hasFile('dni_frontpic')) {
            Storage::delete('public/'.$customer->dni_frontpic);
            $data['dni_frontpic'] = $request->file('dni_frontpic')->store('uploads', 'public');
        }

        if($request->hasFile('dni_backpic')) {
            Storage::delete('public/'.$customer->dni_backpic);
            $data['dni_backpic'] = $request->file('dni_backpic')->store('uploads', 'public');
        }

        $customer->update($data);
        return to_route('customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Storage::delete('public/'.$customer->dni_frontpic);
        Storage::delete('public/'.$customer->dni_backpic);
        $customer->delete();

        return to_route('customers.index');
    }

}
