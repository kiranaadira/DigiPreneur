<?php

namespace App\Http\Controllers;

use App\Models\CustomerService;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class CustomerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function downloadPDF($id)
    {
        $customer = CustomerService::find($id);

        if (!$customer) {
            abort(404, 'Customer not found');
        }

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $html = view('customer_Service.pdf', compact('customer'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream($customer->name . 'Feedback.pdf', ['Attachment' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer_service.create'); // Form untuk menambah data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|max:1000',
        ]);

        CustomerService::create($request->all()); // Simpan data ke database

        return redirect()->route('customer_service.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = CustomerService::findOrFail($id); // Ambil data berdasarkan ID
        return view('customer_service.edit', compact('customer')); // Kirim ke view
    }

    public function show(string $id)
    {
        $customer = CustomerService::findOrFail($id);
        return view('customer_service.show', compact('customer')); // Compacting the correct variable
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|max:1000',
        ]);

        $customer = CustomerService::findOrFail($id);
        $customer->update($request->all()); // Update data

        return redirect()->route('customer_service.index')
                         ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerService $customer_service)
    {
        $customer_service->delete(); // Hapus data
        return redirect()->route('customer_service.index')
                         ->with('success', 'Customer deleted successfully.');
    }
}
