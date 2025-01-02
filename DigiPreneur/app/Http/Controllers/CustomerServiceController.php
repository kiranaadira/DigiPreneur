<?php

namespace App\Http\Controllers;

use App\Models\CustomerService;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    public function index(Request $request)
{
    $query = CustomerService::query();

    // Filter berdasarkan nama atau email
    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    }

    // Sortir data
    if ($sort = $request->input('sort')) {
        $query->orderBy($sort, $request->input('order', 'asc'));
    }

    // Ambil data dengan pagination
    $customers = $query->paginate(10);

    // Oper variabel $customers ke view
    return view('customer_service.index', compact('customers'));
}


    public function create()
    {
        return view('customer_service.create'); // Form untuk menambah data
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        CustomerService::create($request->all()); // Simpan data ke database
        return redirect()->route('customer_service.index')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
{
    $customer = CustomerService::findOrFail($id); // Ambil data berdasarkan ID
    return view('customer_service.edit', compact('customer')); // Kirim ke view
}


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'message' => 'required|string',
    ]);

    $customer = CustomerService::findOrFail($id);
    $customer->update($request->all());

    return redirect()->route('customer_service.index')
                     ->with('success', 'Customer updated successfully.');
}


    public function destroy(CustomerService $customer_service)
    {
        $customer_service->delete();
        return redirect()->route('customer_service.index')->with('success', 'Customer deleted successfully.');
    }
}
